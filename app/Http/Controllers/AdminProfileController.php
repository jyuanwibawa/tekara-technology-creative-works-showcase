<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Akun;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    public function show(): View
    {
        $account = $this->adminAccount();
        $profile = Admin::whereKey($account->id_referensi)->firstOrFail();

        return view('dashboard.admin.profil', [
            'account' => $account,
            'profile' => $profile,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $account = $this->adminAccount();
        $profile = Admin::whereKey($account->id_referensi)->firstOrFail();

        $validated = $request->validate([
            'nama_admin' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('admin', 'email')->ignore($profile->getKey(), 'id_admin'),
            ],
            'current_password' => ['nullable', 'required_with:password', 'string'],
            'password' => ['nullable', 'required_with:current_password', 'string', 'min:8', 'confirmed'],
        ], [
            'nama_admin.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email institusi wajib diisi.',
            'email.email' => 'Masukkan alamat email yang valid.',
            'email.unique' => 'Email tersebut sudah digunakan akun lain.',
            'current_password.required_with' => 'Masukkan kata sandi saat ini untuk mengganti kata sandi.',
            'password.required_with' => 'Masukkan kata sandi baru.',
            'password.min' => 'Kata sandi baru minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok.',
        ]);

        if (! empty($validated['password']) && ! Hash::check($validated['current_password'], $account->password_hash)) {
            throw ValidationException::withMessages([
                'current_password' => 'Kata sandi saat ini tidak sesuai.',
            ]);
        }

        $profile->update([
            'nama_admin' => $validated['nama_admin'],
            'email' => $validated['email'],
        ]);

        if (! empty($validated['password'])) {
            $account->forceFill([
                'password_hash' => Hash::make($validated['password']),
            ])->save();
        }

        return redirect()
            ->route('admin.profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    private function adminAccount(): Akun
    {
        $account = Auth::guard('akun')->user();

        abort_unless($account instanceof Akun && $account->role === 'admin', 403);

        return $account;
    }
}
