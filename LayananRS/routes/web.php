<?php

use App\Livewire\Counter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\admin\AdminMainController;
use App\Http\Controllers\dokter\DokterMainController;
use App\Http\Controllers\pasien\PasienMainController;


Route::get('/counter', Counter::class);
Route::get('/users', function () {
    return view('BelajarLivewire.users');
});

Route::controller(LandingpageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/daftar_dokter', 'daftarDokter')->name('daftar.dokter');
    Route::get('/riwayat', 'riwayat')->name('riwayat');
    Route::get('/jadwal_dokter', 'jadwalDokter')->name('jadwal.dokter');
    Route::get('/booking_dokter', 'bookingDokter')->name('booking.dokter');



});


// admin routes
Route::middleware(['auth', 'verified', 'rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard', 'admin')->name('admin');

            // manage dokter
            Route::get('/manage_dokter', 'manageDokter')->name('admin.manage.dokter');
            // tambah dokter
            Route::get('/tambah_dokter', 'tambahDokter')->name('admin.tambah.dokter');
            // manage pasien
            Route::get('/manage_pasien', 'managePasien')->name('admin.manage.pasien');
            // manage janji temu
            Route::get('/manage_janjitemu', 'manageJanjitemu')->name('admin.manage.janjitemu');
            // laporan & analitik
            Route::get('/laporan_analitik', 'laporanAnalitik')->name('admin.laporan.analitik');
            // setting
            Route::get('/setting', 'setting')->name('admin.setting');

        });


    });
});

// Dokter routes
Route::middleware(['auth', 'verified', 'rolemanager:dokter'])->group(function () {
    Route::prefix('dokter')->group(function () {
        Route::controller(DokterMainController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('dokter');

            // jadwal saya
            Route::get('/jadwal_saya', 'jadwalSaya')->name('dokter.jadwal.saya');
            //  riwayat pasien
            Route::get('/riwayat_pasien', 'riwayatPasien')->name('dokter.riwayat.pasien');
            // profile saya
            Route::get('/profile_saya', 'profileSaya')->name('dokter.profile.saya');
            // notifikasi
            Route::get('/notifikasi', 'notifikasi')->name('dokter.notifikasi');

        });


    });
});

// patient routes
Route::middleware(['auth', 'verified', 'rolemanager:pasien'])->group(function () {
    Route::prefix('pasien')->group(function () {
        Route::controller(PasienMainController::class)->group(function () {
            // summary
            Route::get('/summary', 'index')->name('pasien');
            // profile saya
            Route::get('/profile_saya', 'profileSaya')->name('pasien.profile.saya');
            // riwayat
            Route::get('/riwayat', 'riwayat')->name('pasien.riwayat');
            // booking
            Route::get('/booking', 'booking')->name('pasien.booking');

        });


    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
