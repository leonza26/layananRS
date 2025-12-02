<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AdminMainController extends Controller
{
    //
    public function admin()
    {
        return view('admin.dashboard');
    }

    // manage dokter
    public function manageDokter()
    {
        $doctors = User::where('role', '1')->get();

        return view('admin.manage.manage_dokter', compact('doctors'));
    }

    // tambah dokter
    public function tambahDokter()
    {

        return view('admin.manage.tambah_dokter');
    }

    // manage pasien
    public function managePasien()
    {
        $patients = User::where('role', '2')->get();

        return view('admin.manage.manage_pasien', compact('patients'));
    }

    // manage janji temu
    public function manageJanjitemu()
    {

        return view('admin.manage.manage_janjitemu', compact('appointments'));
    }

    // laporan & analitik
    public function laporanAnalitik()
    {
        return view('admin.laporan');
    }

    // setting
    public function setting()
    {
        return view('admin.settings');
    }
}
