<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\MitraIndustri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminPartnerController extends Controller
{
    public function index(): View
    {
        $this->ensureAdmin();

        $mitra = MitraIndustri::with(['akun' => fn ($query) => $query
            ->where('role', 'mitra')])
            ->orderByDesc('updated_at')
            ->orderBy('nama_mitra')
            ->get();

        return view('dashboard.admin.mitra-industri', [
            'mitra' => $mitra,
            'jumlahMitra' => $mitra->count(),
            'jumlahJenis' => $mitra->pluck('jenis_mitra')->filter()->unique()->count(),
            'jumlahPic' => $mitra->filter(fn (MitraIndustri $item) => filled($item->kontak_person))->count(),
            'jumlahAkunAktif' => $mitra->filter(fn (MitraIndustri $item) => $item->akun?->status_aktif === 'aktif')->count(),
            'jenisList' => $mitra->pluck('jenis_mitra')->filter()->unique()->sort()->values(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'nama_mitra' => ['required', 'string', 'max:255'],
            'jenis_mitra' => ['nullable', 'string', 'max:255'],
            'kontak_person' => ['nullable', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:5000'],
        ]);

        $validated['id_mitra'] = $this->generatePartnerId();
        MitraIndustri::create($validated);

        return redirect()
            ->route('admin.mitra-industri')
            ->with('success', 'Mitra industri berhasil ditambahkan.');
    }

    public function update(Request $request, string $mitra): RedirectResponse
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'nama_mitra' => ['required', 'string', 'max:255'],
            'jenis_mitra' => ['nullable', 'string', 'max:255'],
            'kontak_person' => ['nullable', 'string', 'max:255'],
            'alamat' => ['nullable', 'string', 'max:5000'],
        ]);

        MitraIndustri::whereKey($mitra)->firstOrFail()->update($validated);

        return redirect()
            ->route('admin.mitra-industri')
            ->with('success', 'Data mitra industri berhasil diperbarui.');
    }

    public function destroy(string $mitra): RedirectResponse
    {
        $this->ensureAdmin();

        $partner = MitraIndustri::whereKey($mitra)->firstOrFail();
        $hasAccount = Akun::where('role', 'mitra')
            ->where('id_referensi', $partner->id_mitra)
            ->exists();

        if ($hasAccount) {
            return redirect()
                ->route('admin.mitra-industri')
                ->with('error', 'Mitra masih memiliki akun login. Nonaktifkan atau lepaskan akun tersebut sebelum menghapus data mitra.');
        }

        DB::transaction(fn () => $partner->delete());

        return redirect()
            ->route('admin.mitra-industri')
            ->with('success', 'Mitra industri berhasil dihapus.');
    }

    private function generatePartnerId(): string
    {
        do {
            $id = 'MTR-'.Str::upper(Str::random(12));
        } while (MitraIndustri::whereKey($id)->exists());

        return $id;
    }

    private function ensureAdmin(): void
    {
        abort_unless(auth('akun')->user()?->role === 'admin', 403);
    }
}
