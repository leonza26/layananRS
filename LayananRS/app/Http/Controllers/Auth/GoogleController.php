<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari user berdasarkan google_id atau email
            $user = User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            if (!$user) {
                // Create new user jika belum ada
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => Hash::make(uniqid()), // password random karena tidak dipakai
                    'email_verified_at' => now(), // Langsung verifikasi email (lihat bagian verifikasi)
                ]);
            } else {
                // Update google_id jika login pertama kali via Google
                if (!$user->google_id) {
                    $user->google_id = $googleUser->id;
                    $user->email_verified_at = now(); // Verifikasi otomatis
                    $user->save();
                }
            }

            Auth::login($user);

            // alihkan berdasarkan peran
            switch ($user->role) {
                case 0: // admin
                    return redirect()->route('admin');
                case 1: // dokter
                    return redirect()->route('dokter');
                case 2: // pasien
                    return redirect()->route('pasien');
                default:
                    return redirect()->route('home');
            }
        } catch (\Exception $e) {
            throw $e;
            // return redirect('/login')->with('error', 'Gagal login dengan Google.');
        }
    }
}
