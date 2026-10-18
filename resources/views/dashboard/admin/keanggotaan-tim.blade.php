<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keanggotaan Tim - Admin Portal</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/dashboard/admin.css'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex antialiased overflow-x-hidden">
    @include('dashboard.admin.navigation')

    <main class="flex-1 min-w-0 md:ml-64 pt-16 flex flex-col min-h-screen overflow-x-hidden">
        @include('dashboard.admin.header')

        <div class="flex-1 bg-slate-50 pb-12">
            <div class="w-full bg-white border-b border-slate-200 px-5 sm:px-8 py-3.5 flex flex-wrap items-center justify-between gap-3">
                <nav class="flex items-center gap-2 text-xs text-slate-500" aria-label="Breadcrumb">
                    <a class="hover:text-[#f37021] transition-colors flex items-center gap-1" href="{{ route('admin.dashboard') }}">
                        <span class="material-symbols-outlined text-[16px]">grid_view</span>
                        Dashboard
                    </a>
                    <span class="text-slate-300">/</span>
                    <span>Tim &amp; Presentasi</span>
                    <span class="text-slate-300">/</span>
                    <span class="font-semibold text-slate-900 flex items-center gap-1.5 bg-slate-100 px-2.5 py-1 rounded">
                        <span class="material-symbols-outlined text-[15px] text-[#f37021]">groups</span>
                        Keanggotaan Tim (UC-06)
                    </span>
                </nav>
                <div class="flex items-center gap-2 bg-slate-100 px-3 py-1.5 rounded-full text-xs">
                    <span class="w-2 h-2 rounded-full bg-[#f37021]"></span>
                    <span class="text-slate-500 font-medium">Periode Aktif:</span>
                    <span class="font-bold text-slate-900">Semester Genap 2025/2026</span>
                </div>
            </div>

            <div class="px-4 sm:px-6 lg:px-8 py-6 flex flex-col gap-6 max-w-[1600px] w-full mx-auto">
                <section class="flex flex-col lg:flex-row lg:items-end justify-between gap-4">
                    <div>
                        <h1 class="font-display text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Keanggotaan Tim Capstone</h1>
                        <p class="text-sm text-slate-500 mt-1">Pantau komposisi anggota, kuota, dan kontribusi setiap tim.</p>
                    </div>
                    <span class="inline-flex items-center gap-1.5 self-start px-3 py-1.5 rounded-lg bg-amber-50 border border-amber-200 text-amber-800 text-xs font-semibold">
                        <span class="material-symbols-outlined text-[16px]">info</span>
                        Data contoh desain — belum terhubung ke data tim
                    </span>
                </section>

                <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" aria-label="Ringkasan keanggotaan tim">
                    <article class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                        <div class="flex items-start justify-between">
                            <div>
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Total Tim Terdaftar</span>
                                <div class="font-display text-2xl font-extrabold text-slate-900 mt-1">52 Tim</div>
                            </div>
                            <span class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center text-slate-600 material-symbols-outlined">groups</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-3 pt-2 border-t border-slate-100">Tersebar di 12 kelas aktif</p>
                    </article>
                    <article class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                        <div class="flex items-start justify-between">
                            <div>
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Tim Valid Sesuai Aturan</span>
                                <div class="flex items-baseline gap-2 mt-1">
                                    <strong class="font-display text-2xl text-slate-900">48 Tim</strong>
                                    <span class="text-xs font-bold text-emerald-600">92,3%</span>
                                </div>
                            </div>
                            <span class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 material-symbols-outlined">verified</span>
                        </div>
                        <p class="text-xs text-emerald-700 mt-3 pt-2 border-t border-slate-100">Memenuhi syarat (3–5 mahasiswa, 100%)</p>
                    </article>
                    <article class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm">
                        <div class="flex items-start justify-between">
                            <div>
                                <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Anomali / Butuh Koreksi</span>
                                <div class="flex items-baseline gap-2 mt-1">
                                    <strong class="font-display text-2xl text-rose-600">4 Tim</strong>
                                    <span class="text-xs font-bold text-rose-600">7,7%</span>
                                </div>
                            </div>
                            <span class="w-10 h-10 rounded-lg bg-rose-50 flex items-center justify-center text-rose-600 material-symbols-outlined">warning</span>
                        </div>
                        <p class="text-xs text-rose-600 mt-3 pt-2 border-t border-slate-100">Perlu tindakan admin sekunder</p>
                    </article>
                    <article class="bg-[#1e2022] rounded-xl p-4 border border-slate-800 shadow-sm text-white">
                        <div class="flex items-start justify-between">
                            <div>
                                <span class="text-[10px] font-bold text-slate-300 uppercase tracking-wider">Tiket Koreksi Ketua Tim</span>
                                <div class="font-display text-2xl font-extrabold text-[#f37021] mt-1">3 Tiket</div>
                            </div>
                            <span class="w-10 h-10 rounded-lg bg-white/10 flex items-center justify-center text-[#f37021] material-symbols-outlined">contact_support</span>
                        </div>
                        <p class="text-xs text-slate-300 mt-3 pt-2 border-t border-white/10">Menunggu eksekusi admin sekunder</p>
                    </article>
                </section>

                <section class="bg-white rounded-xl p-3.5 border border-slate-200 shadow-sm flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-3" aria-label="Filter keanggotaan tim">
                    <div class="flex flex-col sm:flex-row items-center gap-3 flex-1">
                        <label class="w-full sm:w-80">
                            <span class="sr-only">Pilih kelas</span>
                            <select class="w-full bg-slate-50 text-slate-800 text-[13px] font-semibold px-3 py-2 rounded-lg border border-slate-200">
                                <option>TIF4101 - Kelas C (Proyek Terpadu TI)</option>
                                <option>TIF4101 - Kelas A</option>
                                <option>TIF4101 - Kelas B</option>
                                <option>TIF4102 - Kelas D (Rekayasa Perangkat Lunak)</option>
                            </select>
                        </label>
                        <label class="w-full sm:flex-1 relative">
                            <span class="material-symbols-outlined absolute left-3 top-2.5 text-[18px] text-slate-400">search</span>
                            <input class="w-full bg-slate-50 text-slate-800 placeholder:text-slate-400 text-[13px] pl-9 pr-3 py-2 rounded-lg border border-slate-200" placeholder="Cari nama tim, topik, NIM, mahasiswa..." type="search">
                        </label>
                        <label class="w-full sm:w-64">
                            <span class="sr-only">Filter status tim</span>
                            <select class="w-full bg-slate-50 text-slate-700 text-[13px] px-3 py-2 rounded-lg border border-slate-200">
                                <option>Semua Status (Valid &amp; Anomali)</option>
                                <option>Hanya Tim Valid</option>
                                <option>Anomali Kuota</option>
                                <option>Anomali Kontribusi</option>
                                <option>Dengan Tiket Permohonan Aktif</option>
                            </select>
                        </label>
                    </div>
                    <button class="inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg bg-slate-100 text-slate-500 font-semibold text-xs cursor-not-allowed" type="button" disabled title="Ekspor tersedia setelah data tim terhubung">
                        <span class="material-symbols-outlined text-[16px]">file_download</span>
                        Ekspor Rekap Tim
                    </button>
                </section>

                <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 items-start">
                    <section class="xl:col-span-8 space-y-5" aria-label="Daftar tim">
                        <article class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                            <div class="p-4 border-b border-slate-100 flex flex-wrap items-start justify-between gap-3">
                                <div>
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <h2 class="text-[15px] font-bold text-slate-900">Tim C-01 • EduLink FILKOM</h2>
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="material-symbols-outlined text-[13px]">check_circle</span>
                                            Valid (4 Anggota • 100%)
                                        </span>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-1">Topik: Platform Kolaborasi Bimbingan &amp; Monitoring Capstone Berbasis Web</p>
                                </div>
                                <button class="px-3 py-1.5 rounded-lg bg-slate-100 text-slate-400 font-semibold text-xs cursor-not-allowed" type="button" disabled>Detail Tim</button>
                            </div>
                            <div class="px-4 py-2 bg-slate-50/80 border-b border-slate-100 flex flex-wrap gap-x-6 gap-y-1 text-xs text-slate-500">
                                <span>Pembimbing: <strong class="text-slate-800">Dr. Eng. Herman Tolle, S.T., M.T.</strong></span>
                                <span>Mitra: <strong class="text-slate-800">PT Telkom Indonesia</strong></span>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-[13px]">
                                    <thead class="bg-slate-50 text-slate-500 text-[11px] font-bold uppercase tracking-wider border-b border-slate-100">
                                        <tr><th class="py-2.5 px-4">Peran</th><th class="py-2.5 px-4">NIM &amp; Nama Mahasiswa</th><th class="py-2.5 px-4 text-center">Kontribusi</th><th class="py-2.5 px-4">Status</th></tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        <tr><td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-orange-100 text-[#f37021]">Ketua Tim</span></td><td class="py-3 px-4"><strong>Muhammad Raihan</strong><div class="text-xs text-slate-500">215150200111012 • TIF</div></td><td class="py-3 px-4 text-center font-bold">25%</td><td class="py-3 px-4 text-emerald-700">● Aktif</td></tr>
                                        <tr><td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-600">Anggota</span></td><td class="py-3 px-4"><strong>Annisa Farah Diba</strong><div class="text-xs text-slate-500">215150201111034 • TIF</div></td><td class="py-3 px-4 text-center font-bold">25%</td><td class="py-3 px-4 text-emerald-700">● Aktif</td></tr>
                                        <tr><td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-600">Anggota</span></td><td class="py-3 px-4"><strong>Bagas Wicaksono</strong><div class="text-xs text-slate-500">215150207111055 • TIF</div></td><td class="py-3 px-4 text-center font-bold">25%</td><td class="py-3 px-4 text-emerald-700">● Aktif</td></tr>
                                        <tr><td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-600">Anggota</span></td><td class="py-3 px-4"><strong>Siti Nurhaliza</strong><div class="text-xs text-slate-500">215150200111078 • TIF</div></td><td class="py-3 px-4 text-center font-bold">25%</td><td class="py-3 px-4 text-emerald-700">● Aktif</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-3.5 bg-slate-50 border-t border-slate-100 flex flex-wrap justify-between gap-2 text-xs">
                                <span class="font-semibold text-emerald-700">Total: 4 Mahasiswa • Kontribusi: 100%</span>
                                <span class="text-slate-500">Integritas tim terpenuhi</span>
                            </div>
                        </article>

                        <article class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                            <div class="p-4 border-b border-slate-100">
                                <div class="flex flex-wrap items-center gap-2">
                                    <h2 class="text-[15px] font-bold text-slate-900">Tim C-02 • AgroSmart Sensor</h2>
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200">Anomali Kontribusi (90% ≠ 100%)</span>
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-orange-50 text-[#f37021] border border-orange-200">Tiket Koreksi #KOR-082</span>
                                </div>
                                <p class="text-xs text-slate-500 mt-1">Topik: Sistem Monitoring IoT Lahan Pertanian Presisi</p>
                            </div>
                            <div class="m-4 p-3 rounded-lg bg-orange-50 border border-orange-200 text-xs text-slate-700">
                                <strong class="text-[#f37021]">Permohonan Ketua Tim:</strong>
                                Kevin Pratama mengundurkan diri sebagian jam proyek karena lolos MSIB. Mohon tinjau ulang alokasi kontribusi.
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-[13px]">
                                    <thead class="bg-slate-50 text-slate-500 text-[11px] font-bold uppercase tracking-wider border-y border-slate-100">
                                        <tr><th class="py-2.5 px-4">Peran</th><th class="py-2.5 px-4">NIM &amp; Nama Mahasiswa</th><th class="py-2.5 px-4 text-center">Kontribusi</th><th class="py-2.5 px-4">Status</th></tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        <tr><td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-orange-100 text-[#f37021]">Ketua Tim</span></td><td class="py-3 px-4"><strong>Fikri Alamsyah</strong><div class="text-xs text-slate-500">215150400111003 • TIF</div></td><td class="py-3 px-4 text-center font-bold">35%</td><td class="py-3 px-4 text-emerald-700">● Aktif</td></tr>
                                        <tr><td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-600">Anggota</span></td><td class="py-3 px-4"><strong>Dinda Ayu Lestari</strong><div class="text-xs text-slate-500">215150401111041 • TIF</div></td><td class="py-3 px-4 text-center font-bold">30%</td><td class="py-3 px-4 text-emerald-700">● Aktif</td></tr>
                                        <tr class="bg-rose-50/40"><td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-600">Anggota</span></td><td class="py-3 px-4"><strong class="text-rose-700">Kevin Pratama</strong><div class="text-xs text-slate-500">215150407111089 • TIF</div></td><td class="py-3 px-4 text-center font-bold text-rose-600">25%</td><td class="py-3 px-4 text-rose-700">MSIB / Pindah</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-3.5 bg-slate-50 border-t border-slate-100 flex flex-wrap justify-between gap-2 text-xs">
                                <span class="font-semibold text-rose-700">Total: 3 Anggota • Akumulasi: 90%</span>
                                <span class="text-slate-500">Menunggu koreksi</span>
                            </div>
                        </article>

                        <article class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                            <div class="p-4 border-b border-slate-100">
                                <div class="flex flex-wrap items-center gap-2">
                                    <h2 class="text-[15px] font-bold text-slate-900">Tim C-03 • HealthSync Wearable</h2>
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200">Anomali Kuota (&lt; 3 Mahasiswa)</span>
                                </div>
                                <p class="text-xs text-slate-500 mt-1">Topik: Telemedicine Deteksi Dini Vital Signs Pasien Lansia</p>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-left text-[13px]">
                                    <thead class="bg-slate-50 text-slate-500 text-[11px] font-bold uppercase tracking-wider border-y border-slate-100">
                                        <tr><th class="py-2.5 px-4">Peran</th><th class="py-2.5 px-4">NIM &amp; Nama Mahasiswa</th><th class="py-2.5 px-4 text-center">Kontribusi</th><th class="py-2.5 px-4">Status</th></tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        <tr><td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-[10px] font-extrabold uppercase bg-orange-100 text-[#f37021]">Ketua Tim</span></td><td class="py-3 px-4"><strong>Jonathan Putra</strong><div class="text-xs text-slate-500">215150600111022 • TIF</div></td><td class="py-3 px-4 text-center font-bold">50%</td><td class="py-3 px-4 text-emerald-700">● Aktif</td></tr>
                                        <tr><td class="py-3 px-4"><span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-100 text-slate-600">Anggota</span></td><td class="py-3 px-4"><strong>Nadya Eka Putri</strong><div class="text-xs text-slate-500">215150601111067 • TIF</div></td><td class="py-3 px-4 text-center font-bold">50%</td><td class="py-3 px-4 text-emerald-700">● Aktif</td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-3.5 bg-rose-50 border-t border-rose-100 flex flex-wrap justify-between gap-2 text-xs">
                                <span class="font-semibold text-rose-700">Total: 2 Anggota (kurang 1 untuk kuota minimum)</span>
                                <span class="text-slate-500">Perlu alokasi anggota</span>
                            </div>
                        </article>
                    </section>

                    <aside class="xl:col-span-4 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="p-4 bg-[#1e293b] text-white">
                            <div class="flex items-center gap-2.5">
                                <span class="w-8 h-8 rounded-lg bg-[#f37021] flex items-center justify-center material-symbols-outlined">admin_panel_settings</span>
                                <div>
                                    <h2 class="text-sm font-bold">Koreksi Data Tim</h2>
                                    <span class="text-[11px] text-slate-300">Wewenang khusus admin sekunder</span>
                                </div>
                            </div>
                            <p class="text-[11px] text-slate-300 mt-2">Koreksi hanya diproses berdasarkan permohonan resmi Ketua Tim atau memo Koordinator.</p>
                        </div>
                        <div class="p-4 space-y-4">
                            <div class="rounded-lg bg-amber-50 border border-amber-200 p-3 text-xs text-amber-900">
                                Formulir contoh. Penyimpanan koreksi belum tersedia karena data keanggotaan belum terhubung.
                            </div>
                            <fieldset disabled class="space-y-4 opacity-60">
                                <div>
                                    <span class="block text-[11px] font-bold text-slate-500 uppercase tracking-wider mb-2">Jenis Tindakan Koreksi</span>
                                    <div class="space-y-2 text-xs text-slate-600">
                                        <label class="flex items-center gap-2"><input checked type="radio" name="jenis_koreksi"> Pindahkan anggota ke tim lain</label>
                                        <label class="flex items-center gap-2"><input type="radio" name="jenis_koreksi"> Keluarkan anggota dari tim</label>
                                        <label class="flex items-center gap-2"><input type="radio" name="jenis_koreksi"> Sesuaikan bobot kontribusi (%)</label>
                                    </div>
                                </div>
                                <label class="block text-xs font-semibold text-slate-700">Tim Asal
                                    <select class="mt-1 w-full text-xs rounded-lg border-slate-200 bg-slate-50"><option>Tim C-02 • AgroSmart Sensor</option></select>
                                </label>
                                <label class="block text-xs font-semibold text-slate-700">Mahasiswa yang Dikoreksi
                                    <select class="mt-1 w-full text-xs rounded-lg border-slate-200 bg-slate-50"><option>Kevin Pratama</option></select>
                                </label>
                                <label class="block text-xs font-semibold text-slate-700">Tim Tujuan Alokasi
                                    <select class="mt-1 w-full text-xs rounded-lg border-slate-200 bg-slate-50"><option>Tim C-03 • HealthSync Wearable</option></select>
                                </label>
                                <label class="block text-xs font-semibold text-slate-700">Penyesuaian Kontribusi (%)
                                    <input class="mt-1 w-full text-xs rounded-lg border-slate-200 bg-slate-50" type="number" min="0" max="100" value="25">
                                </label>
                                <label class="block text-xs font-semibold text-slate-700">Dasar Permohonan &amp; No. Dokumen
                                    <input class="mt-1 w-full text-xs rounded-lg border-slate-200 bg-slate-50" type="text" value="Tiket #KOR-082">
                                </label>
                                <button class="w-full py-2.5 rounded-lg bg-[#f37021] text-white font-bold text-sm" type="button">Proses Koreksi Tim</button>
                            </fieldset>
                            <p class="flex items-start gap-2 text-[11px] leading-relaxed text-slate-500">
                                <span class="material-symbols-outlined text-[16px] text-[#f37021]">shield</span>
                                Setiap koreksi perlu dicatat dalam audit log dan diberitahukan kepada Koordinator serta Ketua Tim.
                            </p>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

        @include('dashboard.admin.footer')
    </main>
</body>
</html>
