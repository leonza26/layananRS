<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Pasien;
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
                    'role' => 2, // default role pasien
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

        //  buat pasien jika user role pasien dan belum punya data pasien
                Pasien::firstOrCreate(
                    ['user_id' => $user->id],
                    [
                        'name' => $user->name,
                        'phone_number' => null,
                    ]
                );
            

            // alihkan ke halaman loading agar animasi tampil (sama seperti login manual)
            return redirect()->route('loading');
        } catch (\Exception $e) {
            throw $e;
            // return redirect('/login')->with('error', 'Gagal login dengan Google.');
        }
    }
}
