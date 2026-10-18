<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\KelasCapstone;
use App\Models\RiwayatKoordinator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AdminCoordinatorController extends Controller
{
    public function index(): View
    {
        $this->ensureAdmin();

        $kelas = KelasCapstone::with(['mataKuliah.programStudi', 'koordinator.akun'])
            ->orderByDesc('tahun_akademik')
            ->orderBy('periode_semester')
            ->get();

        $dosen = Dosen::whereHas('akun', fn (Builder $query) => $query
            ->where('role', 'dosen')
            ->where('status_aktif', 'aktif'))
            ->with('akun')
            ->orderBy('nama_dosen')
            ->get();

        $riwayat = RiwayatKoordinator::latest('tanggal_sk')
            ->latest('id')
            ->limit(8)
            ->get();

        $riwayatPerKelas = RiwayatKoordinator::whereIn('id', function ($query) {
            $query->selectRaw('MAX(id)')
                ->from('riwayat_koordinator')
                ->groupBy('id_kelas');
        })->get()->keyBy('id_kelas');

        $bebanDosen = $kelas
            ->filter(fn (KelasCapstone $item) => $item->nidn_koordinator)
            ->groupBy(fn (KelasCapstone $item) => $item->tahun_akademik.'|'.$item->periode_semester)
            ->map(fn ($semesterKelas) => $semesterKelas->countBy('nidn_koordinator'));

        $kelasBelumDitetapkan = $kelas->filter(fn (KelasCapstone $item) => ! $item->koordinator);

        return view('dashboard.admin.koordinator', [
            'kelas' => $kelas,
            'dosen' => $dosen,
            'riwayat' => $riwayat,
            'riwayatPerKelas' => $riwayatPerKelas,
            'jumlahRiwayat' => RiwayatKoordinator::count(),
            'bebanDosen' => $bebanDosen,
            'kelasBelumDitetapkan' => $kelasBelumDitetapkan,
            'jumlahKoordinator' => $kelas->filter(fn (KelasCapstone $item) => $item->koordinator)->pluck('nidn_koordinator')->unique()->count(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->ensureAdmin();

        $validated = $request->validate([
            'id_kelas' => ['required', 'string', 'exists:kelas_capstone,id_kelas'],
            'nidn_koordinator' => [
                'required',
                'string',
                'exists:dosen,nidn',
                function (string $attribute, mixed $value, \Closure $fail): void {
                    $isActiveLecturer = Dosen::where('nidn', $value)
                        ->whereHas('akun', fn (Builder $query) => $query
                            ->where('role', 'dosen')
                            ->where('status_aktif', 'aktif'))
                        ->exists();

                    if (! $isActiveLecturer) {
                        $fail('Pilih dosen dengan akun aktif.');
                    }
                },
            ],
            'nomor_sk' => ['required', 'string', 'max:255'],
            'tanggal_sk' => ['required', 'date'],
            'alasan' => ['nullable', 'string', 'max:2000'],
        ], [
            'id_kelas.required' => 'Pilih kelas Capstone.',
            'nidn_koordinator.required' => 'Pilih dosen koordinator.',
            'nomor_sk.required' => 'Nomor SK wajib diisi.',
            'tanggal_sk.required' => 'Tanggal berlaku SK wajib diisi.',
        ]);

        DB::transaction(function () use ($validated, $request): void {
            $kelas = KelasCapstone::whereKey($validated['id_kelas'])
                ->lockForUpdate()
                ->firstOrFail();

            $dosen = Dosen::whereKey($validated['nidn_koordinator'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($kelas->nidn_koordinator === $dosen->nidn) {
                throw ValidationException::withMessages([
                    'nidn_koordinator' => 'Dosen tersebut sudah menjadi koordinator kelas ini.',
                ]);
            }

            $jumlahKelasDosen = KelasCapstone::where('nidn_koordinator', $dosen->nidn)
                ->where('tahun_akademik', $kelas->tahun_akademik)
                ->where('periode_semester', $kelas->periode_semester)
                ->where('id_kelas', '!=', $kelas->id_kelas)
                ->lockForUpdate()
                ->count();

            if ($jumlahKelasDosen >= 2) {
                throw ValidationException::withMessages([
                    'nidn_koordinator' => 'Dosen telah mencapai batas dua kelas pada tahun akademik dan semester ini.',
                ]);
            }

            $koordinatorSebelum = $kelas->koordinator()->first();

            $kelas->nidn_koordinator = $dosen->nidn;
            $kelas->save();

            RiwayatKoordinator::create([
                'id_kelas' => $kelas->id_kelas,
                'nidn_sebelum' => $koordinatorSebelum?->nidn,
                'nama_sebelum' => $koordinatorSebelum?->nama_dosen,
                'nidn_sesudah' => $dosen->nidn,
                'nama_sesudah' => $dosen->nama_dosen,
                'nomor_sk' => $validated['nomor_sk'],
                'tanggal_sk' => $validated['tanggal_sk'],
                'alasan' => $validated['alasan'] ?? null,
                'ditetapkan_oleh' => (string) $request->user('akun')->id_akun,
            ]);
        });

        return redirect()
            ->route('admin.koordinator')
            ->with('success', 'Penetapan dosen koordinator berhasil disimpan.');
    }

    private function ensureAdmin(): void
    {
        abort_unless(auth('akun')->user()?->role === 'admin', 403);
    }
}
