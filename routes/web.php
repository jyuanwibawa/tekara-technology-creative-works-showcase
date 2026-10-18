<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminCoordinatorController;
use App\Http\Controllers\AdminPartnerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// -----------------------------------------------------------------------
// Redirect root ke halaman login
// -----------------------------------------------------------------------
Route::get('/', function () {
    return redirect()->route('login');
});

// -----------------------------------------------------------------------
// Auth – Guest only (belum login)
// -----------------------------------------------------------------------
Route::middleware('guest:akun')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// -----------------------------------------------------------------------
// Auth – Logout (sudah login)
// -----------------------------------------------------------------------
Route::middleware('auth:akun')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/coming-soon', function () {
        return view('welcome');
    })->name('coming-soon');
});

// -----------------------------------------------------------------------
// Dashboard per role (dilindungi middleware auth:akun)
// -----------------------------------------------------------------------
Route::middleware('auth:akun')->group(function () {

    // Mahasiswa
    Route::get('/mahasiswa/dashboard', function () {
        return view('dashboard.mahasiswa');
    })->name('mahasiswa.dashboard');

    // Dosen
    Route::get('/dosen/dashboard', function () {
        return view('dashboard.dosen');
    })->name('dosen.dashboard');

    // Admin
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin');
    })->name('admin.dashboard');

    // Kelola Data Kelas Capstone
    Route::get('/admin/kelas-capstone', function () {
        return view('dashboard.admin.kelas');
    })->name('admin.kelas-capstone');

    Route::get('/admin/keanggotaan-tim', function () {
        return view('dashboard.admin.keanggotaan-tim');
    })->name('admin.keanggotaan-tim');

    Route::get('/admin/koordinator', [AdminCoordinatorController::class, 'index'])
        ->name('admin.koordinator');
    Route::post('/admin/koordinator', [AdminCoordinatorController::class, 'store'])
        ->name('admin.koordinator.store');

    // Mitra Industri
    Route::get('/admin/mitra-industri', [AdminPartnerController::class, 'index'])
        ->name('admin.mitra-industri');
    Route::post('/admin/mitra-industri', [AdminPartnerController::class, 'store'])
        ->name('admin.mitra-industri.store');
    Route::put('/admin/mitra-industri/{mitra}', [AdminPartnerController::class, 'update'])
        ->name('admin.mitra-industri.update');
    Route::delete('/admin/mitra-industri/{mitra}', [AdminPartnerController::class, 'destroy'])
        ->name('admin.mitra-industri.destroy');

    Route::get('/mitra/dashboard', function () {
        return view('dashboard.mitra');
    })->name('mitra.dashboard');
});
