<div class="max-w-7xl mx-auto space-y-8">
    <section>
        <h2 class="font-display text-4xl font-bold text-on-surface">Dashboard Overview</h2>
        <p class="text-lg text-on-surface-variant mt-2">Monitor capstone project coordination and administration.</p>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-4 gap-4" aria-label="Statistik dashboard">
        <article class="bg-surface-container-lowest rounded-xl p-6 shadow-sm border border-tertiary-fixed">
            <div class="flex justify-between items-start">
                <span class="text-sm text-on-surface-variant uppercase tracking-wider">Dosen Terdaftar</span>
                <span class="p-2 bg-primary-container rounded-lg text-white material-symbols-outlined">school</span>
            </div>
            <strong class="block mt-4 font-display text-4xl text-on-surface">142</strong>
        </article>
        <article class="bg-surface-container-lowest rounded-xl p-6 shadow-sm border border-tertiary-fixed">
            <div class="flex justify-between items-start">
                <span class="text-sm text-on-surface-variant uppercase tracking-wider">Kelas Capstone</span>
                <span class="p-2 bg-secondary-container rounded-lg text-secondary material-symbols-outlined">class</span>
            </div>
            <strong class="block mt-4 font-display text-4xl text-on-surface">38</strong>
        </article>
        <article class="bg-error-container rounded-xl p-6 shadow-sm border border-error">
            <div class="flex justify-between items-start">
                <span class="text-sm text-on-error-container uppercase tracking-wider font-bold">Tanpa Koordinator</span>
                <span class="p-2 bg-error rounded-lg text-white material-symbols-outlined">person_off</span>
            </div>
            <strong class="block mt-4 font-display text-4xl text-on-error-container">12</strong>
            <p class="text-sm text-on-error-container mt-1">Requires immediate action</p>
        </article>
        <article class="bg-surface-container-lowest rounded-xl p-6 shadow-sm border border-tertiary-fixed">
            <div class="flex justify-between items-start">
                <span class="text-sm text-on-surface-variant uppercase tracking-wider">Mitra Industri</span>
                <span class="p-2 bg-surface-container rounded-lg text-on-surface-variant material-symbols-outlined">domain</span>
            </div>
            <strong class="block mt-4 font-display text-4xl text-on-surface">56</strong>
        </article>
    </section>

    <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <article class="lg:col-span-2 bg-surface-container-lowest rounded-xl shadow-sm border border-tertiary-fixed overflow-hidden">
            <div class="p-6 border-b border-tertiary-fixed flex justify-between items-center">
                <h3 class="text-lg font-semibold text-on-surface">Kelas Capstone Belum Ada Koordinator</h3>
                <a class="text-primary text-sm font-medium hover:underline" href="#">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-surface-container-low text-sm text-on-surface-variant border-b border-tertiary-fixed">
                        <tr>
                            <th class="p-4 font-medium">Kode Kelas</th>
                            <th class="p-4 font-medium">Nama Kelas</th>
                            <th class="p-4 font-medium">Program Studi</th>
                            <th class="p-4 font-medium text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-on-surface divide-y divide-tertiary-fixed">
                        @foreach ([
                            ['CAP-2023-A1', 'Sistem Informasi Korporat', 'Sistem Informasi'],
                            ['CAP-2023-B3', 'Pengembangan Aplikasi Mobile', 'Teknik Informatika'],
                            ['CAP-2023-C2', 'Manajemen Jaringan Lanjut', 'Teknik Komputer'],
                            ['CAP-2023-D5', 'Kecerdasan Buatan Terapan', 'Teknik Informatika'],
                        ] as $class)
                            <tr class="hover:bg-surface-container-low transition-colors">
                                <td class="p-4">{{ $class[0] }}</td>
                                <td class="p-4 font-medium text-primary">{{ $class[1] }}</td>
                                <td class="p-4 text-on-surface-variant">{{ $class[2] }}</td>
                                <td class="p-4 text-right"><span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-error-container text-on-error-container text-xs"><span class="w-2 h-2 rounded-full bg-error"></span>Unassigned</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-tertiary-fixed flex justify-center">
                <button class="px-6 py-2 border border-outline-variant text-on-surface rounded-lg text-sm hover:bg-surface-container-high transition-colors" type="button">Terapkan Koordinator Massal</button>
            </div>
        </article>

        <article class="bg-surface-container-lowest rounded-xl shadow-sm border border-tertiary-fixed">
            <div class="p-6 border-b border-tertiary-fixed">
                <h3 class="text-lg font-semibold text-on-surface">Recent Notifications</h3>
            </div>
            <div class="p-6 flex flex-col gap-6">
                @foreach ([
                    ['assignment_late', 'Kelas X belum memiliki koordinator', 'Batas waktu penentuan koordinator untuk kelas X berakhir dalam 2 hari.', '2 hours ago', 'error'],
                    ['pending_actions', '4 permohonan menunggu tindak lanjut', 'Terdapat permohonan pergantian anggota tim dari mahasiswa.', '5 hours ago', 'secondary'],
                    ['handshake', 'Mitra Baru Terdaftar', 'PT Teknologi Inovasi Nusantara telah menyetujui MoU capstone.', '1 day ago', 'primary'],
                ] as $notification)
                    <div class="flex gap-4 items-start">
                        <div class="p-2 bg-{{ $notification[4] }}-container text-{{ $notification[4] }} rounded-full shrink-0"><span class="material-symbols-outlined text-xl">{{ $notification[0] }}</span></div>
                        <div>
                            <p class="text-sm font-semibold text-on-surface">{{ $notification[1] }}</p>
                            <p class="text-sm text-on-surface-variant mt-1">{{ $notification[2] }}</p>
                            <span class="text-xs text-on-surface-variant mt-2 block">{{ $notification[3] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </section>
</div>
