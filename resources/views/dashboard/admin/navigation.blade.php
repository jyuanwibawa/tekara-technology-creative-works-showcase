<aside class="hidden md:flex fixed left-0 top-0 h-full w-64 bg-white border-r border-tertiary-fixed flex-col py-3 z-40">
    <div class="px-5 mb-3 flex flex-col gap-1">
        <div class="h-10 w-10 rounded-full bg-primary text-white flex items-center justify-center text-base font-bold">UB</div>
        <h1 class="font-display text-lg text-primary font-bold leading-tight">Admin Portal</h1>
        <p class="text-[11px] text-on-surface-variant">University Capstone</p>
    </div>

    <nav class="flex-1 px-3 flex flex-col gap-0.5" aria-label="Navigasi admin">
        <a class="flex items-center gap-3 bg-primary-container text-on-primary-container rounded-lg px-3 py-1.5 text-xs font-bold" href="{{ route('admin.dashboard') }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span>Dashboard</span>
        </a>
        <a class="flex items-center gap-3 text-on-surface-variant px-3 py-1.5 text-xs hover:bg-secondary-container rounded-lg transition-colors" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined">group</span>
            <span>Kelola Dosen Koordinator</span>
        </a>
        <a class="flex items-center gap-3 text-on-surface-variant px-3 py-1.5 text-xs hover:bg-secondary-container rounded-lg transition-colors" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined">assignment</span>
            <span>Kelola Data Kelas</span>
        </a>
        <a class="flex items-center gap-3 text-on-surface-variant px-3 py-1.5 text-xs hover:bg-secondary-container rounded-lg transition-colors" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined">inventory_2</span>
            <span>Kelola Data Mitra</span>
        </a>
        <a class="flex items-center gap-3 text-on-surface-variant px-3 py-1.5 text-xs hover:bg-secondary-container rounded-lg transition-colors" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined">groups</span>
            <span>Kelola Keanggotaan Tim</span>
        </a>
        <a class="flex items-center gap-3 text-on-surface-variant px-3 py-1.5 text-xs hover:bg-secondary-container rounded-lg transition-colors" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined">event_available</span>
            <span>Jadwal Sesi Presentasi</span>
        </a>
        <a class="flex items-center gap-3 text-on-surface-variant px-3 py-1.5 text-xs hover:bg-secondary-container rounded-lg transition-colors" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined">fact_check</span>
            <span>Cetak Laporan Monev</span>
        </a>
    </nav>

    <div class="px-3 mt-auto flex flex-col gap-1">
        <a class="w-full bg-primary text-white py-1.5 rounded-lg text-xs font-medium flex items-center justify-center gap-2 hover:bg-primary-container transition-colors" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined text-base">add</span>
                Generate Report
        </a>
        <div class="border-t border-tertiary-fixed my-1"></div>
        <a class="flex items-center gap-3 text-on-surface-variant px-3 py-1.5 text-xs hover:bg-secondary-container rounded-lg transition-colors" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined">help_outline</span>
            <span>Help Center</span>
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
                <button class="w-full flex items-center gap-3 text-error px-3 py-1.5 text-xs hover:bg-error-container rounded-lg transition-colors" type="submit">
                <span class="material-symbols-outlined">logout</span>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
