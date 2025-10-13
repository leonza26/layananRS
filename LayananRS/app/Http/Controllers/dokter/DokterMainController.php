<?php

namespace App\Http\Controllers\dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('Dokter.jadwalsaya');
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
