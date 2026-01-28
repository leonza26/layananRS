<?php

namespace App\Http\Controllers\dokter;

use App\Models\DoctorSchedule;
use App\Models\User;
use App\Models\Dokter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DokterMainController extends Controller
{
    //
    public function index()
    {

        return view('Dokter.dashboard');
    }

    // jadwal saya
    public function jadwalSaya()
    {
        $user = Auth::user();
        $dokter = Dokter::where('user_id', $user->id)->first();

        // Cek apakah data dokter ada
        if (!$dokter) {
            return redirect()->route('dokter.profile.saya')->with('error', 'Profil dokter belum lengkap. Silakan lengkapi data Anda terlebih dahulu.');
        }

        // Ambil tanggal saat ini untuk referensi kalender
        $currentDate = Carbon::now();
        $startOfMonth = $currentDate->copy()->startOfMonth();
        $endOfMonth = $currentDate->copy()->endOfMonth();

        // Ambil jadwal dokter di bulan ini
        $schedules = DoctorSchedule::where('dokter_id', $dokter->id)
            ->whereBetween('date', [$startOfMonth->format('Y-m-d'), $endOfMonth->format('Y-m-d')])
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('Dokter.jadwalsaya', compact('schedules', 'startOfMonth', 'endOfMonth'));
    }

    // store jadwal
    public function storeJadwal(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
        ]);

        $user = Auth::user();
        $dokter = Dokter::where('user_id', $user->id)->first();

        if (!$dokter) {
            return redirect()->back()->with('error', 'Data dokter tidak ditemukan. Silakan lengkapi profil.');
        }

        // Logika sederhana: Jika repeat dicentang, buat jadwal untuk 4 minggu ke depan
        $loops = $request->has('repeat') ? 4 : 1;
        $inputDate = Carbon::parse($request->date);

        for ($i = 0; $i < $loops; $i++) {
            DoctorSchedule::create([
                'dokter_id' => $dokter->id,
                'date' => $inputDate->copy()->addWeeks($i)->format('Y-m-d'),
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);
        }

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan.');
    }


    public function daftarJanjitemu(){
        // read appointment list
        $appointments = \App\Models\Appointment::all();
        return view('Dokter.daftar_janjitemu', compact('appointments'));
    }

    // riwayat pasien
    public function riwayatPasien()
    {
        return view('Dokter.riwayat_pasien');
    }

    // profile saya
    public function profileSaya()
    {
        return view('Dokter.profilesaya');
    }

    // notifikasi
    public function notifikasi()
    {
        return view('Dokter.notifikasi');
    }


}
