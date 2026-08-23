<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        // Cari akun berdasarkan username
        $akun = Akun::where('username', $request->username)
                    ->where('status_aktif', 'aktif')
                    ->first();

        // Verifikasi akun & password
        if (! $akun || ! Hash::check($request->password, $akun->password_hash)) {
            return back()
                ->withInput($request->only('username'))
                ->withErrors(['username' => 'Username atau password salah.']);
        }

        // Login menggunakan guard 'akun'
        Auth::guard('akun')->login($akun, $request->boolean('remember'));

        // Update kolom terakhir_login
        $akun->update(['terakhir_login' => now()]);

        // Regenerasi session untuk keamanan
        $request->session()->regenerate();

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
