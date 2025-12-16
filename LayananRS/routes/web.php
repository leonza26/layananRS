<?php

use App\Http\Controllers\admin\AdminMainController;
use App\Http\Controllers\dokter\DokterMainController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\pasien\PasienMainController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;

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

            // manage
            Route::get('/manage_dokter', 'manageDokter')->name('admin.manage.dokter');

            // view tambah dokter
            Route::get('/tambah_dokter', 'tambahDokter')->name('admin.tambah.dokter');
            // tambah dokter
            Route::post('/store_dokter', 'storeDokter')->name('admin.store.dokter');
            // edit dokter
            Route::get('/edit_dokter/{id}', 'editDokter')->name('admin.edit.dokter');
            // update dokter
            Route::put('/update_dokter/{id}', 'updateDokter')->name('admin.update.dokter');
            // hapus dokter
            Route::delete('/delete_dokter/{id}', 'deleteDokter')->name('admin.delete.dokter');

            Route::get('/manage_pasien', 'managePasien')->name('admin.manage.pasien');

            // deleyte pasien
            Route::delete('/delete_pasien/{id}', 'deletePasien')->name('admin.delete.pasien');

            Route::get('/manage_janjitemu', 'manageJanjitemu')->name('admin.manage.janjitemu');
            Route::get('/laporan_analitik', 'laporanAnalitik')->name('admin.laporan.analitik');
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
            // store jadwal
            Route::post('/jadwal_saya', 'storeJadwal')->name('dokter.store.jadwal');
            // daftar janji temu
            Route::get('/daftar_janjitemu', 'daftarJanjitemu')->name('dokter.janji.pasien');
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

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
