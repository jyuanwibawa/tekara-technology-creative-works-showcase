@php
    $totalKelas = $kelas->count();
    $koordinatorTerisi = $kelas->filter(fn ($item) => $item->koordinator)->count();
    $menunggu = $totalKelas - $koordinatorTerisi;
    $persentaseTerisi = $totalKelas ? round(($koordinatorTerisi / $totalKelas) * 100, 1) : 0;
    $semesterTerkini = $kelas->first();
@endphp

<div class="relative w-full overflow-hidden">
    <div class="absolute -top-32 right-12 w-96 h-96 bg-orange-200/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -top-20 left-1/3 w-80 h-80 bg-sky-200/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="relative w-full px-4 lg:px-6 py-6 space-y-6">
        @if (session('success'))
            <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800" role="status">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any() && ! old('id_kelas'))
            <div class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <section class="flex flex-col xl:flex-row xl:items-center justify-between gap-4">
            <div class="space-y-2">
                <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-500">
                    <a class="hover:text-[#a04100] transition-colors flex items-center gap-1" href="{{ route('admin.dashboard') }}">
                        <span class="material-symbols-outlined text-[15px]">home</span>
                        Dashboard
                    </a>
                    <span class="text-slate-300">/</span>
                    <span>Data Master</span>
                    <span class="text-slate-300">/</span>
                    <span class="font-semibold text-slate-800">Penetapan Dosen Koordinator</span>
                </nav>
                <div class="flex items-center gap-3 flex-wrap">
                    <h1 class="font-display text-3xl font-extrabold text-slate-900 tracking-tight">Penetapan Dosen Koordinator</h1>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-orange-100 text-orange-800 text-xs font-bold tracking-wide">UC-03</span>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-100 text-slate-600 text-xs font-semibold">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-600"></span>
                        FILKOM UB
                    </span>
                </div>
                <p class="text-sm text-slate-500 max-w-3xl">Kelola alokasi dosen koordinator untuk setiap kelas Capstone dan catat dasar penugasan berdasarkan SK.</p>
            </div>
            <div class="flex items-center gap-2 flex-wrap">
                <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 shadow-sm transition-all text-sm font-semibold" id="btn-export-assignment-history" type="button">
                    <span class="material-symbols-outlined text-[18px]">file_download</span>
                    Unduh Riwayat SK (CSV)
                </button>
                <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white shadow-md transition-all text-sm font-semibold group" type="button" data-open-assignment>
                    <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-[#f37021] text-white">
                        <span class="material-symbols-outlined text-[14px]">add</span>
                    </span>
                    Tetapkan / Ganti Koordinator
                </button>
            </div>
        </section>

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" aria-label="Ringkasan penetapan koordinator">
            <article class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 relative overflow-hidden">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">Total Kelas Capstone</p>
                        <p class="font-display text-3xl text-slate-900 mt-1">{{ $totalKelas }}</p>
                    </div>
                    <span class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center material-symbols-outlined">class</span>
                </div>
                <div class="mt-4 flex items-center justify-between text-xs">
                    <span class="text-slate-500">Seluruh periode</span>
                    <span class="font-semibold text-slate-700">{{ $kelas->pluck('mataKuliah.id_prodi')->filter()->unique()->count() }} Program Studi</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-slate-200"></div>
            </article>
            <article class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 relative overflow-hidden">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">Koordinator Terisi</p>
                        <div class="flex items-baseline gap-2 mt-1">
                            <p class="font-display text-3xl text-slate-900">{{ $koordinatorTerisi }}</p>
                            <span class="text-sm text-slate-500">/ {{ $totalKelas }} Kelas</span>
                        </div>
                    </div>
                    <span class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center material-symbols-outlined">verified_user</span>
                </div>
                <div class="mt-4 flex items-center justify-between text-xs">
                    <span class="inline-flex items-center gap-1.5 text-slate-700"><span class="w-2 h-2 rounded-full bg-emerald-500"></span>{{ $persentaseTerisi }}% Terpenuhi</span>
                    <span class="text-slate-500">{{ $jumlahKoordinator }} Dosen Unik</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-emerald-200"></div>
            </article>
            <article class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 relative overflow-hidden">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">Menunggu Penetapan</p>
                        <p class="font-display text-3xl {{ $menunggu ? 'text-[#a04100]' : 'text-slate-900' }} mt-1">{{ $menunggu }}</p>
                    </div>
                    <span class="w-10 h-10 rounded-xl bg-orange-100 text-orange-800 flex items-center justify-center material-symbols-outlined">pending_actions</span>
                </div>
                <div class="mt-4 flex items-center justify-between text-xs">
                    <span class="font-semibold text-orange-900 bg-orange-100 px-2 py-1 rounded">{{ $kelasBelumDitetapkan->first()?->id_kelas ?? 'Semua terisi' }}</span>
                    <span class="text-slate-500">{{ $menunggu ? 'Perlu dialokasikan' : 'Tidak ada aksi' }}</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-orange-300"></div>
            </article>
            <article class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 relative overflow-hidden">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">Catatan Penetapan</p>
                        <p class="font-display text-3xl text-slate-900 mt-1">{{ $jumlahRiwayat }}</p>
                    </div>
                    <span class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center material-symbols-outlined">history_edu</span>
                </div>
                <div class="mt-4 flex items-center justify-between text-xs">
                    <span class="text-slate-500">Riwayat tersimpan</span>
                    <span class="font-semibold text-sky-700">Audit SK</span>
                </div>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-slate-300"></div>
            </article>
        </section>

        <aside class="bg-sky-50 border border-sky-100 rounded-xl p-4 flex items-start gap-3 shadow-sm">
            <span class="material-symbols-outlined text-sky-700 text-[22px] shrink-0 mt-0.5">info</span>
            <p class="flex-1 text-sm text-sky-950 leading-relaxed">
                <strong class="text-slate-900">Ketentuan Penetapan Koordinator:</strong>
                Setiap kelas Capstone dipimpin satu dosen koordinator dengan beban maksimal dua kelas pada tahun akademik dan semester yang sama. Penetapan atau pergantian harus mencatat nomor dan tanggal SK sebagai dasar audit.
            </p>
        </aside>

        <section class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200" aria-label="Filter data koordinator">
            <div class="flex flex-col xl:flex-row gap-3 items-stretch xl:items-center justify-between">
                <label class="relative flex-1">
                    <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                    <input class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl outline-none focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="coordinator-search" placeholder="Cari kelas, kode MK, NIDN, atau nama dosen..." type="search">
                </label>
                <div class="flex flex-wrap items-center gap-2">
                    <select class="px-3 py-2.5 bg-slate-50 border border-slate-200 text-sm text-slate-700 rounded-xl" id="coordinator-year-filter">
                        <option value="">Semua Tahun</option>
                        @foreach ($kelas->pluck('tahun_akademik')->unique()->sortDesc() as $tahun)
                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                        @endforeach
                    </select>
                    <select class="px-3 py-2.5 bg-slate-50 border border-slate-200 text-sm text-slate-700 rounded-xl" id="coordinator-semester-filter">
                        <option value="">Semua Semester</option>
                        @foreach ($kelas->pluck('periode_semester')->unique()->sort() as $semester)
                            <option value="{{ $semester }}">{{ $semester }}</option>
                        @endforeach
                    </select>
                    <select class="px-3 py-2.5 bg-slate-50 border border-slate-200 text-sm text-slate-700 rounded-xl" id="coordinator-status-filter">
                        <option value="">Semua Status</option>
                        <option value="assigned">Sudah Ditetapkan</option>
                        <option value="unassigned">Belum Ditetapkan</option>
                    </select>
                    <select class="px-3 py-2.5 bg-slate-50 border border-slate-200 text-sm text-slate-700 rounded-xl" id="coordinator-program-filter">
                        <option value="">Semua Prodi</option>
                        @foreach ($kelas->pluck('mataKuliah.programStudi')->filter()->unique('id_prodi')->sortBy('nama_prodi') as $programStudi)
                            <option value="{{ $programStudi->id_prodi }}">{{ $programStudi->nama_prodi }}</option>
                        @endforeach
                    </select>
                    <button class="p-2.5 rounded-xl text-slate-500 hover:text-slate-800 hover:bg-slate-100" id="coordinator-reset-filters" title="Reset filter" type="button">
                        <span class="material-symbols-outlined text-[20px]">restart_alt</span>
                    </button>
                </div>
            </div>
        </section>

        <div class="grid grid-cols-1 2xl:grid-cols-12 gap-6 items-start">
            <section class="2xl:col-span-8 bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-5 py-4 bg-slate-50 border-b border-slate-100 flex items-center justify-between gap-3">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#a04100] text-[20px]">assignment_ind</span>
                        <h2 class="font-display text-base font-bold text-slate-900">Daftar Kelas &amp; Koordinator</h2>
                    </div>
                    <span class="text-xs text-slate-500 bg-white px-2.5 py-1 rounded-full shadow-sm"><span id="coordinator-visible-count">{{ $totalKelas }}</span> data</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[900px] text-left text-sm">
                        <thead class="bg-white text-slate-500 text-[11px] uppercase tracking-wider">
                            <tr>
                                <th class="py-3 px-4 font-semibold" scope="col">Mata Kuliah &amp; Kelas</th>
                                <th class="py-3 px-4 font-semibold" scope="col">Dosen Koordinator</th>
                                <th class="py-3 px-4 font-semibold hidden md:table-cell" scope="col">Nomor &amp; Tanggal SK</th>
                                <th class="py-3 px-4 font-semibold text-center" scope="col">Status</th>
                                <th class="py-3 px-4 font-semibold text-right" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="coordinator-table-body" class="divide-y divide-slate-100">
                            @forelse ($kelas as $item)
                                @php
                                    $dosenSekarang = $item->koordinator;
                                    $programStudi = $item->mataKuliah?->programStudi;
                                    $riwayatTerbaru = $riwayatPerKelas->get($item->id_kelas);
                                    $beban = $dosenSekarang
                                        ? (int) ($bebanDosen->get($item->tahun_akademik.'|'.$item->periode_semester)?->get($dosenSekarang->nidn) ?? 0)
                                        : 0;
                                    $inisial = $dosenSekarang
                                        ? collect(explode(' ', $dosenSekarang->nama_dosen))->filter()->take(2)->map(fn ($nama) => mb_substr($nama, 0, 1))->implode('')
                                        : null;
                                    $teksCari = strtolower(implode(' ', [
                                        $item->id_kelas,
                                        $item->kode_mk,
                                        $item->mataKuliah?->nama_mk ?? '',
                                        $programStudi?->nama_prodi ?? '',
                                        $dosenSekarang?->nama_dosen ?? '',
                                        $dosenSekarang?->nidn ?? '',
                                    ]));
                                @endphp
                                <tr class="coordinator-table-row hover:bg-slate-50/70 transition-colors {{ ! $dosenSekarang ? 'bg-orange-50/40' : '' }}"
                                    data-search="{{ $teksCari }}"
                                    data-year="{{ $item->tahun_akademik }}"
                                    data-semester="{{ $item->periode_semester }}"
                                    data-status="{{ $dosenSekarang ? 'assigned' : 'unassigned' }}"
                                    data-program="{{ $programStudi?->id_prodi ?? '' }}">
                                    <td class="py-4 px-4">
                                        <div class="flex flex-col">
                                            <span class="font-semibold text-[#a04100]">{{ $item->kode_mk }} · {{ $item->id_kelas }}</span>
                                            <span class="font-medium text-slate-900">{{ $item->mataKuliah?->nama_mk ?? 'Mata kuliah tidak ditemukan' }}@if ($programStudi) ({{ $programStudi->nama_prodi }})@endif</span>
                                            <span class="text-xs text-slate-500">{{ $item->periode_semester }} {{ $item->tahun_akademik }} · {{ $item->mataKuliah?->sks ?? '—' }} SKS</span>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4">
                                        @if ($dosenSekarang)
                                            <div class="flex items-center gap-3">
                                                <div class="w-9 h-9 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center text-xs font-bold shrink-0">{{ $inisial }}</div>
                                                <div class="flex flex-col min-w-0">
                                                    <span class="font-semibold text-slate-800 truncate">{{ $dosenSekarang->nama_dosen }}</span>
                                                    <span class="text-xs text-slate-500">NIDN {{ $dosenSekarang->nidn }}</span>
                                                    <span class="text-[10px] text-sky-700">Beban: {{ $beban }} Kelas (maks. 2)</span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="flex items-center gap-3">
                                                <div class="w-9 h-9 rounded-full bg-orange-100 text-orange-800 flex items-center justify-center shrink-0">
                                                    <span class="material-symbols-outlined text-lg">person_off</span>
                                                </div>
                                                <div>
                                                    <span class="font-semibold text-orange-900">Belum ditugaskan</span>
                                                    <span class="text-xs text-slate-500 block">Memerlukan koordinator</span>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 hidden md:table-cell">
                                        @if ($riwayatTerbaru)
                                            <div class="flex flex-col">
                                                <span class="font-mono text-xs font-semibold text-slate-800">{{ $riwayatTerbaru->nomor_sk }}</span>
                                                <span class="text-[11px] text-slate-500">Tgl: {{ $riwayatTerbaru->tanggal_sk->format('d M Y') }}</span>
                                            </div>
                                        @else
                                            <span class="text-xs text-slate-400 italic">Belum tercatat</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        @if ($dosenSekarang)
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold">
                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>
                                                Ditetapkan
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-orange-100 text-orange-900 text-xs font-bold">
                                                <span class="w-1.5 h-1.5 rounded-full bg-orange-600"></span>
                                                Perlu Aksi
                                            </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <div class="flex items-center justify-end gap-1">
                                            <button class="p-1.5 text-slate-600 hover:text-[#a04100] hover:bg-orange-50 rounded-lg transition-colors" data-open-assignment data-class-id="{{ $item->id_kelas }}" title="{{ $dosenSekarang ? 'Ganti koordinator' : 'Tetapkan koordinator' }}" aria-label="{{ $dosenSekarang ? 'Ganti koordinator' : 'Tetapkan koordinator' }}" type="button">
                                                <span class="material-symbols-outlined text-[19px]">{{ $dosenSekarang ? 'swap_horiz' : 'person_add' }}</span>
                                            </button>
                                            <a class="p-1.5 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-lg transition-colors" href="#riwayat-koordinator" data-history-class="{{ $item->id_kelas }}" title="Lihat riwayat penetapan" aria-label="Lihat riwayat penetapan">
                                                <span class="material-symbols-outlined text-[19px]">history</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="py-12 text-center text-sm text-slate-500">Belum ada kelas Capstone.</td></tr>
                            @endforelse
                            <tr id="coordinator-no-results" class="hidden"><td colspan="5" class="py-10 text-center text-sm text-slate-500">Tidak ada kelas yang cocok dengan filter.</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="px-5 py-3 bg-slate-50 border-t border-slate-200 text-xs text-slate-500">
                    Menampilkan <strong id="coordinator-summary-count" class="text-slate-800">{{ $totalKelas }}</strong> dari {{ $totalKelas }} kelas
                </div>
            </section>

            <div class="2xl:col-span-4 space-y-4">
                <section class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-[#a04100] text-[20px]">groups</span>
                        <h3 class="font-display text-base font-bold text-slate-900">Distribusi Beban Dosen</h3>
                    </div>
                    <p class="text-xs text-slate-500">Jumlah kelas koordinator per tahun akademik dan semester. Batas rekomendasi: 2 kelas.</p>
                    @forelse ($dosen as $pengajar)
                        @php
                            $bebanTerkini = 0;
                            if ($semesterTerkini) {
                                $bebanTerkini = (int) ($bebanDosen->get($semesterTerkini->tahun_akademik.'|'.$semesterTerkini->periode_semester)?->get($pengajar->nidn) ?? 0);
                            }
                        @endphp
                        @if ($loop->index < 6)
                            <div class="space-y-1.5">
                                <div class="flex items-center justify-between gap-2 text-xs">
                                    <span class="text-slate-800 truncate">{{ $pengajar->nama_dosen }}</span>
                                    <span class="font-semibold {{ $bebanTerkini >= 2 ? 'text-orange-800' : 'text-slate-500' }}">{{ $bebanTerkini }} / 2</span>
                                </div>
                                <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                                    <div class="h-2 rounded-full {{ $bebanTerkini >= 2 ? 'bg-orange-600' : 'bg-sky-600' }}" style="width: {{ min(100, $bebanTerkini * 50) }}%"></div>
                                </div>
                            </div>
                        @endif
                    @empty
                        <p class="text-sm text-slate-500">Belum ada dosen dengan akun aktif.</p>
                    @endforelse
                    @if ($dosen->isNotEmpty())
                        @if ($semesterTerkini)
                            <p class="text-[11px] text-slate-400">Periode: {{ $semesterTerkini->tahun_akademik }} · {{ $semesterTerkini->periode_semester }}</p>
                        @endif
                    @endif
                </section>

                <section class="bg-slate-100 rounded-2xl p-5 shadow-sm space-y-2">
                    <div class="flex items-center gap-2 text-slate-900">
                        <span class="material-symbols-outlined text-[#a04100] text-[20px]">help_outline</span>
                        <h4 class="text-sm font-bold">Panduan Alur SK</h4>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed">Pastikan nomor dan tanggal SK penugasan telah disahkan sebelum menetapkan atau mengganti koordinator. Setiap perubahan akan tersimpan di riwayat audit.</p>
                </section>
            </div>
        </div>

        <section class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200 space-y-4" id="riwayat-koordinator">
            <div class="flex items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-[#a04100] text-[20px]">manage_history</span>
                    <h3 class="font-display text-base font-bold text-slate-900">Riwayat Audit Penetapan Koordinator</h3>
                </div>
                <span class="text-xs text-slate-500">Log SK tersimpan</span>
            </div>
            <div class="space-y-3">
                @forelse ($riwayat as $log)
                    <article class="coordinator-history-row p-4 rounded-xl bg-slate-50 flex flex-col lg:flex-row lg:items-center justify-between gap-3"
                        data-history-row-class="{{ $log->id_kelas }}"
                        data-history-sk="{{ $log->nomor_sk }}"
                        data-history-previous="{{ $log->nama_sebelum ?? 'Penetapan perdana' }}"
                        data-history-current="{{ $log->nama_sesudah }}"
                        data-history-date="{{ $log->tanggal_sk->format('d M Y') }}"
                        data-history-reason="{{ $log->alasan ?? '' }}"
                        data-history-admin="{{ $log->ditetapkan_oleh }}">
                        <div class="flex items-start gap-3 min-w-0">
                            <span class="w-8 h-8 rounded-full bg-orange-100 text-orange-800 flex items-center justify-center shrink-0">
                                <span class="material-symbols-outlined text-base">{{ $log->nama_sebelum ? 'sync_alt' : 'how_to_reg' }}</span>
                            </span>
                            <div class="min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="text-sm font-semibold text-slate-900">{{ $log->id_kelas }}</span>
                                    <span class="px-2 py-0.5 rounded bg-white border border-slate-200 text-slate-600 text-[11px] font-mono">SK: {{ $log->nomor_sk }}</span>
                                </div>
                                <div class="mt-1 flex items-center gap-2 flex-wrap text-sm">
                                    <span class="{{ $log->nama_sebelum ? 'text-slate-500 line-through' : 'text-slate-500 italic' }}">{{ $log->nama_sebelum ?? 'Penetapan perdana' }}</span>
                                    <span class="material-symbols-outlined text-[#a04100] text-[14px]">arrow_forward</span>
                                    <span class="font-semibold text-[#a04100]">{{ $log->nama_sesudah }}</span>
                                </div>
                                @if ($log->alasan)
                                    <p class="text-xs text-slate-500 mt-1">Alasan: {{ $log->alasan }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col lg:items-end shrink-0 text-xs text-slate-500">
                            <span class="font-semibold text-slate-800">{{ $log->tanggal_sk->format('d M Y') }}</span>
                            <span>Admin ID: {{ $log->ditetapkan_oleh }}</span>
                        </div>
                    </article>
                @empty
                    <p class="py-6 text-center text-sm text-slate-500">Belum ada riwayat penetapan yang tercatat.</p>
                @endforelse
            </div>
        </section>
    </div>
</div>

@php
    $bebanUntukForm = $bebanDosen->map(fn ($count) => $count->toArray())->toArray();
@endphp
<div class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-4" id="coordinator-modal" role="dialog" aria-modal="true" aria-labelledby="coordinator-modal-title" data-load-map='@json($bebanUntukForm)'>
    <div class="bg-white rounded-2xl max-w-xl w-full shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">
        <div class="px-6 py-4 bg-slate-900 text-white flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="material-symbols-outlined text-orange-300 text-[24px]">assignment_turned_in</span>
                <div>
                    <h3 class="font-display text-lg font-bold" id="coordinator-modal-title">Tetapkan / Ganti Koordinator</h3>
                    <p class="text-xs text-slate-300">Cantumkan dasar penugasan resmi</p>
                </div>
            </div>
            <button class="p-1 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800" id="coordinator-modal-close" type="button" aria-label="Tutup">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>
        <form class="p-6 space-y-4 overflow-y-auto" action="{{ route('admin.koordinator.store') }}" method="POST" id="coordinator-assignment-form">
            @csrf
            @if ($errors->any())
                <div class="rounded-lg border border-rose-200 bg-rose-50 p-3 text-sm text-rose-800" role="alert">{{ $errors->first() }}</div>
            @endif
            <label class="block text-sm font-semibold text-slate-800" for="assignment-class">
                Pilih Kelas Capstone
                <select class="mt-1 w-full bg-slate-50 text-sm text-slate-800 py-2.5 px-3 rounded-xl border border-slate-200 focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="assignment-class" name="id_kelas" required>
                    <option value="">Pilih kelas...</option>
                    @foreach ($kelas as $item)
                        <option value="{{ $item->id_kelas }}" data-current-coordinator="{{ $item->koordinator?->nama_dosen ?? 'Belum ditugaskan' }}" data-current-nidn="{{ $item->nidn_koordinator }}" data-term="{{ $item->tahun_akademik.'|'.$item->periode_semester }}" @selected(old('id_kelas') === $item->id_kelas)>
                            {{ $item->kode_mk }} · {{ $item->id_kelas }} — {{ $item->mataKuliah?->nama_mk }} ({{ $item->tahun_akademik }} {{ $item->periode_semester }})
                        </option>
                    @endforeach
                </select>
            </label>
            <div class="p-3 bg-slate-50 rounded-xl flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-full bg-slate-200 text-slate-700 flex items-center justify-center">
                        <span class="material-symbols-outlined text-base">person</span>
                    </span>
                    <div>
                        <span class="text-[11px] text-slate-500 uppercase tracking-wider block">Koordinator Saat Ini</span>
                        <span class="text-sm font-semibold text-slate-800" id="current-coordinator">Pilih kelas terlebih dahulu</span>
                    </div>
                </div>
            </div>
            <label class="block text-sm font-semibold text-slate-800" for="assignment-lecturer">
                Pilih Dosen Pengganti / Baru
                <select class="mt-1 w-full bg-slate-50 text-sm text-slate-800 py-2.5 px-3 rounded-xl border border-slate-200 focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="assignment-lecturer" name="nidn_koordinator" required>
                    <option value="">Pilih dosen dengan akun aktif...</option>
                    @foreach ($dosen as $pengajar)
                        <option value="{{ $pengajar->nidn }}" @selected(old('nidn_koordinator') === $pengajar->nidn)>
                            {{ $pengajar->nama_dosen }} (NIDN {{ $pengajar->nidn }})
                        </option>
                    @endforeach
                </select>
                <span class="text-[11px] text-slate-500 mt-1 block">Beban koordinator dibatasi maksimal 2 kelas per semester.</span>
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <label class="block text-sm font-semibold text-slate-800" for="assignment-sk">
                    Nomor SK Penugasan
                    <input class="mt-1 w-full bg-slate-50 text-sm py-2.5 px-3 rounded-xl border border-slate-200 focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="assignment-sk" name="nomor_sk" value="{{ old('nomor_sk') }}" placeholder="Contoh: 014/UN10.F15/AK/2026" required>
                </label>
                <label class="block text-sm font-semibold text-slate-800" for="assignment-date">
                    Tanggal Berlaku SK
                    <input class="mt-1 w-full bg-slate-50 text-sm py-2.5 px-3 rounded-xl border border-slate-200 focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="assignment-date" name="tanggal_sk" type="date" value="{{ old('tanggal_sk') }}" required>
                </label>
            </div>
            <label class="block text-sm font-semibold text-slate-800" for="assignment-reason">
                Alasan Penetapan / Pergantian
                <textarea class="mt-1 w-full bg-slate-50 text-sm py-2.5 px-3 rounded-xl border border-slate-200 focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="assignment-reason" name="alasan" rows="3" maxlength="2000" placeholder="Tuliskan alasan atau catatan administrasi (opsional)...">{{ old('alasan') }}</textarea>
            </label>
            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-3">
                <button class="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-sm font-semibold hover:bg-slate-200" id="coordinator-modal-cancel" type="button">Batal</button>
                <button class="px-5 py-2.5 rounded-xl bg-[#a04100] hover:bg-[#7a3000] text-white text-sm font-semibold flex items-center gap-2 shadow-sm" type="submit">
                    <span class="material-symbols-outlined text-[18px]">verified</span>
                    Simpan Penetapan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    window.coordinatorModalShouldOpen = @json($errors->any());
</script>
