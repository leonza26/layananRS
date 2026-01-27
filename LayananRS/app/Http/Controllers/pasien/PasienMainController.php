<?php

namespace App\Http\Controllers\pasien;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\DoctorSchedule;
use App\Models\Pasien;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class PasienMainController extends Controller
{
    // summary
    public function index()
    {
        $user = Auth::user();
        $pasien = $user->pasien;

        // Janji temu terdekat (yang belum selesai / batal)
        $nextAppointment = Appointment::with(['doctor.user', 'payment'])
            ->where('patient_id', $pasien->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->where('appointment_time', '>=', now())
            ->orderBy('appointment_time', 'asc')
            ->first();

        return view('pasien.summary', compact(
            'user',
            'pasien',
            'nextAppointment'
        ));
    }

    // profile saya
    public function profileSaya()
    {
        return view('pasien.profile');
    }

    // riwayat
    public function riwayat()
    {
        $pasienId = Auth::user()->pasien->id;
        $now = Carbon::now();

        $appointments = Appointment::with('doctor.user')
            ->where('patient_id', $pasienId)
            ->orderBy('appointment_time', 'desc')
            ->get();

        $upcomingAppointments = Appointment::with('doctor.user')
            ->where('patient_id', $pasienId)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('appointment_time', 'asc')
            ->get();

        $completedAppointments = Appointment::with('doctor.user')
            ->where('patient_id', $pasienId)
            ->where('status', 'completed')
            ->orderBy('appointment_time', 'desc')
            ->get();

        return view('pasien.riwayat_janjitemu', compact('upcomingAppointments', 'completedAppointments'));
    }

    // booking page - FORM TAMPIL
    public function booking(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
        ]);

        // Find the doctor by their actual ID in the 'dokters' table
        $dokter = \App\Models\Dokter::with('user')->findOrFail($request->dokter_id);

        $biayaKonsultasi = $dokter->consultation_fee ?? 150000;
        $biayaAdmin = 5000;
        $totalBayar = $biayaKonsultasi + $biayaAdmin;

        $appointmentDateTime = Carbon::parse($request->date.' '.$request->time);

        // Check if the slot is already taken (Race Condition guard)
        $existingAppointment = Appointment::where('doctor_id', $request->dokter_id)
            ->where('appointment_time', $appointmentDateTime)
            ->where('status', '!=', 'cancelled')
            ->first();

        // If slot is taken, redirect back to schedule with an error
        if ($existingAppointment) {
            return redirect()->route('jadwal.dokter', ['id' => $dokter->user->id])
                ->with('error', 'Maaf, slot waktu tersebut sudah tidak tersedia. Silakan pilih jadwal lain.');
        }

        return view('pasien.booking_dokter', [
            'dokter' => $dokter,
            'appointment_date' => $request->date,
            'appointment_time' => $request->time,
            'biaya_konsultasi' => $biayaKonsultasi,
            'biaya_admin' => $biayaAdmin,
            'total_bayar' => $totalBayar,
        ]);
    }

    // PROSES SIMPAN BOOKING
    public function storeBooking(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id', // Diubah ke dokters.id
            'appointment_date' => 'required|date_format:Y-m-d',
            'appointment_time' => 'required|date_format:H:i',
            'complaint' => 'nullable|string',
        ]);

        $pasien = Pasien::firstOrCreate(['user_id' => Auth::id()]);

        // Diubah: Cari dokter berdasarkan ID dari tabel 'dokters'
        $dokter = \App\Models\Dokter::with('user')->findOrFail($request->dokter_id);
        $biayaKonsultasi = $dokter->consultation_fee ?? 150000;
        $biayaAdmin = 5000;
        $totalBayar = $biayaKonsultasi + $biayaAdmin;

        $appointmentDateTime = Carbon::parse($request->appointment_date.' '.$request->appointment_time);

        // --- LOGIKA MENCARI SCHEDULE ID
        $schedule = DoctorSchedule::where('dokter_id', $dokter->id) // Gunakan $dokter->id
            ->where('date', $request->appointment_date)
            ->whereTime('start_time', '<=', $request->appointment_time)
            ->whereTime('end_time', '>=', $request->appointment_time)
            ->where('is_active', 1)
            ->first();

        if (! $schedule) {
            return redirect()->back()->with('error', 'Jadwal dokter tidak ditemukan di sistem untuk tanggal ini.');
        }
        // ---------------------------------------------

        // 3. Validasi Waktu Appointment sesuai Jadwal Dokter
        $appointmentDateTime = Carbon::parse(
            $request->appointment_date.' '.$request->appointment_time
        );

        $scheduleStart = Carbon::parse(
            $schedule->date.' '.$schedule->start_time
        );

        $scheduleEnd = Carbon::parse(
            $schedule->date.' '.$schedule->end_time
        );

        if (! $appointmentDateTime->between($scheduleStart, $scheduleEnd)) {
            return redirect()->back()
                ->with('error', 'Waktu appointment berada di luar jadwal dokter.');
        }

        // Cek Slot (Race Condition & Self-Booking Check)
        $existingAppointment = Appointment::where('doctor_id', $dokter->id) // Gunakan $dokter->id
            ->where('appointment_time', $appointmentDateTime)
            ->where('status', '!=', 'cancelled')
            ->first();

        if ($existingAppointment) {
            if ($existingAppointment->patient_id == $pasien->id && $existingAppointment->status == 'pending') {
                return redirect()->route('pasien.booking.payment', ['id' => $existingAppointment->id])
                    ->with('info', 'Anda sudah memesan jadwal ini. Silakan selesaikan pembayaran.');
            }

            return redirect()->back()->with('error', 'Maaf, slot waktu tersebut sudah terisi oleh pasien lain.');
        }

        // 4. Simpan Appointment
        $appointment = Appointment::create([
            'doctor_id' => $dokter->id, // Gunakan $dokter->id
            'patient_id' => $pasien->id,
            'schedule_id' => $schedule->id,
            'appointment_time' => $appointmentDateTime,
            'status' => 'pending',
            'complaint' => $request->complaint,
        ]);

        // 5. Simpan Payment
        $payment = Payment::create([
            'appointment_id' => $appointment->id,
            'amount' => $totalBayar,
            'payment_method' => 'midtrans',
            'status' => 'pending',
        ]);

        // 6. Integrasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $orderId = 'BOOK-'.$appointment->id.'-'.time();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $totalBayar,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => $pasien->phone_number ?? '08123456789',
            ],
            'item_details' => [
                [
                    'id' => 'DOC-'.$dokter->user->id,
                    'price' => (int) $biayaKonsultasi,
                    'quantity' => 1,
                    'name' => 'Konsultasi Dr. '.$dokter->user->name,
                ],
                [
                    'id' => 'ADM-FEE',
                    'price' => (int) $biayaAdmin,
                    'quantity' => 1,
                    'name' => 'Biaya Layanan',
                ],
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            $payment->snap_token = $snapToken;
            $payment->transaction_id = $orderId;
            $payment->save();

            return redirect()->route('pasien.booking.payment', ['id' => $appointment->id]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memproses pembayaran: '.$e->getMessage());
        }
    }

    // HALAMAN PEMBAYARAN KHUSUS (Step baru)
    public function showPayment($id)
    {
        $appointment = Appointment::with(['doctor.user', 'payment'])->findOrFail($id);

        // Pastikan appointment ini milik user yang login
        if ($appointment->patient_id !== Auth::user()->pasien->id) {
            abort(403);
        }

        return view('pasien.payment', compact('appointment'));
    }

    // cancel booking
    public function cancelBooking(Appointment $appointment)
    {
        // Otorisasi: Pastikan janji temu ini milik pasien yang sedang login
        if ($appointment->patient_id !== Auth::user()->pasien->id) {
            return redirect()->route('pasien.riwayat')->with('error', 'Anda tidak berwenang membatalkan janji temu ini.');
        }

        // Hapus pembayaran terkait terlebih dahulu
        Payment::where('appointment_id', $appointment->id)->delete();

        // Hapus janji temu
        $appointment->delete();

        return redirect()->route('pasien.riwayat')->with('success', 'Janji temu telah berhasil dibatalkan.');
    }
}
