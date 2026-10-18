<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Presentasi - Admin Portal</title>
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
            <div class="w-full bg-white border-b border-slate-200 px-5 sm:px-8 py-3.5">
                <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
                    <nav class="flex items-center gap-2 text-xs text-slate-500" aria-label="Breadcrumb">
                        <a class="hover:text-[#f37021] transition-colors" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <span class="text-slate-300">/</span>
                        <span>Tim &amp; Presentasi</span>
                        <span class="text-slate-300">/</span>
                        <span class="font-semibold text-[#f37021] inline-flex items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">co_present</span>
                            Jadwal Sesi Presentasi (UC-21)
                        </span>
                    </nav>
                    <div class="flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                        <span class="px-2.5 py-1 rounded bg-orange-50 text-[#a04100]">USE CASE UC-21</span>
                        <span class="px-2.5 py-1 rounded bg-slate-100 text-slate-600">Periode: Genap 2025/2026</span>
                        <span class="px-2.5 py-1 rounded bg-sky-50 text-sky-700">OBE ASIIN / BAN-PT</span>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-6">
                <section class="flex flex-col lg:flex-row lg:items-center justify-between gap-5">
                    <div class="max-w-3xl">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-xl bg-orange-100 text-[#a04100] flex items-center justify-center material-symbols-outlined">event_seat</span>
                            <div>
                                <h1 class="font-display text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">Jadwal Sesi Presentasi Capstone</h1>
                                <p class="text-[11px] font-bold uppercase tracking-wider text-[#a04100]">Penjadwalan logistik &amp; ruang</p>
                            </div>
                        </div>
                        <p class="text-sm text-slate-600 leading-relaxed mt-3">
                            Kelola jadwal seminar proposal dan sidang akhir serta alokasi ruang fisik atau virtual.
                            Penetapan dewan penguji merupakan wewenang Dosen Koordinator (UC-22).
                        </p>
                    </div>
                    <div class="flex flex-wrap items-center gap-2">
                        <button class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-lg bg-white text-slate-400 border border-slate-200 text-xs font-semibold cursor-not-allowed" type="button" disabled title="Pengecekan aktif setelah data jadwal tersedia">
                            <span class="material-symbols-outlined text-[18px]">fact_check</span>
                            Cek Bentrok Ruang &amp; Jam
                        </button>
                        <button class="inline-flex items-center gap-2 px-3.5 py-2.5 rounded-lg bg-slate-900 text-white text-xs font-bold" type="button" id="toggle-view">
                            <span class="material-symbols-outlined text-[18px]" id="toggle-view-icon">calendar_view_week</span>
                            <span id="toggle-view-label">Buka Tampilan Kalender</span>
                        </button>
                        <button class="inline-flex items-center gap-2 px-4 py-2.5 rounded-lg bg-[#f37021] text-white text-xs font-bold shadow-sm cursor-not-allowed" type="button" disabled title="Pembuatan sesi akan tersedia setelah modul jadwal terhubung">
                            <span class="material-symbols-outlined text-[18px]">add_circle</span>
                            Tambah Sesi Presentasi
                        </button>
                    </div>
                </section>

                <div class="rounded-xl bg-amber-50 border border-amber-200 px-4 py-3 flex items-start gap-2.5 text-xs text-amber-900" role="note">
                    <span class="material-symbols-outlined text-[18px] text-amber-700">info</span>
                    <p><strong>Pratinjau desain:</strong> jadwal, angka ringkasan, dan ketersediaan ruang di bawah adalah data contoh. Database aplikasi belum menyediakan penyimpanan sesi presentasi.</p>
                </div>

                <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" aria-label="Ringkasan jadwal presentasi">
                    <article class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm flex items-start justify-between gap-3">
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Total Sesi Terjadwal</p>
                            <p class="font-display text-3xl font-bold text-slate-900 mt-1">38 <span class="text-sm font-medium text-slate-500">Sesi</span></p>
                            <p class="text-[11px] text-slate-500 mt-2">24 Sempro <span class="mx-1">•</span> 14 Sidang Akhir</p>
                        </div>
                        <span class="w-10 h-10 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center material-symbols-outlined">event_note</span>
                    </article>
                    <article class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm flex items-start justify-between gap-3">
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Sesi Minggu Ini</p>
                            <p class="font-display text-3xl font-bold text-slate-900 mt-1">12 <span class="text-sm font-medium text-slate-500">Sesi</span></p>
                            <p class="text-[11px] text-emerald-700 font-medium mt-2">Siap terlaksana</p>
                        </div>
                        <span class="w-10 h-10 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center material-symbols-outlined">pending_actions</span>
                    </article>
                    <article class="bg-white rounded-xl p-5 border border-slate-200 shadow-sm flex items-start justify-between gap-3">
                        <div>
                            <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Ruang Terpakai Hari Ini</p>
                            <p class="font-display text-3xl font-bold text-slate-900 mt-1">6 <span class="text-sm font-medium text-slate-500">Ruang</span></p>
                            <p class="text-[11px] text-slate-500 mt-2">Lab IoT, ruang sidang, Zoom</p>
                        </div>
                        <span class="w-10 h-10 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center material-symbols-outlined">meeting_room</span>
                    </article>
                    <article class="bg-slate-800 rounded-xl p-5 shadow-sm text-white flex items-start justify-between gap-3">
                        <div>
                            <p class="text-xs text-slate-300 uppercase tracking-wider font-semibold">Deteksi Bentrok Jadwal</p>
                            <p class="font-display text-3xl font-extrabold mt-1">0 <span class="text-xs font-medium text-slate-300">Bentrok</span></p>
                            <p class="text-[11px] text-emerald-300 mt-2">Data contoh — belum diverifikasi</p>
                        </div>
                        <span class="w-10 h-10 rounded-lg bg-white/10 text-emerald-300 flex items-center justify-center material-symbols-outlined">rule</span>
                    </article>
                </section>

                <section class="bg-white rounded-xl p-4 border border-slate-200 shadow-sm space-y-4" aria-label="Filter jadwal presentasi">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-3 border-b border-slate-100 pb-3">
                        <div class="inline-flex self-start bg-slate-100 p-1 rounded-lg" role="tablist" aria-label="Tampilan jadwal">
                            <button class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-white text-slate-900 shadow-sm text-xs font-bold" id="list-tab" type="button" role="tab" aria-selected="true">
                                <span class="material-symbols-outlined text-[16px] text-[#f37021]">format_list_bulleted</span>Tabel Sesi
                            </button>
                            <button class="inline-flex items-center gap-2 px-3 py-1.5 rounded-md text-slate-600 text-xs font-medium" id="calendar-tab" type="button" role="tab" aria-selected="false">
                                <span class="material-symbols-outlined text-[16px]">calendar_month</span>Timeline Kalender
                            </button>
                        </div>
                        <span class="inline-flex items-center gap-2 text-xs font-semibold text-emerald-700">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>Contoh data: tidak terhubung ke pemeriksaan bentrok
                        </span>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-12 gap-3">
                        <label class="lg:col-span-4 relative">
                            <span class="sr-only">Cari jadwal</span>
                            <span class="material-symbols-outlined text-[18px] text-slate-400 absolute left-3 top-2.5">search</span>
                            <input id="schedule-search" class="w-full bg-slate-50 border border-slate-200 rounded-lg pl-9 pr-3 py-2 text-xs" placeholder="Cari tim, topik, dosen, atau ruang..." type="search">
                        </label>
                        <label class="lg:col-span-3">
                            <span class="sr-only">Jenis sesi</span>
                            <select id="schedule-type" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 text-xs">
                                <option value="">Semua Jenis Sesi</option><option value="sempro">Seminar Proposal</option><option value="sidang">Sidang Akhir Capstone</option>
                            </select>
                        </label>
                        <label class="lg:col-span-3">
                            <span class="sr-only">Ruangan</span>
                            <select id="schedule-room" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 text-xs">
                                <option value="">Semua Ruangan</option><option value="sidang">Ruang Sidang</option><option value="iot">Lab IoT</option><option value="zoom">Zoom</option>
                            </select>
                        </label>
                        <label class="lg:col-span-2">
                            <span class="sr-only">Periode jadwal</span>
                            <select id="schedule-period" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-3 py-2 text-xs">
                                <option value="">Semua Periode</option><option value="week-1">24–28 Feb</option><option value="week-2">3–7 Mar</option>
                            </select>
                        </label>
                    </div>
                </section>

                <section id="schedule-list" class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden" aria-label="Daftar penjadwalan sesi">
                    <div class="px-5 sm:px-6 py-4 border-b border-slate-200 flex flex-wrap items-center justify-between gap-2">
                        <div class="flex items-center gap-2">
                            <h2 class="font-display text-sm font-bold text-slate-900">Daftar Penjadwalan Sesi Aktif</h2>
                            <span id="session-count" class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[11px] font-semibold">5 sesi</span>
                        </div>
                        <span class="text-xs text-slate-500">Contoh jadwal semester</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[1100px] text-left border-collapse">
                            <thead class="bg-slate-50 text-slate-500 text-[11px] uppercase tracking-wider border-b border-slate-200">
                                <tr>
                                    <th class="py-3 px-4 font-semibold">Proyek &amp; Tim</th><th class="py-3 px-4 font-semibold">Jenis</th><th class="py-3 px-4 font-semibold">Tanggal &amp; Waktu</th><th class="py-3 px-4 font-semibold">Ruang</th><th class="py-3 px-4 font-semibold">Status</th><th class="py-3 px-4 font-semibold">Dewan Penguji</th><th class="py-3 px-4 font-semibold text-right">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-xs" id="schedule-rows">
                                <tr data-session data-type="sempro" data-room="sidang" data-period="week-1" data-search="tim c-01 edulink filkom platform kolaborasi monev bimbingan capstone muhammad raihan ruang sidang utama dr fitra sabriansyah">
                                    <td class="py-4 px-4 align-top"><strong class="text-sm text-slate-900">Tim C-01 • EduLink FILKOM</strong><p class="text-slate-500 mt-1">Platform Kolaborasi &amp; Monev Bimbingan Capstone</p><p class="text-[11px] text-slate-500 mt-1">Ketua: Muhammad Raihan • 4 Mahasiswa</p></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded bg-sky-50 text-sky-700 font-semibold">Seminar Proposal</span></td>
                                    <td class="py-4 px-4 align-top whitespace-nowrap"><strong>Senin, 24 Feb 2025</strong><p class="text-slate-500 font-mono mt-1">09:00–10:30 WIB</p></td>
                                    <td class="py-4 px-4 align-top"><strong>Ruang Sidang Utama</strong><p class="text-slate-500 mt-1">Gedung F Lt. 2</p><span class="text-[10px] text-slate-500">Proyektor • Smart TV</span></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded-full bg-emerald-50 text-emerald-700 font-semibold">Terjadwal</span></td>
                                    <td class="py-4 px-4 align-top text-slate-600"><p>P: Dr. Eng. Fitra A.</p><p class="mt-1">U1: Sabriansyah R.</p><p>U2: Mahendra Data</p></td>
                                    <td class="py-4 px-4 align-top text-right"><button class="p-1.5 text-slate-400 cursor-not-allowed" type="button" disabled title="Aksi belum tersedia"><span class="material-symbols-outlined">visibility</span></button></td>
                                </tr>
                                <tr data-session data-type="sidang" data-room="iot" data-period="week-1" data-search="tim c-02 agrosmart sensor sistem monitoring iot lahan presisi fikri alamsyah lab iot rizal maulana">
                                    <td class="py-4 px-4 align-top"><strong class="text-sm text-slate-900">Tim C-02 • AgroSmart Sensor</strong><p class="text-slate-500 mt-1">Sistem Monitoring IoT Lahan Presisi</p><p class="text-[11px] text-slate-500 mt-1">Ketua: Fikri Alamsyah • 3 Mahasiswa</p></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded bg-orange-50 text-[#a04100] font-semibold">Sidang Akhir</span></td>
                                    <td class="py-4 px-4 align-top whitespace-nowrap"><strong>Senin, 24 Feb 2025</strong><p class="text-slate-500 font-mono mt-1">13:00–14:30 WIB</p></td>
                                    <td class="py-4 px-4 align-top"><strong>Lab IoT &amp; Robotika</strong><p class="text-slate-500 mt-1">Gedung G Lt. 3 • Kapasitas 20</p></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded-full bg-emerald-50 text-emerald-700 font-semibold">Terjadwal</span></td>
                                    <td class="py-4 px-4 align-top text-slate-600"><p>P: Rizal Maulana</p><p class="mt-1">U1: Hurian Hasbi</p><p>U2: Kasyful Amron</p></td>
                                    <td class="py-4 px-4 align-top text-right"><button class="p-1.5 text-slate-400 cursor-not-allowed" type="button" disabled title="Aksi belum tersedia"><span class="material-symbols-outlined">visibility</span></button></td>
                                </tr>
                                <tr data-session data-type="sempro" data-room="zoom" data-period="week-1" data-search="tim c-03 healthsync wearable telemedicine vital signs jonathan putra zoom heru nurwarsito">
                                    <td class="py-4 px-4 align-top"><strong class="text-sm text-slate-900">Tim C-03 • HealthSync Wearable</strong><p class="text-slate-500 mt-1">Telemedicine Deteksi Dini Vital Signs</p><p class="text-[11px] text-slate-500 mt-1">Ketua: Jonathan Putra • 3 Mahasiswa</p></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded bg-sky-50 text-sky-700 font-semibold">Seminar Proposal</span></td>
                                    <td class="py-4 px-4 align-top whitespace-nowrap"><strong>Selasa, 25 Feb 2025</strong><p class="text-slate-500 font-mono mt-1">10:00–11:30 WIB</p></td>
                                    <td class="py-4 px-4 align-top"><strong>Online via Zoom</strong><p class="text-slate-500 mt-1">Room Capstone 01</p><span class="text-[10px] text-emerald-700">Auto-Record</span></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded-full bg-amber-50 text-amber-800 font-semibold">Menunggu Konfirmasi</span></td>
                                    <td class="py-4 px-4 align-top text-slate-600"><p>P: Ir. Heru Nurwarsito</p><p class="mt-1 italic">Dewan penguji belum disetujui</p></td>
                                    <td class="py-4 px-4 align-top text-right"><button class="p-1.5 text-slate-400 cursor-not-allowed" type="button" disabled title="Aksi belum tersedia"><span class="material-symbols-outlined">visibility</span></button></td>
                                </tr>
                                <tr data-session data-type="sidang" data-room="sidang" data-period="week-2" data-search="tim b-05 eduvr anatomy media pembelajaran vr kevin sanjaya ruang sidang">
                                    <td class="py-4 px-4 align-top"><strong class="text-sm text-slate-900">Tim B-05 • EduVR Anatomy</strong><p class="text-slate-500 mt-1">Media Pembelajaran Imersif Anatomi Berbasis VR</p><p class="text-[11px] text-slate-500 mt-1">Ketua: Kevin Sanjaya • 4 Mahasiswa</p></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded bg-orange-50 text-[#a04100] font-semibold">Sidang Akhir</span></td>
                                    <td class="py-4 px-4 align-top whitespace-nowrap"><strong>Rabu, 5 Mar 2025</strong><p class="text-slate-500 font-mono mt-1">09:00–10:30 WIB</p></td>
                                    <td class="py-4 px-4 align-top"><strong>Ruang Sidang 2</strong><p class="text-slate-500 mt-1">Gedung F Lt. 3</p></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded-full bg-emerald-50 text-emerald-700 font-semibold">Terjadwal</span></td>
                                    <td class="py-4 px-4 align-top text-slate-600"><p>P: Dosen Koordinator</p><p class="mt-1">U1 &amp; U2: Ditugaskan</p></td>
                                    <td class="py-4 px-4 align-top text-right"><button class="p-1.5 text-slate-400 cursor-not-allowed" type="button" disabled title="Aksi belum tersedia"><span class="material-symbols-outlined">visibility</span></button></td>
                                </tr>
                                <tr data-session data-type="sempro" data-room="sidang" data-period="week-1" data-search="tim a-02 agridrone ai pemetaan hasil panen drone salsa nadya ruang sidang relokasi reschedule">
                                    <td class="py-4 px-4 align-top"><strong class="text-sm text-slate-900">Tim A-02 • AgriDrone AI</strong><p class="text-slate-500 mt-1">Pemetaan Estimasi Hasil Panen Menggunakan Drone</p><p class="text-[11px] text-slate-500 mt-1">Ketua: Salsa Nadya • 4 Mahasiswa</p></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded bg-sky-50 text-sky-700 font-semibold">Seminar Proposal</span></td>
                                    <td class="py-4 px-4 align-top whitespace-nowrap"><strong class="line-through text-slate-500">Kamis, 27 Feb 2025</strong><p class="text-slate-500 font-mono mt-1">09:00–10:30 WIB</p></td>
                                    <td class="py-4 px-4 align-top"><strong>Ruang Sidang Utama</strong><p class="text-slate-500 mt-1">Relokasi karena renovasi proyektor</p></td>
                                    <td class="py-4 px-4 align-top"><span class="px-2 py-1 rounded-full bg-rose-50 text-rose-700 font-semibold">Perlu Reschedule</span></td>
                                    <td class="py-4 px-4 align-top text-slate-600">Jadwal ruang ditangguhkan</td>
                                    <td class="py-4 px-4 align-top text-right"><button class="px-2 py-1 rounded bg-slate-100 text-slate-400 text-[11px] cursor-not-allowed" type="button" disabled>Relokasi</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div id="no-sessions" class="hidden px-6 py-10 text-center text-sm text-slate-500">Tidak ada sesi yang sesuai dengan filter.</div>
                    <div class="px-5 py-3 bg-slate-50 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2 text-xs text-slate-500">
                        <span>Menampilkan <strong id="visible-count" class="text-slate-800">5</strong> dari 5 sesi contoh</span>
                        <span>Pagination aktif setelah data jadwal tersedia</span>
                    </div>
                </section>

                <section id="schedule-calendar" class="hidden space-y-4" aria-label="Timeline kalender presentasi">
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                        <div class="p-4 border-b border-slate-200 flex flex-wrap items-center justify-between gap-2">
                            <div><h2 class="font-display text-sm font-bold text-slate-900">Timeline Sesi Presentasi</h2><p class="text-xs text-slate-500 mt-1">Senin, 24 – Jumat, 28 Februari 2025 • data contoh</p></div>
                            <span class="text-xs text-slate-500">WIB (UTC+7)</span>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 divide-y md:divide-y-0 md:divide-x divide-slate-200">
                            <div class="p-4 min-h-48"><h3 class="text-xs font-bold text-slate-700 border-b border-slate-100 pb-2">Senin, 24 Feb</h3><article class="mt-3 p-3 rounded-lg bg-sky-50 border-l-4 border-sky-500"><p class="text-[11px] text-slate-500">09:00–10:30</p><p class="text-xs font-bold text-slate-900 mt-1">Tim C-01 • Sempro</p><p class="text-[11px] text-slate-600 mt-1">Ruang Sidang Utama</p></article><article class="mt-2 p-3 rounded-lg bg-orange-50 border-l-4 border-[#f37021]"><p class="text-[11px] text-slate-500">13:00–14:30</p><p class="text-xs font-bold text-slate-900 mt-1">Tim C-02 • Sidang Akhir</p><p class="text-[11px] text-slate-600 mt-1">Lab IoT &amp; Robotika</p></article></div>
                            <div class="p-4 min-h-48"><h3 class="text-xs font-bold text-slate-700 border-b border-slate-100 pb-2">Selasa, 25 Feb</h3><article class="mt-3 p-3 rounded-lg bg-sky-50 border-l-4 border-sky-500"><p class="text-[11px] text-slate-500">10:00–11:30</p><p class="text-xs font-bold text-slate-900 mt-1">Tim C-03 • Sempro</p><p class="text-[11px] text-slate-600 mt-1">Online via Zoom</p></article></div>
                            <div class="p-4 min-h-48"><h3 class="text-xs font-bold text-slate-700 border-b border-slate-100 pb-2">Rabu, 26 Feb</h3><p class="text-xs text-slate-400 mt-3">Belum ada sesi contoh.</p></div>
                            <div class="p-4 min-h-48"><h3 class="text-xs font-bold text-slate-700 border-b border-slate-100 pb-2">Kamis, 27 Feb</h3><article class="mt-3 p-3 rounded-lg bg-rose-50 border-l-4 border-rose-500"><p class="text-[11px] text-slate-500">09:00–10:30</p><p class="text-xs font-bold text-slate-900 mt-1">Tim A-02 • Perlu Reschedule</p><p class="text-[11px] text-slate-600 mt-1">Ruang Sidang Utama</p></article></div>
                            <div class="p-4 min-h-48"><h3 class="text-xs font-bold text-slate-700 border-b border-slate-100 pb-2">Jumat, 28 Feb</h3><p class="text-xs text-slate-400 mt-3">Belum ada sesi contoh.</p></div>
                        </div>
                    </div>
                </section>

                <section class="grid grid-cols-1 xl:grid-cols-12 gap-6" aria-label="Ketersediaan ruang">
                    <article class="xl:col-span-8 bg-white rounded-xl p-5 shadow-sm border border-slate-200">
                        <div class="flex flex-wrap items-center justify-between gap-2 border-b border-slate-100 pb-3">
                            <div><h2 class="font-display text-sm font-bold text-slate-900">Matriks Ketersediaan Ruangan</h2><p class="text-[11px] text-slate-500 mt-1">Contoh pemantauan slot ruang per hari</p></div>
                            <span class="text-xs font-semibold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-full">Data belum real-time</span>
                        </div>
                        <div class="overflow-x-auto mt-3">
                            <table class="w-full min-w-[620px] text-xs">
                                <thead><tr class="text-slate-500 border-b border-slate-100 text-[11px]"><th class="py-2.5 text-left font-semibold">Ruang</th><th class="py-2.5 text-center font-semibold">08:00–10:00</th><th class="py-2.5 text-center font-semibold">10:00–12:00</th><th class="py-2.5 text-center font-semibold">13:00–15:00</th><th class="py-2.5 text-center font-semibold">15:30–17:00</th></tr></thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr><td class="py-3 font-semibold">Ruang Sidang 1 (Gedung F Lt. 2)</td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-amber-50 text-amber-800 rounded">Terisi</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-emerald-50 text-emerald-800 rounded">Kosong</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-amber-50 text-amber-800 rounded">Terisi</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-emerald-50 text-emerald-800 rounded">Kosong</span></td></tr>
                                    <tr><td class="py-3 font-semibold">Ruang Sidang 2 (Gedung F Lt. 3)</td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-emerald-50 text-emerald-800 rounded">Kosong</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-emerald-50 text-emerald-800 rounded">Kosong</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-emerald-50 text-emerald-800 rounded">Kosong</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-amber-50 text-amber-800 rounded">Terisi</span></td></tr>
                                    <tr><td class="py-3 font-semibold">Lab IoT &amp; Robotika (Gedung G)</td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-emerald-50 text-emerald-800 rounded">Kosong</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-amber-50 text-amber-800 rounded">Terisi</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-amber-50 text-amber-800 rounded">Terisi</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-emerald-50 text-emerald-800 rounded">Kosong</span></td></tr>
                                    <tr><td class="py-3 font-semibold">Lab Rekayasa Perangkat Lunak</td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-amber-50 text-amber-800 rounded">Terisi</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-amber-50 text-amber-800 rounded">Terisi</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-emerald-50 text-emerald-800 rounded">Kosong</span></td><td class="py-3 px-1 text-center"><span class="inline-block px-2 py-1 bg-emerald-50 text-emerald-800 rounded">Kosong</span></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </article>
                    <aside class="xl:col-span-4 bg-white rounded-xl p-5 shadow-sm border border-slate-200 flex flex-col justify-between gap-4">
                        <div>
                            <div class="flex items-center gap-2 text-[#a04100]"><span class="material-symbols-outlined">lightbulb</span><h2 class="text-xs uppercase tracking-wider font-bold">Tips Penjadwalan</h2></div>
                            <p class="text-xs text-slate-600 leading-relaxed mt-3">Untuk presentasi dengan demonstrasi perangkat keras, prioritaskan Lab IoT &amp; Robotika yang dilengkapi catu daya dan instrumen ukur.</p>
                            <div class="p-3 mt-4 bg-sky-50 rounded-lg text-xs text-sky-900"><strong>Kewenangan Admin:</strong><p class="text-[11px] mt-1">Perubahan tanggal dan ruang perlu diberitahukan kepada seluruh anggota tim.</p></div>
                        </div>
                        <p class="pt-3 border-t border-slate-100 text-[11px] text-slate-500">Penugasan penguji: Dosen Koordinator (UC-22).</p>
                    </aside>
                </section>

                <section class="bg-white rounded-xl p-5 border border-slate-200 border-l-4 border-l-[#f37021] flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="max-w-3xl">
                        <span class="text-[10px] font-bold tracking-wider uppercase text-[#a04100]">SOP FILKOM UB</span>
                        <h2 class="font-display text-sm font-bold text-slate-900 mt-1">Ketentuan Alokasi Logistik &amp; Sesi Presentasi (UC-21)</h2>
                        <p class="text-xs text-slate-600 leading-relaxed mt-2">Admin mengatur waktu dan ruang serta mencegah bentrok fasilitas. Penetapan dewan penguji seminar proposal dan sidang akhir merupakan wewenang Dosen Koordinator (UC-22).</p>
                    </div>
                    <button class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-slate-100 text-slate-400 text-xs font-semibold cursor-not-allowed shrink-0" type="button" disabled title="Unduhan tersedia setelah data jadwal terhubung">
                        <span class="material-symbols-outlined text-[16px]">download</span>Unduh Jadwal Lengkap
                    </button>
                </section>
            </div>
        </div>

        @include('dashboard.admin.footer')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const list = document.getElementById('schedule-list');
            const calendar = document.getElementById('schedule-calendar');
            const listTab = document.getElementById('list-tab');
            const calendarTab = document.getElementById('calendar-tab');
            const toggleButton = document.getElementById('toggle-view');
            const toggleLabel = document.getElementById('toggle-view-label');
            const toggleIcon = document.getElementById('toggle-view-icon');
            const searchInput = document.getElementById('schedule-search');
            const typeFilter = document.getElementById('schedule-type');
            const roomFilter = document.getElementById('schedule-room');
            const periodFilter = document.getElementById('schedule-period');
            const rows = Array.from(document.querySelectorAll('[data-session]'));
            const visibleCount = document.getElementById('visible-count');
            const sessionCount = document.getElementById('session-count');
            const noSessions = document.getElementById('no-sessions');

            const setView = (showCalendar) => {
                list.classList.toggle('hidden', showCalendar);
                calendar.classList.toggle('hidden', !showCalendar);
                listTab.setAttribute('aria-selected', String(!showCalendar));
                calendarTab.setAttribute('aria-selected', String(showCalendar));
                listTab.className = showCalendar
                    ? 'inline-flex items-center gap-2 px-3 py-1.5 rounded-md text-slate-600 text-xs font-medium'
                    : 'inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-white text-slate-900 shadow-sm text-xs font-bold';
                calendarTab.className = showCalendar
                    ? 'inline-flex items-center gap-2 px-3 py-1.5 rounded-md bg-white text-slate-900 shadow-sm text-xs font-bold'
                    : 'inline-flex items-center gap-2 px-3 py-1.5 rounded-md text-slate-600 text-xs font-medium';
                toggleIcon.textContent = showCalendar ? 'format_list_bulleted' : 'calendar_view_week';
                toggleLabel.textContent = showCalendar ? 'Buka Tampilan Tabel' : 'Buka Tampilan Kalender';
            };

            const filterRows = () => {
                const query = searchInput.value.trim().toLocaleLowerCase('id');
                let count = 0;
                rows.forEach((row) => {
                    const matches = row.dataset.search.includes(query)
                        && (!typeFilter.value || row.dataset.type === typeFilter.value)
                        && (!roomFilter.value || row.dataset.room === roomFilter.value)
                        && (!periodFilter.value || row.dataset.period === periodFilter.value);
                    row.classList.toggle('hidden', !matches);
                    if (matches) count += 1;
                });
                visibleCount.textContent = String(count);
                sessionCount.textContent = `${count} sesi`;
                noSessions.classList.toggle('hidden', count !== 0);
            };

            listTab.addEventListener('click', () => setView(false));
            calendarTab.addEventListener('click', () => setView(true));
            toggleButton.addEventListener('click', () => setView(calendar.classList.contains('hidden')));
            [searchInput, typeFilter, roomFilter, periodFilter].forEach((filter) => {
                filter.addEventListener('input', filterRows);
                filter.addEventListener('change', filterRows);
            });
        });
    </script>
</body>
</html>
