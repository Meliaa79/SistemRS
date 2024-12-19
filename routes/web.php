<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\DetailResepController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\KunjunganPasienController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/redirect', [AuthController::class, 'redirect'])->name('auth.redirect');
    Route::post('logout', function () {
        Auth::logout();
        return redirect()->route('login.tampil')->with('success', 'Anda telah logout.');
    })->name('logout');
});

Route::middleware(['admin'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');

        Route::get('/dokter', [DokterController::class, 'tampil'])->name('dokter.tampil');
        Route::get('/dokter/tambah', [DokterController::class, 'tambah'])->name('dokter.tambah');
        Route::post('/dokter/submit', [DokterController::class, 'submit'])->name('dokter.submit');
        Route::get('/dokter/edit/{id_dokter}', [DokterController::class, 'edit'])->name('dokter.edit');
        Route::post('/dokter/update/{id_dokter}', [DokterController::class, 'update'])->name('dokter.update');
        Route::post('/dokter/delete/{id_dokter}', [DokterController::class, 'delete'])->name('dokter.delete');


        Route::get('/pasien', [PasienController::class, 'tampil'])->name('pasien.tampil');
        Route::get('/pasien/tambah', [PasienController::class, 'tambah'])->name('pasien.tambah');
        Route::post('/pasien/submit', [PasienController::class, 'submit'])->name('pasien.submit');
        Route::get('/pasien/edit/{id_pasien}', [PasienController::class, 'edit'])->name('pasien.edit');
        Route::post('/pasien/update/{id_pasien}', [PasienController::class, 'update'])->name('pasien.update');
        Route::post('/pasien/delete/{id_pasien}', [PasienController::class, 'delete'])->name('pasien.delete');

        Route::resource('jadwal_dokter', JadwalDokterController::class)->names([
            'index' => 'jadwal_dokter.index',
            'create' => 'jadwal_dokter.tambah',
            'store' => 'jadwal_dokter.store',
            'show' => 'jadwal_dokter.show',
            'edit' => 'jadwal_dokter.edit',
            'update' => 'jadwal_dokter.update',
            'destroy' => 'jadwal_dokter.destroy',
        ]);
        Route::get('/jadwal_dokter/{id_dokter}', [JadwalDokterController::class, 'getJadwalByDokter']);


        Route::get('/ruangan', [RuanganController::class, 'tampil'])->name('ruangan.tampil');
        Route::get('/ruangan/tambah', [RuanganController::class, 'tambah'])->name('ruangan.tambah');
        Route::post('/ruangan/submit', [RuanganController::class, 'submit'])->name('ruangan.submit');
        Route::get('/ruangan/edit/{id_ruangan}', [RuanganController::class, 'edit'])->name('ruangan.edit');
        Route::post('/ruangan/update/{id_ruangan}', [RuanganController::class, 'update'])->name('ruangan.update');
        Route::post('/ruangan/delete/{id_ruangan}', [RuanganController::class, 'delete'])->name('ruangan.delete');

        Route::resource('kunjungan_pasien', KunjunganPasienController::class)->names([
            'index' => 'kunjungan_pasien.index',
            'create' => 'kunjungan_pasien.tambah',
            'store' => 'kunjungan_pasien.store',
            'show' => 'kunjungan_pasien.show',
            'edit' => 'kunjungan_pasien.edit',
            'update' => 'kunjungan_pasien.update',
            'destroy' => 'kunjungan_pasien.destroy',
        ]);
        Route::get('/kunjungan_pasien/detail', [ObatController::class, 'detail'])->name('kunjungan_pasien.detail');
        
        Route::get('/obat', [ObatController::class, 'tampil'])->name('obat.tampil');
        Route::get('/resep', [ResepObatController::class, 'tampil'])->name('resep_obat.tampil');
    });
});

Route::middleware(['dokter'])->group(function () {
    Route::group(['prefix' => 'dokter', 'as' => 'dokter.'], function () {
        Route::get('/dashboard', [Controller::class, 'dokter_dashboard'])->name('dashboard');
        Route::get('/jadwal_dokter', [JadwalDokterController::class, 'index_dokter'])->name('jadwal_dokter.index');
        Route::resource('kunjungan_pasien', KunjunganPasienController::class)->names([
            'index' => 'kunjungan_pasien.index',
            'create' => 'kunjungan_pasien.tambah',
            'store' => 'kunjungan_pasien.store',
            'show' => 'kunjungan_pasien.show',
            'edit' => 'kunjungan_pasien.edit',
            'update' => 'kunjungan_pasien.update',
            'destroy' => 'kunjungan_pasien.destroy',
        ]);
        Route::post('/kunjungan/resep/{id_kunjungan}', [KunjunganPasienController::class, 'resep'])->name('kunjungan.resep');
        Route::delete('/kunjungan/destroy_resep/{id}', [KunjunganPasienController::class, 'destroy_resep'])->name('kunjungan.destroy_resep');
        Route::get('/pasien', [PasienController::class, 'tampil'])->name('pasien.tampil');
    });
});
Route::middleware(['apoteker'])->group(function () {
    Route::group(['prefix' => 'apoteker', 'as' => 'apoteker.'], function () {
        Route::get('/dashboard', [Controller::class, 'apoteker_dashboard'])->name('dashboard');
        Route::get('/obat', [ObatController::class, 'tampil'])->name('obat.tampil');
        Route::get('/obat/tambah', [ObatController::class, 'tambah'])->name('obat.tambah');
        Route::post('/obat/submit', [ObatController::class, 'submit'])->name('obat.submit');
        Route::get('/obat/edit/{id_obat}', [ObatController::class, 'edit'])->name('obat.edit');
        Route::post('/obat/update/{id_obat}', [ObatController::class, 'update'])->name('obat.update');
        Route::post('/obat/delete/{id_obat}', [ObatController::class, 'delete'])->name('obat.delete');

        Route::get('/resep', [ResepObatController::class, 'tampil'])->name('resep_obat.tampil');
        Route::get('/resep/edit/{id_kunjungan}', [KunjunganPasienController::class, 'edit'])->name('resep.edit');
        Route::get('/resep_siap/{id_kunjungan}', [KunjunganPasienController::class, 'resep_siap'])->name('resep_siap');


        Route::get('/resep/tambah', [ResepObatController::class, 'tambah'])->name('resep_obat.tambah');
        Route::post('/resep/submit', [ResepObatController::class, 'submit'])->name('resep_obat.submit');
        Route::get('/resep/edit/{id_resep}', [ResepObatController::class, 'edit'])->name('resep_obat.edit');
        Route::put('/resep/update/{id_resep}', [ResepObatController::class, 'update'])->name('resep_obat.update');
        Route::post('/resep/delete/{id_resep}', [ResepObatController::class, 'delete'])->name('resep_obat.delete');
    });
});
Route::middleware(['pasien'])->group(function () {
    Route::group(['prefix' => 'pasien', 'as' => 'pasien.'], function () {
        Route::get('/riwayat', [KunjunganPasienController::class, 'index'])->name('riwayat');
        Route::get('/riwayat_detail/{id_kunjungan}', [KunjunganPasienController::class, 'edit'])->name('riwayat.detail');
        Route::get('/jadwal_dokter', [JadwalDokterController::class, 'index'])->name('jadwal_dokter.index');
    });
});
Route::middleware('guest')->group(function () {
    Route::get('/registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi.tampil');
    Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');

    Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login.tampil');
    Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');
});













Route::resource('kunjungan_pasien', KunjunganPasienController::class);

Route::resource('detail_resep', DetailResepController::class);
