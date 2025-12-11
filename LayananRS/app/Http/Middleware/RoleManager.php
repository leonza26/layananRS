<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {

        // mengecek apakaha tidak ada  autentikasi
        if( !Auth::check() ){
            return redirect()->route('login');
        }


        // menegcek apakah ada autentikasi login berdasarkana role
        $authUserRole = Auth::user()->role;

        $roles = [
            'admin' => 0,
            'dokter' => 1,
            'pasien' => 2,
        ];

        if (isset($roles[$role]) && $authUserRole == $roles[$role]) {
            return $next($request);
        }


        // mengarahkan role ke halaman route
        switch($authUserRole){
            case 0;
                return redirect()->route('admin');

            case 1;
                return redirect()->route('dokter');

            case 2;
                return redirect()->route('pasien');
            default:
                return redirect()->route('home'); // fallback
        }


    }
}
