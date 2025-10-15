<?php

namespace App\Http\Controllers\pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasienMainController extends Controller
{
    // summary
    public function index()
    {
        return view('pasien.summary');
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

    // booking
    public function booking()
    {
        return view('pasien.booking_dokter');
    }

}
