<?php

namespace App\Http\Controllers\pasien;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Payment;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PasienMainController extends Controller
{
    // summary
    public function index()
    {
        // read data pasien di summary.blade.php
        $pasien = User::where('role', '2')->findOrFail(Auth::id());

        return view('pasien.summary', compact('pasien'));
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

        $appointments = Appointment::with('dokter.user')
            ->where('pasien_id', $pasienId)
            ->orderBy('appointment_time', 'desc')
            ->get();

        $upcomingAppointments = $appointments->filter(function ($appointment) use ($now) {
            return Carbon::parse($appointment->appointment_time)->isFuture();
        });

        $completedAppointments = $appointments->filter(function ($appointment) use ($now) {
            return Carbon::parse($appointment->appointment_time)->isPast();
        });

        return view('pasien.riwayat_janjitemu', compact('upcomingAppointments', 'completedAppointments'));
    }

    // booking page
    public function booking(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i',
        ]);

        $dokter = User::with('dokter')->findOrFail($request->dokter_id);

        // Format tanggal untuk tampilan
        $dateFormatted = Carbon::parse($request->date)->translatedFormat('l, d F Y');
        $time = $request->time;

        // LOGIKA PERBAIKAN DI SINI:
        $user = Auth::user();
        $pasien = $user->pasien; // Cek relasi

        // Jika data pasien belum ada di tabel 'pasiens', buatkan sekarang!
        if (!$pasien) {
            $pasien = Pasien::create([
                'user_id' => $user->id,
                // Isi field lain dengan null atau default jika ada
                'phone_number' => null,
                'address' => null
            ]);

            // Refresh relasi agar data terbaca
            $user->refresh();
            $pasien = $user->pasien;
        }

        return view('pasien.booking_dokter', [
            'dokter' => $dokter,
            'dateFormatted' => $dateFormatted, // Kirim tanggal yg sudah diformat
            'time' => $time,
            'pasien' => $pasien,
            'requestData' => $request // Kirim request dengan nama berbeda agar tidak bentrok
        ]);
    }

    // store booking
    public function storeBooking(Request $request)
    {
        // Validasi
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
            // 'pasien_id' => 'required', // HAPUS validasi ini, kita ambil dari Auth biar aman
            'appointment_date' => 'required|date_format:Y-m-d',
            'appointment_time' => 'required|date_format:H:i',
            'payment_method' => 'required|string',
            'complaint' => 'nullable|string',
        ]);

        // Ambil Pasien ID dari User yang Login (Lebih Aman)
        // Gunakan firstOrCreate untuk jaga-jaga jika storeBooking ditembak langsung tanpa lewat halaman booking
        $pasien = Pasien::firstOrCreate(['user_id' => Auth::id()]);

        // Ambil data dokter untuk hitung biaya
        $dokterUser = User::with('dokter')->findOrFail($request->dokter_id);
        $consultation_fee = $dokterUser->dokter->consultation_fee ?? 150000; // Default jika null

        $appointmentDateTime = Carbon::parse($request->appointment_date . ' ' . $request->appointment_time);

        // Cek apakah slot sudah diambil orang lain
        $existingAppointment = Appointment::where('doctor_id', $dokterUser->dokter->id) // Pakai ID tabel doctors
            ->where('appointment_time', $appointmentDateTime)
            ->exists();

        if ($existingAppointment) {
            return redirect()->back()->with('error', 'Maaf, slot waktu tersebut sudah terisi.');
        }

        // Buat Janji Temu
        $appointment = Appointment::create([
            'doctor_id' => $dokterUser->dokter->id, // Masukkan ke tabel appointments (pake ID tabel doctors)
            'patient_id' => $pasien->id,            // Pake ID tabel patients
            'schedule_id' => 1, // Opsional: Logic schedule_id nanti bisa disempurnakan, sementara hardcode/null kalau boleh null
            'appointment_time' => $appointmentDateTime,
            'status' => 'pending',
            'complaint' => $request->complaint,
        ]);

        // Buat Pembayaran
        Payment::create([
            'appointment_id' => $appointment->id,
            'amount' => $consultation_fee + 5000,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        return redirect()->route('pasien.riwayat')->with('success', 'Janji temu berhasil dibuat.');
    }

    // cancel booking
    public function cancelBooking(Appointment $appointment)
    {
        // Otorisasi: Pastikan janji temu ini milik pasien yang sedang login
        if ($appointment->pasien_id !== Auth::user()->pasien->id) {
            return redirect()->route('pasien.riwayat')->with('error', 'Anda tidak berwenang membatalkan janji temu ini.');
        }

        // Hapus pembayaran terkait terlebih dahulu
        Payment::where('appointment_id', $appointment->id)->delete();

        // Hapus janji temu
        $appointment->delete();

        return redirect()->route('pasien.riwayat')->with('success', 'Janji temu telah berhasil dibatalkan.');
    }
}
