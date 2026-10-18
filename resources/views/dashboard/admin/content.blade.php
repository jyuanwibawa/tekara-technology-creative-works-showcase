<div class="max-w-7xl mx-auto space-y-8">
    <section class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="font-display text-3xl font-extrabold text-slate-900 tracking-tight">Dashboard Overview</h2>
            <p class="text-slate-500 text-sm mt-1 font-medium">Ringkasan koordinasi proyek capstone dan aktivitas administrasi.</p>
        </div>
        <div class="flex items-center gap-3">
            <a class="inline-flex items-center gap-2 px-4 py-2 bg-white border border-slate-200 text-slate-700 text-xs font-semibold rounded-xl hover:bg-slate-50 transition-colors shadow-sm" href="{{ route('coming-soon') }}">
                <span class="material-symbols-outlined text-[18px] text-slate-500">add_business</span>
                <span>Tambah Mitra</span>
            </a>
            <a class="inline-flex items-center gap-2 px-4 py-2 bg-slate-900 text-white text-xs font-semibold rounded-xl hover:bg-slate-800 transition-colors shadow-sm border border-slate-900" href="{{ route('admin.kelas-capstone') }}">
                <span class="material-symbols-outlined text-[18px] text-[#f37021]">add_circle</span>
                <span>Tambah Kelas</span>
            </a>
        </div>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" aria-label="Statistik dashboard">
        <article class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:border-slate-300 transition-colors">
            <div class="flex justify-between items-start">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Kelas Aktif</span>
                <span class="p-2.5 bg-slate-100 rounded-xl text-slate-700 material-symbols-outlined text-[22px]">school</span>
            </div>
            <div class="mt-4">
                <strong class="font-display text-3xl font-extrabold text-slate-900">38</strong>
                <p class="text-xs font-semibold text-slate-500 mt-1"><span class="text-emerald-600 font-bold">+2</span> semester ini</p>
            </div>
        </article>
        <article class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:border-slate-300 transition-colors">
            <div class="flex justify-between items-start">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Tim Terbentuk</span>
                <span class="p-2.5 bg-slate-100 rounded-xl text-slate-700 material-symbols-outlined text-[22px]">groups</span>
            </div>
            <div class="mt-4">
                <strong class="font-display text-3xl font-extrabold text-slate-900">84</strong>
                <p class="text-xs font-medium text-slate-500 mt-1">Dari target 90 tim (93%)</p>
            </div>
        </article>
        <article class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:border-slate-300 transition-colors">
            <div class="flex justify-between items-start">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Sesi Presentasi Mendatang</span>
                <span class="p-2.5 bg-slate-100 rounded-xl text-slate-700 material-symbols-outlined text-[22px]">event</span>
            </div>
            <div class="mt-4">
                <strong class="font-display text-3xl font-extrabold text-slate-900">16</strong>
                <p class="text-xs font-medium text-slate-500 mt-1">Sesi terjadwal 7 hari ke depan</p>
            </div>
        </article>
        <article class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80 flex flex-col justify-between hover:border-slate-300 transition-colors">
            <div class="flex justify-between items-start">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Mitra Terdaftar</span>
                <span class="p-2.5 bg-orange-50 text-[#f37021] rounded-xl border border-orange-100 material-symbols-outlined text-[22px]">handshake</span>
            </div>
            <div class="mt-4">
                <strong class="font-display text-3xl font-extrabold text-slate-900">56</strong>
                <p class="text-xs font-medium text-slate-500 mt-1">Industri &amp; instansi aktif</p>
            </div>
        </article>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 gap-4" aria-label="Peringatan dan tindak lanjut">
        <article class="bg-rose-50/70 border border-rose-200 rounded-2xl p-4 sm:p-5 flex items-start gap-4">
            <span class="p-2.5 bg-rose-600 text-white rounded-xl shrink-0 shadow-sm material-symbols-outlined text-[22px]">person_off</span>
            <div class="flex-1">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-rose-700">Perhatian</span>
                    <span class="w-1.5 h-1.5 rounded-full bg-rose-600"></span>
                    <span class="text-xs font-bold text-rose-950">3 kelas belum memiliki koordinator</span>
                </div>
                <p class="text-xs text-rose-900/80 mt-1 leading-relaxed">Tetapkan dosen koordinator agar mahasiswa dapat segera memulai proyek.</p>
                <a class="inline-flex items-center gap-1.5 text-xs font-bold text-rose-700 hover:text-rose-950 hover:underline mt-3" href="{{ route('coming-soon') }}">Tetapkan Koordinator <span class="material-symbols-outlined text-[16px]">arrow_forward</span></a>
            </div>
        </article>
        <article class="bg-amber-50/80 border border-amber-200 rounded-2xl p-4 sm:p-5 flex items-start gap-4">
            <span class="p-2.5 bg-amber-500 text-white rounded-xl shrink-0 shadow-sm material-symbols-outlined text-[22px]">group_remove</span>
            <div class="flex-1">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-amber-800">Validasi Tim</span>
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                    <span class="text-xs font-bold text-amber-950">5 tim belum memenuhi kuota anggota</span>
                </div>
                <p class="text-xs text-amber-900/80 mt-1 leading-relaxed">Tim tersebut belum memenuhi syarat minimal 3 anggota sebelum pendaftaran ditutup.</p>
                <a class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-800 hover:text-amber-950 hover:underline mt-3" href="{{ route('coming-soon') }}">Lihat Daftar Tim <span class="material-symbols-outlined text-[16px]">arrow_forward</span></a>
            </div>
        </article>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">
        <article class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-200/80 flex flex-col overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex flex-wrap justify-between items-center gap-3">
                <div>
                    <h3 class="font-display text-base font-bold text-slate-900">Sesi Presentasi Mendatang</h3>
                    <p class="text-xs text-slate-500 mt-0.5 font-medium">Jadwal seminar kemajuan dan evaluasi capstone</p>
                </div>
                <a class="text-xs font-bold text-[#f37021] hover:underline inline-flex items-center gap-1" href="{{ route('coming-soon') }}">Lihat Semua Jadwal <span class="material-symbols-outlined text-[16px]">open_in_new</span></a>
            </div>
            <div class="w-full overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50/80 text-[11px] text-slate-500 uppercase font-semibold border-b border-slate-100">
                        <tr>
                            <th class="p-4 pl-6 whitespace-nowrap">Tanggal &amp; Waktu</th>
                            <th class="p-4 whitespace-nowrap">Kode &amp; Tim</th>
                            <th class="p-4 pr-6 whitespace-nowrap">Ruang / Platform</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 pl-6 text-xs text-slate-700 whitespace-nowrap"><span class="font-bold block text-slate-900">Senin, 19 Okt</span><span class="text-slate-500">09:00 - 10:30 WIB</span></td>
                            <td class="p-4 whitespace-nowrap"><span class="font-mono text-xs font-bold text-[#f37021]">CAP-01</span><p class="font-semibold text-slate-900 text-xs">Alpha AgroTech</p></td>
                            <td class="p-4 pr-6 text-xs text-slate-600 whitespace-nowrap"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-medium text-[11px]"><span class="material-symbols-outlined text-[14px]">meeting_room</span> Ruang Multimedia</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 pl-6 text-xs text-slate-700 whitespace-nowrap"><span class="font-bold block text-slate-900">Selasa, 20 Okt</span><span class="text-slate-500">13:00 - 14:30 WIB</span></td>
                            <td class="p-4 whitespace-nowrap"><span class="font-mono text-xs font-bold text-[#f37021]">CAP-04</span><p class="font-semibold text-slate-900 text-xs">MediCare Connect</p></td>
                            <td class="p-4 pr-6 text-xs text-slate-600 whitespace-nowrap"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 font-medium text-[11px]"><span class="material-symbols-outlined text-[14px]">videocam</span> Daring Zoom 01</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 pl-6 text-xs text-slate-700 whitespace-nowrap"><span class="font-bold block text-slate-900">Rabu, 21 Okt</span><span class="text-slate-500">10:00 - 11:30 WIB</span></td>
                            <td class="p-4 whitespace-nowrap"><span class="font-mono text-xs font-bold text-[#f37021]">CAP-12</span><p class="font-semibold text-slate-900 text-xs">Vision AI Guard</p></td>
                            <td class="p-4 pr-6 text-xs text-slate-600 whitespace-nowrap"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-medium text-[11px]"><span class="material-symbols-outlined text-[14px]">biotech</span> Lab AI</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 pl-6 text-xs text-slate-700 whitespace-nowrap"><span class="font-bold block text-slate-900">Kamis, 22 Okt</span><span class="text-slate-500">14:00 - 15:30 WIB</span></td>
                            <td class="p-4 whitespace-nowrap"><span class="font-mono text-xs font-bold text-[#f37021]">CAP-18</span><p class="font-semibold text-slate-900 text-xs">SupplyLogix</p></td>
                            <td class="p-4 pr-6 text-xs text-slate-600 whitespace-nowrap"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 font-medium text-[11px]"><span class="material-symbols-outlined text-[14px]">meeting_room</span> Ruang Sidang</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </article>

        <div class="space-y-6">
            <article class="bg-white rounded-2xl p-6 shadow-sm border border-slate-200/80">
                <h3 class="font-display text-base font-bold text-slate-900 mb-4">Status Kelengkapan Berkas</h3>
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-xs font-semibold mb-1"><span class="text-slate-600">MoU Mitra Industri</span><span class="text-slate-900">48 / 56 (85%)</span></div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden"><div class="bg-[#f37021] h-2 rounded-full" style="width: 85%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs font-semibold mb-1"><span class="text-slate-600">Proposal Terverifikasi</span><span class="text-slate-900">72 / 84 (86%)</span></div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden"><div class="bg-slate-800 h-2 rounded-full" style="width: 86%"></div></div>
                    </div>
                    <div>
                        <div class="flex justify-between text-xs font-semibold mb-1"><span class="text-slate-600">Penetapan Pembimbing</span><span class="text-slate-900">80 / 84 (95%)</span></div>
                        <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden"><div class="bg-emerald-500 h-2 rounded-full" style="width: 95%"></div></div>
                    </div>
                </div>
            </article>

            <article class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
                <div class="p-6 pb-3 border-b border-slate-100"><h3 class="font-display text-base font-bold text-slate-900">Tindak Lanjut Cepat</h3></div>
                <div class="p-6 pt-4 flex flex-col gap-4 text-xs">
                    <div class="flex gap-3 items-start pb-3 border-b border-slate-100">
                        <span class="p-2 bg-rose-50 text-rose-600 rounded-lg shrink-0 border border-rose-100 material-symbols-outlined text-[18px]">assignment_late</span>
                        <div><p class="font-bold text-slate-900 leading-snug">3 kelas tanpa koordinator</p><p class="text-slate-500 mt-0.5">Kelas TI-A, SI-C, dan TE-B memerlukan penetapan.</p><span class="text-[11px] font-semibold text-rose-600 mt-1 block">Batas: 2 hari</span></div>
                    </div>
                    <div class="flex gap-3 items-start pb-3 border-b border-slate-100">
                        <span class="p-2 bg-amber-50 text-amber-600 rounded-lg shrink-0 border border-amber-100 material-symbols-outlined text-[18px]">person_alert</span>
                        <div><p class="font-bold text-slate-900 leading-snug">5 tim belum memenuhi kuota</p><p class="text-slate-500 mt-0.5">Tim tersebut masih beranggotakan 2 mahasiswa.</p><span class="text-[11px] font-semibold text-slate-400 mt-1 block">Perlu tindak lanjut</span></div>
                    </div>
                    <div class="flex gap-3 items-start">
                        <span class="p-2 bg-orange-50 text-[#f37021] rounded-lg shrink-0 border border-orange-100 material-symbols-outlined text-[18px]">corporate_fare</span>
                        <div><p class="font-bold text-slate-900 leading-snug">Konfirmasi mitra baru</p><p class="text-slate-500 mt-0.5">PT Solusi Data Nusantara menunggu konfirmasi dokumen.</p><span class="text-[11px] font-semibold text-slate-400 mt-1 block">Kemarin</span></div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
