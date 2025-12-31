<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;

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
        $dokters = User::where('role', '1')->get();
        return view('Landing.daftar_dokter', compact('dokters'));
    }

    // jadwal dokter page
    public function jadwalDokter()
    {
        $dokters = User::where('role', '1')->get();
        return view('Landing.jadwal_dokter', compact('dokters'));
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

    public function faq()
    {
        return view('Landing.faq');
    }

    public function kontakKami()
    {
        return view('Landing.kontak');
    }

    public function kebijakanPrivasi()
    {
        return view('Landing.keb_privasi');
    }

}
