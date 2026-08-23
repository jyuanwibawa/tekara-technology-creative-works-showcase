<?php

use App\Http\Controllers\AuthController;
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

    // Mitra Industri
    Route::get('/mitra/dashboard', function () {
        return view('dashboard.mitra');
    })->name('mitra.dashboard');
});
