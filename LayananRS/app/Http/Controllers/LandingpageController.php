<?php

namespace App\Http\Controllers;

class LandingpageController extends Controller
{
    //
    // home page
    public function home()
    {
        return view('Landing.welcome');
    }

    // daftar dokter page
    public function daftarDokter()
    {
        return view('Landing.daftar_dokter');
    }

    // jadwal dokter page
    public function jadwalDokter()
    {
        return view('Landing.jadwal_dokter');
    }

    // riwayat page
    public function riwayat()
    {
        return view('Landing.riwayat');
    }

    // booking dokter page
    public function bookingDokter()
    {
        return view('Landing.booking_dokter');
    }
}
