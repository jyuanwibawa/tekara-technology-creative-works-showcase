<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    // =====================================================================
    // Login
    // =====================================================================

    /**
     * Tampilkan halaman login.
     */
    public function showLogin(): View|RedirectResponse
    {
        // Jika sudah login, redirect ke dashboard sesuai role
        if (Auth::guard('akun')->check()) {
            return $this->redirectByRole(Auth::guard('akun')->user()->role);
        }

        return view('auth.login');
    }

    /**
     * Proses login dari form.
     */
    public function login(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Verifikasi kredensial dan simpan sesi melalui guard akun
        $guard = Auth::guard('akun');
        if (! $guard->attempt([
            'username' => $request->username,
            'status_aktif' => 'aktif',
            'password' => $request->password,
        ], $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('username'))
                ->withErrors(['username' => 'Username atau password salah.']);
        }

        // Regenerasi session untuk keamanan
        $request->session()->regenerate();

        $akun = $guard->user();

        // Update kolom terakhir_login
        $akun->update(['terakhir_login' => now()]);

        return $this->redirectByRole($akun->role);
    }

    // =====================================================================
    // Logout
    // =====================================================================

    /**
     * Proses logout.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('akun')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }

    // =====================================================================
    // Helper
    // =====================================================================

    /**
     * Redirect ke halaman dashboard sesuai role.
     */
    private function redirectByRole(string $role): RedirectResponse
    {
        return match ($role) {
            'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
            'dosen'     => redirect()->route('dosen.dashboard'),
            'admin'     => redirect()->route('admin.dashboard'),
            'mitra'     => redirect()->route('mitra.dashboard'),
            default     => redirect('/'),
        };
    }
}
