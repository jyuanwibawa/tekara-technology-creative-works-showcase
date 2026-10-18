<div class="w-full px-4 lg:px-6 py-6 space-y-6">
    @if (session('success'))
        <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800" role="status">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-medium text-rose-800" role="alert">{{ session('error') }}</div>
    @endif

    <section class="flex flex-col xl:flex-row xl:items-center justify-between gap-4">
        <div class="space-y-2">
            <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-500">
                <a class="hover:text-[#a04100] transition-colors flex items-center gap-1" href="{{ route('admin.dashboard') }}">
                    <span class="material-symbols-outlined text-[15px]">home</span>Dashboard
                </a>
                <span class="text-slate-300">/</span>
                <span>Data Master</span>
                <span class="text-slate-300">/</span>
                <span class="font-semibold text-slate-800">Mitra Industri</span>
            </nav>
            <div class="flex items-center gap-3 flex-wrap">
                <h1 class="font-display text-3xl font-extrabold text-slate-900 tracking-tight">Mitra Industri &amp; Eksternal</h1>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-orange-100 text-orange-800 text-xs font-bold tracking-wide">UC-11</span>
            </div>
            <p class="text-sm text-slate-500 max-w-3xl">Kelola direktori mitra Capstone dan informasi kontak yang tercatat.</p>
        </div>
        <div class="flex items-center gap-2 flex-wrap">
            <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 shadow-sm transition-all text-sm font-semibold" id="btn-export-partners" type="button">
                <span class="material-symbols-outlined text-[18px]">file_download</span>Unduh Rekap
            </button>
            <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white shadow-md transition-all text-sm font-semibold" id="btn-open-partner-modal" type="button">
                <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-[#f37021] text-white">
                    <span class="material-symbols-outlined text-[14px]">add</span>
                </span>Tambah Mitra
            </button>
        </div>
    </section>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" aria-label="Ringkasan mitra industri">
        <article class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
            <p class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">Mitra Terdaftar</p>
            <div class="mt-2 flex items-center justify-between">
                <strong class="font-display text-3xl text-slate-900">{{ $jumlahMitra }}</strong>
                <span class="w-10 h-10 rounded-xl bg-orange-100 text-orange-800 flex items-center justify-center material-symbols-outlined">domain</span>
            </div>
            <p class="text-xs text-slate-500 mt-3">Data dari direktori mitra</p>
        </article>
        <article class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
            <p class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">Jenis Tercatat</p>
            <div class="mt-2 flex items-center justify-between">
                <strong class="font-display text-3xl text-slate-900">{{ $jumlahJenis }}</strong>
                <span class="w-10 h-10 rounded-xl bg-sky-100 text-sky-800 flex items-center justify-center material-symbols-outlined">category</span>
            </div>
            <p class="text-xs text-slate-500 mt-3">Kategori yang digunakan</p>
        </article>
        <article class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
            <p class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">PIC Tercatat</p>
            <div class="mt-2 flex items-center justify-between">
                <strong class="font-display text-3xl text-slate-900">{{ $jumlahPic }}</strong>
                <span class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center material-symbols-outlined">support_agent</span>
            </div>
            <p class="text-xs text-slate-500 mt-3">Mitra dengan kontak person</p>
        </article>
        <article class="bg-white rounded-2xl p-5 shadow-sm border border-slate-200">
            <p class="text-[11px] text-slate-500 uppercase tracking-wider font-semibold">Akun Mitra Aktif</p>
            <div class="mt-2 flex items-center justify-between">
                <strong class="font-display text-3xl text-slate-900">{{ $jumlahAkunAktif }}</strong>
                <span class="w-10 h-10 rounded-xl bg-violet-100 text-violet-800 flex items-center justify-center material-symbols-outlined">verified_user</span>
            </div>
            <p class="text-xs text-slate-500 mt-3">Akun berstatus aktif</p>
        </article>
    </section>

    <aside class="bg-sky-50 border border-sky-100 rounded-xl p-4 flex items-start gap-3 shadow-sm">
        <span class="material-symbols-outlined text-sky-700 text-[22px] shrink-0 mt-0.5">info</span>
        <p class="flex-1 text-sm text-sky-950 leading-relaxed">
            <strong class="text-slate-900">Integritas data (UC-11):</strong>
            relasi mitra dengan proposal atau kelompok Capstone belum tersedia pada skema database saat ini. Status penggunaan proyek belum dapat diverifikasi. Data mitra yang memiliki akun login tidak dapat dihapus dari halaman ini untuk mencegah akun yatim.
        </p>
    </aside>

    <section class="bg-white rounded-2xl p-4 shadow-sm border border-slate-200" aria-label="Pencarian dan filter mitra">
        <div class="flex flex-col xl:flex-row gap-3 items-stretch xl:items-center justify-between">
            <label class="relative flex-1">
                <span class="material-symbols-outlined absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                <input class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 text-sm rounded-xl outline-none focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="partner-search" placeholder="Cari nama mitra, PIC, ID, atau domisili..." type="search">
            </label>
            <div class="flex flex-wrap items-center gap-2">
                <select class="px-3 py-2.5 bg-slate-50 border border-slate-200 text-sm text-slate-700 rounded-xl" id="partner-type-filter" aria-label="Filter jenis mitra">
                    <option value="">Semua Jenis Mitra</option>
                    @foreach ($jenisList as $jenis)
                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                    @endforeach
                </select>
                <select class="px-3 py-2.5 bg-slate-50 border border-slate-200 text-sm text-slate-700 rounded-xl" id="partner-account-filter" aria-label="Filter akun mitra">
                    <option value="">Semua Akun</option>
                    <option value="active">Akun Aktif</option>
                    <option value="inactive">Akun Nonaktif</option>
                    <option value="none">Tanpa Akun</option>
                </select>
                <select class="px-3 py-2.5 bg-slate-50 border border-slate-200 text-sm text-slate-700 rounded-xl" id="partner-sort" aria-label="Urutkan daftar mitra">
                    <option value="updated">Terakhir Diperbarui</option>
                    <option value="name">Nama Mitra (A-Z)</option>
                    <option value="oldest">Terlama Ditambahkan</option>
                </select>
                <button class="p-2.5 rounded-xl text-slate-500 hover:text-slate-800 hover:bg-slate-100" id="partner-reset-filters" title="Reset filter" type="button">
                    <span class="material-symbols-outlined text-[20px]">restart_alt</span>
                </button>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="px-5 py-4 bg-slate-50 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-2">
                <span class="material-symbols-outlined text-[#a04100] text-[20px]">business</span>
                <h2 class="font-display text-base font-bold text-slate-900">Direktori Rekanan Mitra Capstone</h2>
                <span class="bg-slate-200 text-slate-700 px-2 py-0.5 rounded-full text-xs font-semibold">{{ $jumlahMitra }} Total</span>
            </div>
            <span class="text-xs text-slate-500"><span class="inline-block w-2 h-2 rounded-full bg-slate-400 mr-1"></span>Relasi proyek belum tersedia</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px] text-left text-sm">
                <thead class="bg-white text-slate-500 text-[11px] uppercase tracking-wider">
                    <tr>
                        <th class="py-3.5 px-5 font-semibold" scope="col">Nama Mitra &amp; Identitas</th>
                        <th class="py-3.5 px-4 font-semibold" scope="col">Jenis Mitra</th>
                        <th class="py-3.5 px-4 font-semibold" scope="col">Contact Person</th>
                        <th class="py-3.5 px-4 font-semibold" scope="col">Alamat &amp; Domisili</th>
                        <th class="py-3.5 px-4 font-semibold" scope="col">Status Proyek (UC-11)</th>
                        <th class="py-3.5 px-5 font-semibold text-right" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100" id="partner-table-body">
                    @forelse ($mitra as $item)
                        @php
                            $akunMitra = $item->akun;
                            $statusAkun = $akunMitra?->status_aktif === 'aktif' ? 'active' : ($akunMitra ? 'inactive' : 'none');
                            $inisial = collect(explode(' ', $item->nama_mitra))->filter()->take(2)->map(fn ($kata) => mb_substr($kata, 0, 1))->implode('');
                            $cariMitra = strtolower(implode(' ', [$item->id_mitra, $item->nama_mitra, $item->jenis_mitra ?? '', $item->kontak_person ?? '', $item->alamat ?? '']));
                        @endphp
                        <tr class="partner-table-row hover:bg-slate-50/70 transition-colors group"
                            data-id="{{ $item->id_mitra }}"
                            data-name="{{ $item->nama_mitra }}"
                            data-type="{{ $item->jenis_mitra ?? '' }}"
                            data-contact="{{ $item->kontak_person ?? '' }}"
                            data-address="{{ $item->alamat ?? '' }}"
                            data-search="{{ $cariMitra }}"
                            data-account="{{ $statusAkun }}"
                            data-updated="{{ $item->updated_at?->timestamp ?? 0 }}"
                            data-created="{{ $item->created_at?->timestamp ?? 0 }}">
                            <td class="py-4 px-5">
                                <div class="flex items-start gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-orange-100 text-[#a04100] flex items-center justify-center shrink-0 font-display font-bold text-sm">{{ $inisial }}</div>
                                    <div class="flex flex-col min-w-0">
                                        <span class="font-semibold text-slate-900 group-hover:text-[#a04100] transition-colors">{{ $item->nama_mitra }}</span>
                                        <span class="text-[11px] font-mono text-slate-500 mt-0.5">ID: {{ $item->id_mitra }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-4 align-middle">
                                @if ($item->jenis_mitra)
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-semibold bg-sky-100 text-sky-800">
                                        <span class="material-symbols-outlined text-[14px]">corporate_fare</span>{{ $item->jenis_mitra }}
                                    </span>
                                @else
                                    <span class="text-xs text-slate-400 italic">Belum dicatat</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 align-middle">
                                @if ($item->kontak_person)
                                    <span class="text-xs font-semibold text-slate-800">{{ $item->kontak_person }}</span>
                                @else
                                    <span class="text-xs text-slate-400 italic">Belum dicatat</span>
                                @endif
                            </td>
                            <td class="py-4 px-4 align-middle">
                                <span class="text-xs text-slate-700 whitespace-normal">{{ $item->alamat ?: 'Belum dicatat' }}</span>
                            </td>
                            <td class="py-4 px-4 align-middle">
                                <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold" title="Skema database belum mencatat relasi proyek mitra">
                                    <span class="material-symbols-outlined text-[15px]">info</span>Belum tersedia
                                </div>
                                <div class="mt-1 text-[10px] text-slate-500">
                                    @if ($statusAkun === 'active')
                                        Akun mitra aktif
                                    @elseif ($statusAkun === 'inactive')
                                        Akun mitra nonaktif
                                    @else
                                        Tanpa akun login
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-5 align-middle text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button class="p-1.5 text-slate-600 hover:text-[#a04100] hover:bg-orange-50 rounded-lg transition-colors"
                                        type="button"
                                        data-edit-partner
                                        data-update-url="{{ route('admin.mitra-industri.update', $item->id_mitra) }}"
                                        title="Ubah data mitra"
                                        aria-label="Ubah data mitra {{ $item->nama_mitra }}">
                                        <span class="material-symbols-outlined text-[19px]">edit</span>
                                    </button>
                                    @if ($akunMitra)
                                        <button class="p-1.5 text-slate-300 bg-slate-50 rounded-lg cursor-not-allowed" type="button" disabled title="Mitra masih memiliki akun login">
                                            <span class="material-symbols-outlined text-[19px]">delete_forever</span>
                                        </button>
                                    @else
                                        <button class="p-1.5 text-rose-600 hover:bg-rose-50 rounded-lg transition-colors"
                                            type="button"
                                            data-delete-partner
                                            data-delete-url="{{ route('admin.mitra-industri.destroy', $item->id_mitra) }}"
                                            data-partner-name="{{ $item->nama_mitra }}"
                                            title="Hapus mitra"
                                            aria-label="Hapus mitra {{ $item->nama_mitra }}">
                                            <span class="material-symbols-outlined text-[19px]">delete_forever</span>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="py-12 text-center text-sm text-slate-500">Belum ada data mitra industri.</td></tr>
                    @endforelse
                    <tr id="partner-no-results" class="hidden"><td colspan="6" class="py-10 text-center text-sm text-slate-500">Tidak ada mitra yang cocok dengan filter.</td></tr>
                </tbody>
            </table>
        </div>
        <div class="px-5 py-3 bg-slate-50 border-t border-slate-200 text-xs text-slate-500">
            Menampilkan <strong id="partner-summary-count" class="text-slate-800">{{ $jumlahMitra }}</strong> dari {{ $jumlahMitra }} mitra terdaftar
        </div>
    </section>
</div>

<div class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-4" id="partner-modal" role="dialog" aria-modal="true" aria-labelledby="partner-modal-title">
    <div class="bg-white rounded-2xl max-w-xl w-full shadow-2xl overflow-hidden max-h-[90vh] flex flex-col">
        <div class="px-6 py-4 bg-slate-900 text-white flex items-center justify-between">
            <div class="flex items-center gap-2.5">
                <span class="material-symbols-outlined text-orange-300 text-[24px]">domain_add</span>
                <div>
                    <h2 class="font-display text-lg font-bold" id="partner-modal-title">Tambah Mitra Industri</h2>
                    <p class="text-xs text-slate-300">Isi informasi yang tersedia pada direktori</p>
                </div>
            </div>
            <button class="p-1 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800" id="partner-modal-close" type="button" aria-label="Tutup">
                <span class="material-symbols-outlined text-xl">close</span>
            </button>
        </div>
        <form class="p-6 space-y-4 overflow-y-auto" action="{{ route('admin.mitra-industri.store') }}" method="POST" id="partner-form">
            @csrf
            <input type="hidden" name="_method" id="partner-form-method" value="">
            <input type="hidden" name="_id_mitra" id="partner-form-id" value="{{ old('_id_mitra') }}">
            @if ($errors->any())
                <div class="rounded-lg border border-rose-200 bg-rose-50 p-3 text-sm text-rose-800" role="alert">{{ $errors->first() }}</div>
            @endif
            <label class="block text-sm font-semibold text-slate-800" for="partner-name">
                Nama Mitra <span class="text-rose-600">*</span>
                <input class="mt-1 w-full bg-slate-50 text-sm py-2.5 px-3 rounded-xl border border-slate-200 focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="partner-name" name="nama_mitra" value="{{ old('nama_mitra') }}" maxlength="255" required>
            </label>
            <label class="block text-sm font-semibold text-slate-800" for="partner-type">
                Jenis Mitra
                <input class="mt-1 w-full bg-slate-50 text-sm py-2.5 px-3 rounded-xl border border-slate-200 focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="partner-type" name="jenis_mitra" value="{{ old('jenis_mitra') }}" list="partner-type-options" maxlength="255" placeholder="Contoh: Perusahaan">
                <datalist id="partner-type-options">
                    @foreach ($jenisList as $jenis)
                        <option value="{{ $jenis }}">
                    @endforeach
                    <option value="BUMN">
                    <option value="Swasta">
                    <option value="Instansi Pemerintah">
                    <option value="Sekolah / Edukasi">
                </datalist>
            </label>
            <label class="block text-sm font-semibold text-slate-800" for="partner-contact">
                Contact Person (PIC)
                <input class="mt-1 w-full bg-slate-50 text-sm py-2.5 px-3 rounded-xl border border-slate-200 focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="partner-contact" name="kontak_person" value="{{ old('kontak_person') }}" maxlength="255">
            </label>
            <label class="block text-sm font-semibold text-slate-800" for="partner-address">
                Alamat &amp; Domisili
                <textarea class="mt-1 w-full bg-slate-50 text-sm py-2.5 px-3 rounded-xl border border-slate-200 focus:bg-white focus:border-[#f37021] focus:ring-2 focus:ring-orange-100" id="partner-address" name="alamat" rows="3" maxlength="5000">{{ old('alamat') }}</textarea>
            </label>
            <div class="pt-3 border-t border-slate-100 flex items-center justify-end gap-3">
                <button class="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-sm font-semibold hover:bg-slate-200" id="partner-modal-cancel" type="button">Batal</button>
                <button class="px-5 py-2.5 rounded-xl bg-[#a04100] hover:bg-[#7a3000] text-white text-sm font-semibold flex items-center gap-2 shadow-sm" type="submit">
                    <span class="material-symbols-outlined text-[18px]">save</span>Simpan Mitra
                </button>
            </div>
        </form>
    </div>
</div>

<div class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden items-center justify-center p-4" id="partner-delete-modal" role="dialog" aria-modal="true" aria-labelledby="partner-delete-title">
    <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl p-6 space-y-5">
        <div class="flex items-start gap-4">
            <span class="w-12 h-12 rounded-full bg-rose-100 text-rose-700 flex items-center justify-center shrink-0">
                <span class="material-symbols-outlined text-[26px]">warning</span>
            </span>
            <div>
                <h2 class="font-display text-base font-bold text-slate-900" id="partner-delete-title">Konfirmasi Penghapusan Mitra</h2>
                <p class="text-sm text-slate-600 mt-1">Hapus <strong class="text-slate-900" id="partner-delete-name"></strong> dari direktori?</p>
            </div>
        </div>
        <p class="text-xs text-slate-600 rounded-lg bg-slate-50 border border-slate-200 p-3">Penghapusan tidak dapat dibatalkan. Mitra yang masih memiliki akun login tidak dapat dihapus.</p>
        <form action="" method="POST" id="partner-delete-form" class="flex items-center justify-end gap-3">
            @csrf
            @method('DELETE')
            <button class="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-sm font-semibold hover:bg-slate-200" id="partner-delete-cancel" type="button">Batal</button>
            <button class="px-4 py-2.5 rounded-xl bg-rose-700 text-white text-sm font-semibold hover:bg-rose-800" type="submit">Ya, Hapus Mitra</button>
        </form>
    </div>
</div>

<script>
    window.partnerModalShouldOpen = @json($errors->any());
    window.partnerEditUrl = @json(old('_id_mitra') ? route('admin.mitra-industri.update', old('_id_mitra')) : null);
    window.partnerFormWasUpdate = @json(old('_method') === 'PUT');
</script>
