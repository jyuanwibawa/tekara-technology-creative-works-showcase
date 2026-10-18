@php
    $kelas = \App\Models\KelasCapstone::with(['mataKuliah.programStudi', 'koordinator'])->orderBy('tahun_akademik', 'desc')->get();
    $mataKuliahList = \App\Models\MataKuliah::with('programStudi')->orderBy('nama_mk')->get();
    $dosenList = \App\Models\Dosen::orderBy('nama_dosen')->get();
    $totalKelas = $kelas->count();
    $totalKuota = $kelas->sum('kuota_tim');
    $mataKuliahTerjadwal = $kelas->pluck('kode_mk')->unique()->count();
    $tanpaKoordinator = $kelas->filter(fn ($item) => ! $item->koordinator)->count();
    $tahunAkademikList = $kelas->pluck('tahun_akademik')->unique()->sortDesc();
    $periodeAktif = $tahunAkademikList->first();
    $kelasAktif = $periodeAktif ? $kelas->where('tahun_akademik', $periodeAktif)->count() : 0;
    $lastUpdated = $kelas->max('updated_at');
@endphp

<div class="w-full">
    <section class="px-4 lg:px-6 py-8 bg-white border-b border-slate-200 shadow-sm">
        <div class="w-full flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex flex-col gap-2">
                <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-500">
                    <a class="hover:text-[#f37021] transition-colors flex items-center gap-1" href="{{ route('admin.dashboard') }}">
                        <span class="material-symbols-outlined text-base">home</span>
                        Dashboard
                    </a>
                    <span class="material-symbols-outlined text-xs text-slate-400">chevron_right</span>
                    <span class="text-slate-500">Data Master</span>
                    <span class="material-symbols-outlined text-xs text-slate-400">chevron_right</span>
                    <span class="text-[#f37021] font-semibold">Kelas Capstone (UC-02)</span>
                </nav>
                <div class="flex items-center gap-3 mt-1">
                    <h1 class="font-display text-3xl font-extrabold text-slate-900 tracking-tight">Kelola Kelas Capstone</h1>
                    <span class="px-2.5 py-1 rounded-md text-xs font-bold uppercase tracking-wider bg-orange-100 text-orange-800">UC-02</span>
                </div>
                <p class="text-sm text-slate-500 max-w-2xl">Kelola alokasi kelas, kuota tim, tahun akademik, serta penugasan koordinator capstone.</p>
            </div>
            <div class="flex items-center gap-3 self-start md:self-auto shrink-0">
                <button id="btn-export-classes" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 bg-white text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:border-slate-300 shadow-sm transition-all" type="button">
                    <span class="material-symbols-outlined text-lg text-slate-500">file_download</span>
                    Unduh Rekap
                </button>
                <button id="btn-open-modal" class="inline-flex items-center gap-2.5 px-5 py-2.5 rounded-xl bg-slate-900 text-white text-sm font-semibold hover:bg-slate-800 shadow-md transition-all group" type="button">
                    <span class="w-6 h-6 rounded-lg bg-[#f37021] flex items-center justify-center text-white shadow-sm group-hover:scale-105 transition-transform">
                        <span class="material-symbols-outlined text-sm font-bold">add</span>
                    </span>
                    Tambah Kelas
                </button>
            </div>
        </div>
    </section>

    <div class="w-full px-4 lg:px-6 pt-6 pb-2">
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" aria-label="Statistik kelas capstone">
            <article class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Kelas TA {{ $periodeAktif ?? '—' }}</span>
                    <strong class="font-display text-2xl text-slate-900 mt-1">{{ $kelasAktif }} <span class="text-sm text-slate-500 font-normal">Kelas</span></strong>
                    <span class="text-xs text-slate-500 mt-1">Dari {{ $totalKelas }} kelas terdaftar</span>
                </div>
                <span class="w-12 h-12 rounded-xl bg-orange-50 text-[#f37021] flex items-center justify-center material-symbols-outlined text-2xl">school</span>
            </article>
            <article class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Total Kuota Tim</span>
                    <strong class="font-display text-2xl text-slate-900 mt-1">{{ $totalKuota }} <span class="text-sm text-slate-500 font-normal">Slot</span></strong>
                    <span class="text-xs text-slate-500 mt-1">Kapasitas alokasi seluruh kelas</span>
                </div>
                <span class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center material-symbols-outlined text-2xl">group_work</span>
            </article>
            <article class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Mata Kuliah Terjadwal</span>
                    <strong class="font-display text-2xl text-slate-900 mt-1">{{ $mataKuliahTerjadwal }} <span class="text-sm text-slate-500 font-normal">MK</span></strong>
                    <span class="text-xs text-slate-500 mt-1">Mata kuliah dengan kelas capstone</span>
                </div>
                <span class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center material-symbols-outlined text-2xl">menu_book</span>
            </article>
            <article class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex items-center justify-between">
                <div class="flex flex-col">
                    <span class="text-[11px] uppercase tracking-wider text-slate-400 font-semibold">Perlu Koordinator</span>
                    <strong class="font-display text-2xl {{ $tanpaKoordinator ? 'text-amber-600' : 'text-slate-900' }} mt-1">{{ $tanpaKoordinator }} <span class="text-sm text-slate-500 font-normal">Kelas</span></strong>
                    <span class="text-xs {{ $tanpaKoordinator ? 'text-amber-700' : 'text-emerald-600' }} mt-1">{{ $tanpaKoordinator ? 'Menunggu penetapan' : 'Semua kelas sudah ditugaskan' }}</span>
                </div>
                <span class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center material-symbols-outlined text-2xl">person_alert</span>
            </article>
        </section>
    </div>

    <div class="w-full px-4 lg:px-6 py-6 flex flex-col gap-6">
        <section class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm" aria-label="Cari dan filter kelas">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-3.5 items-center">
                <label class="md:col-span-5 relative">
                    <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                    <input class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-slate-800 placeholder-slate-400 text-sm focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100 transition-all outline-none" id="kelas-search" placeholder="Cari kode kelas, mata kuliah, atau nama koordinator..." type="search">
                </label>
                <select class="md:col-span-2 w-full appearance-none pl-3.5 pr-8 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 text-sm focus:border-[#f37021] focus:ring-2 focus:ring-orange-100 outline-none" id="kelas-year-filter">
                    <option value="">Semua Tahun</option>
                    @foreach ($tahunAkademikList as $tahun)
                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                    @endforeach
                </select>
                <select class="md:col-span-2 w-full appearance-none pl-3.5 pr-8 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 text-sm focus:border-[#f37021] focus:ring-2 focus:ring-orange-100 outline-none" id="kelas-semester-filter">
                    <option value="">Semua Semester</option>
                    @foreach ($kelas->pluck('periode_semester')->unique()->sort() as $periode)
                        <option value="{{ $periode }}">{{ $periode }}</option>
                    @endforeach
                </select>
                <select class="md:col-span-2 w-full appearance-none pl-3.5 pr-8 py-2.5 rounded-xl border border-slate-200 bg-white text-slate-700 text-sm focus:border-[#f37021] focus:ring-2 focus:ring-orange-100 outline-none" id="kelas-coordinator-filter">
                    <option value="">Semua Koordinator</option>
                    <option value="assigned">Sudah ditugaskan</option>
                    <option value="unassigned">Belum ditugaskan</option>
                </select>
                <button class="md:col-span-1 p-2.5 rounded-xl border border-slate-200 text-slate-500 hover:text-slate-800 hover:bg-slate-50 transition-colors" id="kelas-reset-filters" title="Reset filter" type="button">
                    <span class="material-symbols-outlined text-lg leading-none">restart_alt</span>
                </button>
            </div>
        </section>

        <section class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden flex flex-col">
            <div class="px-6 py-4 border-b border-slate-100 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#f37021]"></span>
                    <h2 class="font-display text-base font-bold text-slate-900">Daftar Kelas Capstone Terdaftar</h2>
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-600"><span id="kelas-visible-count">{{ $totalKelas }}</span> Ditampilkan</span>
                </div>
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span class="material-symbols-outlined text-sm text-emerald-500">sync</span>
                    @if ($lastUpdated)
                        Pembaruan data terakhir: {{ $lastUpdated->format('d/m/Y H:i') }}
                    @else
                        Data kelas belum tersedia
                    @endif
                </div>
            </div>

            <div class="overflow-x-auto w-full">
                <table class="w-full min-w-[1350px] text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/80 text-slate-500 text-[11px] uppercase tracking-wider border-b border-slate-200/70">
                            <th class="py-3.5 px-5" scope="col">Kode &amp; Mata Kuliah</th>
                            <th class="py-3.5 px-4" scope="col">Tahun Akademik</th>
                            <th class="py-3.5 px-4" scope="col">Semester</th>
                            <th class="py-3.5 px-4" scope="col">Dosen Koordinator</th>
                            <th class="py-3.5 px-4" scope="col">Kuota Tim</th>
                            <th class="py-3.5 px-4 min-w-[180px]" scope="col">Keterisian Tim</th>
                            <th class="py-3.5 px-4" scope="col">Status</th>
                            <th class="py-3.5 px-5 text-right" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm" id="kelas-table-body">
                        @forelse ($kelas as $item)
                            @php
                                $namaDosen = $item->koordinator?->nama_dosen;
                                $inisialDosen = $namaDosen ? collect(explode(' ', $namaDosen))->filter()->take(2)->map(fn ($bagian) => mb_substr($bagian, 0, 1))->implode('') : null;
                                $searchText = strtolower(implode(' ', [
                                    $item->id_kelas,
                                    $item->kode_mk,
                                    $item->mataKuliah?->nama_mk ?? '',
                                    $item->mataKuliah?->programStudi?->nama_prodi ?? '',
                                    $namaDosen ?? '',
                                    $item->nidn_koordinator ?? '',
                                    $item->tahun_akademik,
                                    $item->periode_semester,
                                ]));
                            @endphp
                            <tr class="kelas-table-row hover:bg-slate-50/60 transition-colors {{ ! $item->koordinator ? 'bg-amber-50/30' : '' }}"
                                data-search="{{ $searchText }}"
                                data-year="{{ $item->tahun_akademik }}"
                                data-semester="{{ $item->periode_semester }}"
                                data-coordinator="{{ $item->koordinator ? 'assigned' : 'unassigned' }}">
                                <td class="py-4 px-5">
                                    <div class="flex items-start gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-orange-50 text-[#f37021] flex items-center justify-center font-bold text-xs shrink-0">MK</div>
                                        <div class="flex flex-col">
                                            <span class="font-semibold text-slate-900">{{ $item->id_kelas }}</span>
                                            <span class="text-slate-500 text-xs">{{ $item->kode_mk }} · {{ $item->mataKuliah?->nama_mk ?? 'Mata kuliah tidak ditemukan' }}@if ($item->mataKuliah?->programStudi) ({{ $item->mataKuliah->programStudi->nama_prodi }})@endif</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-4 text-slate-700 font-medium whitespace-nowrap">{{ $item->tahun_akademik }}</td>
                                <td class="py-4 px-4">
                                    @php
                                        $semesterClasses = match ($item->periode_semester) {
                                            'Ganjil' => 'bg-blue-50 text-blue-700 border-blue-100',
                                            'Genap' => 'bg-purple-50 text-purple-700 border-purple-100',
                                            default => 'bg-slate-100 text-slate-600 border-slate-200',
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold border {{ $semesterClasses }}">{{ $item->periode_semester }}</span>
                                </td>
                                <td class="py-4 px-4">
                                    @if ($item->koordinator)
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center text-[11px] font-semibold shrink-0">{{ $inisialDosen }}</div>
                                            <div class="flex flex-col min-w-0">
                                                <span class="font-medium text-slate-800 truncate">{{ $namaDosen }}</span>
                                                <span class="text-[11px] text-slate-400">NIDN {{ $item->koordinator->nidn }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-amber-100/90 text-amber-800 border border-amber-200">
                                            <span class="material-symbols-outlined text-sm">person_search</span>
                                            Belum ditugaskan
                                        </span>
                                    @endif
                                </td>
                                <td class="py-4 px-4">
                                    <span class="font-semibold text-slate-800">{{ $item->kuota_tim }} Tim</span>
                                    <span class="text-xs text-slate-400 block">Kuota maksimum</span>
                                </td>
                                <td class="py-4 px-4">
                                    <div class="flex flex-col gap-1.5">
                                        <div class="flex items-center justify-between text-xs">
                                            <span class="font-semibold text-slate-500">Belum tersedia / {{ $item->kuota_tim }}</span>
                                            <span class="font-medium text-slate-400">—</span>
                                        </div>
                                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden" aria-label="Data keterisian tim belum tersedia">
                                            <div class="bg-slate-300 h-full rounded-full" style="width: 0%"></div>
                                        </div>
                                        <span class="text-[11px] text-slate-400">Data pendaftaran tim belum tersedia</span>
                                    </div>
                                </td>
                                <td class="py-4 px-4">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-600">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        Terdaftar
                                    </span>
                                </td>
                                <td class="py-4 px-5 text-right">
                                    <div class="inline-flex items-center gap-1">
                                        <button class="p-1.5 text-slate-400 rounded-lg cursor-not-allowed" title="Detail kelas belum tersedia" aria-label="Detail kelas belum tersedia" type="button" disabled>
                                            <span class="material-symbols-outlined text-base">open_in_new</span>
                                        </button>
                                        <button class="p-1.5 text-slate-400 rounded-lg cursor-not-allowed" title="Edit kelas belum tersedia" aria-label="Edit kelas belum tersedia" type="button" disabled>
                                            <span class="material-symbols-outlined text-base">edit</span>
                                        </button>
                                        <button class="p-1.5 text-slate-400 rounded-lg cursor-not-allowed" title="Ubah status belum tersedia" aria-label="Ubah status belum tersedia" type="button" disabled>
                                            <span class="material-symbols-outlined text-base">block</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="py-14 px-5 text-center">
                                    <span class="material-symbols-outlined text-4xl text-slate-300">school</span>
                                    <p class="text-sm font-semibold text-slate-700 mt-2">Belum ada data kelas capstone</p>
                                    <p class="text-xs text-slate-500 mt-1">Kelas yang terdaftar akan muncul di sini.</p>
                                </td>
                            </tr>
                        @endforelse
                        <tr id="kelas-no-results" class="hidden">
                            <td colspan="8" class="py-10 px-5 text-center text-sm text-slate-500">Tidak ada kelas yang cocok dengan filter.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 bg-slate-50/70 border-t border-slate-200 flex items-center justify-between gap-4 text-xs text-slate-500">
                <span>Menampilkan <strong id="kelas-summary-count" class="text-slate-800 font-semibold">{{ $totalKelas }}</strong> dari <strong class="text-slate-800 font-semibold">{{ $totalKelas }}</strong> kelas capstone</span>
                <span class="text-slate-500">Kuota kelas berdasarkan data tersimpan</span>
            </div>
        </section>

        <aside class="rounded-xl bg-sky-50 p-4 border-l-4 border-sky-700 flex items-start gap-3.5 shadow-sm">
            <span class="material-symbols-outlined text-sky-700 text-2xl shrink-0 mt-0.5">info</span>
            <div class="flex flex-col gap-1 text-sm text-sky-950">
                <span class="font-bold tracking-tight text-slate-900">Ketentuan Regulasi Alokasi Kelas Capstone</span>
                <p class="leading-relaxed">Setiap kelas Capstone memiliki kuota tim sesuai kebijakan program studi. Sebagai estimasi kapasitas, setiap tim terdiri dari 3 hingga 4 mahasiswa. Penugasan dosen koordinator perlu diselesaikan sebelum perkuliahan dimulai.</p>
            </div>
        </aside>
    </div>
</div>

<div class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-4" id="tambahKelasModal" role="dialog" aria-modal="true" aria-labelledby="tambah-kelas-title">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-2xl w-full max-w-xl overflow-hidden flex flex-col max-h-[90vh]">
        <div class="px-6 py-5 bg-slate-900 text-white flex items-center justify-between border-b border-slate-800">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-[#f37021] text-white flex items-center justify-center">
                    <span class="material-symbols-outlined text-xl">class</span>
                </div>
                <div>
                    <h3 class="font-display text-lg font-bold text-white" id="tambah-kelas-title">Tambah Kelas Capstone</h3>
                    <p class="text-xs text-slate-300">Konfigurasi mata kuliah dan kapasitas tim</p>
                </div>
            </div>
            <button class="w-8 h-8 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 flex items-center justify-center" id="btn-close-modal" type="button" aria-label="Tutup">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto flex flex-col gap-5">
            <div class="bg-orange-50 p-4 rounded-xl flex gap-3 border border-orange-100 text-sm text-orange-900">
                <span class="material-symbols-outlined text-[#f37021]">info</span>
                <p>Lengkapi informasi di bawah ini untuk menyiapkan kelas baru.</p>
            </div>
            <label class="flex flex-col gap-1.5 text-sm font-semibold text-slate-700" for="mk-selection">
                Mata Kuliah Capstone <span class="text-rose-500">*</span>
                <select class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-normal focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="mk-selection" required>
                    <option disabled selected value="">Pilih Mata Kuliah Capstone...</option>
                    @foreach ($mataKuliahList as $mataKuliah)
                        <option value="{{ $mataKuliah->kode_mk }}">{{ $mataKuliah->kode_mk }} - {{ $mataKuliah->nama_mk }}@if ($mataKuliah->programStudi) ({{ $mataKuliah->programStudi->nama_prodi }})@endif</option>
                    @endforeach
                </select>
            </label>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <label class="flex flex-col gap-1.5 text-sm font-semibold text-slate-700" for="class-section">
                    Label / Seksi Kelas <span class="text-rose-500">*</span>
                    <input class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-normal focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="class-section" placeholder="Contoh: Kelas A" required type="text">
                </label>
                <label class="flex flex-col gap-1.5 text-sm font-semibold text-slate-700" for="academic-year">
                    Tahun Akademik <span class="text-rose-500">*</span>
                    <input class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-normal focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="academic-year" placeholder="2026/2027" required type="text">
                </label>
            </div>
            <fieldset>
                <legend class="text-sm font-semibold text-slate-700 mb-2">Periode Semester <span class="text-rose-500">*</span></legend>
                <div class="grid grid-cols-3 gap-3">
                    @foreach (['Ganjil' => 'Sep – Jan', 'Genap' => 'Feb – Jun', 'Pendek' => 'Jul – Agu'] as $periode => $bulan)
                        <label class="flex items-center gap-2 p-3 rounded-xl border border-slate-200 bg-white hover:bg-slate-50 cursor-pointer has-[:checked]:border-[#f37021] has-[:checked]:bg-orange-50/30">
                            <input class="text-[#f37021] focus:ring-[#f37021]" name="semester_period" type="radio" value="{{ $periode }}" required>
                            <span class="flex flex-col">
                                <span class="font-medium text-xs text-slate-800">{{ $periode }}</span>
                                <span class="text-[10px] text-slate-400">{{ $bulan }}</span>
                            </span>
                        </label>
                    @endforeach
                </div>
            </fieldset>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <label class="flex flex-col gap-1.5 text-sm font-semibold text-slate-700" for="team-quota">
                    Kuota Tim <span class="text-rose-500">*</span>
                    <input class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-normal focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="team-quota" max="50" min="1" required type="number" value="20">
                    <span class="text-[11px] text-slate-400 font-normal">Maksimal 50 tim</span>
                </label>
                <div class="flex flex-col gap-1.5 text-sm font-semibold text-slate-700">
                    <span>Kapasitas Mahasiswa (Estimasi)</span>
                    <div class="px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-100 text-slate-600 font-normal flex items-center justify-between">
                        <span id="student-capacity">60–80 Mahasiswa</span>
                        <span class="material-symbols-outlined text-slate-400 text-sm">groups</span>
                    </div>
                    <span class="text-[11px] text-slate-400 font-normal">Estimasi 3–4 mahasiswa per tim</span>
                </div>
            </div>
            <label class="flex flex-col gap-1.5 text-sm font-semibold text-slate-700" for="lecturer-selection">
                Dosen Koordinator Capstone
                <select class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 font-normal focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="lecturer-selection">
                    <option value="">Pilih dosen koordinator...</option>
                    @foreach ($dosenList as $dosen)
                        <option value="{{ $dosen->nidn }}">{{ $dosen->nama_dosen }} ({{ $dosen->nidn }})</option>
                    @endforeach
                </select>
                <span class="text-[11px] text-slate-400 font-normal">Penugasan dapat dilakukan setelah kelas dibuat.</span>
            </label>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-end gap-3">
                <button class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-700 font-semibold hover:bg-slate-50" id="btn-cancel-modal" type="button">Batal</button>
                <button class="px-6 py-2.5 rounded-xl bg-slate-900 text-white font-semibold hover:bg-slate-800 shadow-md transition-all flex items-center gap-2" type="button" disabled title="Fitur simpan belum tersedia">
                    <span class="material-symbols-outlined text-sm text-[#f37021]">save</span>
                    Simpan Kelas
                </button>
            </div>
        </div>
    </div>
</div>
