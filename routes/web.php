<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');



// ========================
// AUTH
// ========================

// ========================
// DASHBOARD (setelah login)
// ========================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Modul lain
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
});

// ========================
// ROUTE HALAMAN BACKEND UTAMA
// ========================
Route::get('/main', [MainController::class, 'index'])->name('main');

Route::get('/pengguna', [MainController::class, 'pengguna'])->name('pengguna');
Route::get('/level', [MainController::class, 'level'])->name('level');
Route::get('/pegawai', [MainController::class, 'pegawai'])->name('pegawai');
Route::get('/master', [MainController::class, 'master'])->name('master');
Route::get('/jadwal', [MainController::class, 'jadwal'])->name('jadwal');
Route::get('/pendaftaran', [MainController::class, 'pendaftaran'])->name('pendaftaran');
Route::get('/diagnosa', [MainController::class, 'diagnosa'])->name('diagnosa');
Route::get('/tindakan', [MainController::class, 'tindakan'])->name('tindakan');
Route::get('/supplier', [MainController::class, 'supplier'])->name('supplier');

// ========================
// ROUTE MODUL KHUSUS
// ========================

// Dokter
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::post('/dokter/simpan', [DokterController::class, 'store'])->name('dokter.store');

// Pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');

// Obat
Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
