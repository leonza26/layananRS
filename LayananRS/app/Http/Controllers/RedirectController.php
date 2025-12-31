<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 0 || $role == 'admin') {
            return redirect()->route('admin');
        } elseif ($role == 1 || $role == 'dokter') {
            return redirect()->route('dokter');
        } elseif ($role == 2 || $role == 'pasien') {
            return redirect()->route('pasien');
        } else {
            return redirect('/');
        }
    }
}
