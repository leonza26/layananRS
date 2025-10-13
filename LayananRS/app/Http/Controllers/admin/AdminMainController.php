<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminMainController extends Controller
{
    //
    public function admin(){
        return view('admin.dashboard');
    }

    // manage dokter
    public function manageDokter(){
        return view('admin.manage.manage_dokter');
    }

    // tambah dokter
    public function tambahDokter(){
        return view('admin.manage.tambah_dokter');
    }


    // manage pasien
    public function managePasien(){
        return view('admin.manage.manage_pasien');
    }

    // manage janji temu
    public function manageJanjitemu(){
        return view('admin.manage.manage_janjitemu');
    }

    // laporan & analitik
    public function laporanAnalitik(){
        return view('admin.laporan');
    }

    // setting
    public function setting(){
        return view('admin.settings');
    }

}
