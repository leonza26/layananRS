<?php

namespace App\Http\Controllers\pasien;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $date = Carbon::parse($request->date)->translatedFormat('l, d F Y');
        $time = $request->time;

        // Ambil data pasien yang sedang login
        $pasien = Auth::user()->pasien;


        return view('pasien.booking_dokter', compact('dokter', 'date', 'time', 'pasien', 'request'));
    }

    // store booking
    public function storeBooking(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
            'pasien_id' => 'required|exists:pasiens,id',
            'appointment_date' => 'required|date_format:Y-m-d',
            'appointment_time' => 'required|date_format:H:i',
            'payment_method' => 'required|string',
            'complaint' => 'nullable|string',
        ]);

        $dokterUser = User::with('dokter')->findOrFail($request->dokter_id);
        $consultation_fee = $dokterUser->dokter->consultaion_fee;

        $appointmentDateTime = Carbon::parse($request->appointment_date . ' ' . $request->appointment_time);

        // Race condition check: Pastikan slot belum diambil orang lain
        $existingAppointment = Appointment::where('dokter_id', $request->dokter_id)
            ->where('appointment_time', $appointmentDateTime)
            ->exists();

        if ($existingAppointment) {
            return redirect()->route('jadwal.dokter', ['id' => $request->dokter_id])
                ->with('error', 'Maaf, slot waktu yang Anda pilih baru saja terisi. Silakan pilih slot lain.');
        }

        // Buat Janji Temu
        $appointment = Appointment::create([
            'dokter_id' => $request->dokter_id,
            'pasien_id' => $request->pasien_id,
            'appointment_time' => $appointmentDateTime,
            'status' => 'pending', // Status awal
            'notes' => $request->complaint,
        ]);

        // Buat Pembayaran
        Payment::create([
            'appointment_id' => $appointment->id,
            'amount' => $consultation_fee + 5000, // Biaya konsultasi + biaya layanan
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        return redirect()->route('pasien.riwayat')->with('success', 'Janji temu berhasil dibuat dan menunggu pembayaran.');
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
