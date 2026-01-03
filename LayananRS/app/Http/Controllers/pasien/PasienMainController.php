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
        $pasien = User::with('pasien')->where('role', '2');
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
        return view('pasien.riwayat_janjitemu');
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
            'amount' => $appointment->dokter->harga_konsultasi + 5000, // Asumsi biaya admin 5000
            'payment_method' => $request->payment_method,
            'status' => 'pending',
        ]);

        return redirect()->route('pasien.riwayat')->with('success', 'Janji temu berhasil dibuat dan menunggu pembayaran.');
    }
}
