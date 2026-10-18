<aside class="hidden md:flex fixed left-0 top-0 h-full w-64 bg-white border-r border-slate-200 flex-col py-6 z-40">
    <div class="px-6 mb-8 flex flex-col gap-1.5">
        <div class="h-14 w-14 rounded-full bg-[#173b72] border-2 border-[#f37021] text-white flex items-center justify-center text-sm font-extrabold tracking-wide mb-1">UB</div>
        <h1 class="font-display text-2xl text-slate-900 font-extrabold tracking-tight leading-tight">Admin Portal</h1>
        <p class="text-xs font-bold text-[#f37021] uppercase tracking-wider">University Capstone</p>
    </div>

    <nav class="flex-1 px-4 flex flex-col gap-1.5 overflow-y-auto" aria-label="Navigasi admin">
        <a class="relative flex items-center gap-3 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} rounded-xl px-3.5 py-2.5 font-semibold transition-all group" href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>
            @if (request()->routeIs('admin.dashboard'))
                <span class="absolute left-0 top-1.5 bottom-1.5 w-1.5 bg-[#f37021] rounded-r-full"></span>
            @endif
            <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.dashboard') ? 'text-[#f37021]' : 'text-slate-400 group-hover:text-slate-600' }}" @if (request()->routeIs('admin.dashboard')) style="font-variation-settings: 'FILL' 1;" @endif>dashboard</span>
            <span class="text-sm font-medium">Dashboard</span>
        </a>

        <div class="pt-4 pb-1 px-2">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Data Master</span>
        </div>
        <div class="flex flex-col gap-1">
            <a class="flex items-center gap-3 {{ request()->routeIs('admin.kelas-capstone') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} rounded-xl px-3.5 py-2.5 transition-all" href="{{ route('admin.kelas-capstone') }}" @if (request()->routeIs('admin.kelas-capstone')) aria-current="page" @endif>
                <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.kelas-capstone') ? 'text-[#f37021]' : 'text-slate-400' }}">school</span>
                <span class="text-sm font-medium">Kelas Capstone</span>
            </a>
            <a class="relative flex items-center gap-3 {{ request()->routeIs('admin.koordinator*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} rounded-xl px-3.5 py-2.5 transition-all group" href="{{ route('admin.koordinator') }}" @if (request()->routeIs('admin.koordinator*')) aria-current="page" @endif>
                @if (request()->routeIs('admin.koordinator*'))
                    <span class="absolute left-0 top-1.5 bottom-1.5 w-1.5 bg-[#f37021] rounded-r-full"></span>
                @endif
                <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.koordinator*') ? 'text-[#f37021]' : 'text-slate-400 group-hover:text-slate-600' }}" @if (request()->routeIs('admin.koordinator*')) style="font-variation-settings: 'FILL' 1;" @endif>how_to_reg</span>
                <span class="text-sm font-medium">Dosen Koordinator</span>
            </a>
            <a class="relative flex items-center gap-3 {{ request()->routeIs('admin.mitra-industri*') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} rounded-xl px-3.5 py-2.5 transition-all group" href="{{ route('admin.mitra-industri') }}" @if (request()->routeIs('admin.mitra-industri*')) aria-current="page" @endif>
                @if (request()->routeIs('admin.mitra-industri*'))
                    <span class="absolute left-0 top-1.5 bottom-1.5 w-1.5 bg-[#f37021] rounded-r-full"></span>
                @endif
                <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.mitra-industri*') ? 'text-[#f37021]' : 'text-slate-400 group-hover:text-slate-600' }}">domain</span>
                <span class="text-sm font-medium">Mitra Industri</span>
            </a>
        </div>

        <div class="pt-4 pb-1 px-2">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Tim &amp; Presentasi</span>
        </div>
        <div class="flex flex-col gap-1">
            <a class="relative flex items-center gap-3 {{ request()->routeIs('admin.keanggotaan-tim') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} rounded-xl px-3.5 py-2.5 transition-all group" href="{{ route('admin.keanggotaan-tim') }}" @if (request()->routeIs('admin.keanggotaan-tim')) aria-current="page" @endif>
                @if (request()->routeIs('admin.keanggotaan-tim'))
                    <span class="absolute left-0 top-1.5 bottom-1.5 w-1.5 bg-[#f37021] rounded-r-full"></span>
                @endif
                <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.keanggotaan-tim') ? 'text-[#f37021]' : 'text-slate-400 group-hover:text-slate-600' }}" @if (request()->routeIs('admin.keanggotaan-tim')) style="font-variation-settings: 'FILL' 1;" @endif>groups</span>
                <span class="text-sm font-medium">Keanggotaan Tim</span>
            </a>
            <a class="relative flex items-center gap-3 {{ request()->routeIs('admin.jadwal-presentasi') ? 'bg-slate-900 text-white shadow-sm' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }} rounded-xl px-3.5 py-2.5 transition-all group" href="{{ route('admin.jadwal-presentasi') }}" @if (request()->routeIs('admin.jadwal-presentasi')) aria-current="page" @endif>
                @if (request()->routeIs('admin.jadwal-presentasi'))
                    <span class="absolute left-0 top-1.5 bottom-1.5 w-1.5 bg-[#f37021] rounded-r-full"></span>
                @endif
                <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.jadwal-presentasi') ? 'text-[#f37021]' : 'text-slate-400 group-hover:text-slate-600' }}" @if (request()->routeIs('admin.jadwal-presentasi')) style="font-variation-settings: 'FILL' 1;" @endif>co_present</span>
                <span class="text-sm font-medium">Jadwal Presentasi</span>
            </a>
        </div>

        <div class="pt-4 pb-1 px-2">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Kurikulum OBE</span>
        </div>
        <a class="flex items-center gap-3 text-slate-600 px-3.5 py-2.5 hover:bg-slate-50 hover:text-slate-900 transition-all rounded-xl" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined text-[20px] text-slate-400">verified</span>
            <span class="text-sm font-medium">CPL &amp; CPMK</span>
        </a>

        <div class="pt-4 pb-1 px-2">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Laporan</span>
        </div>
        <a class="flex items-center gap-3 text-slate-600 px-3.5 py-2.5 hover:bg-slate-50 hover:text-slate-900 transition-all rounded-xl" href="{{ route('coming-soon') }}">
            <span class="material-symbols-outlined text-[20px] text-slate-400">query_stats</span>
            <span class="text-sm font-medium">Laporan Monev OBE</span>
        </a>
    </nav>

    <div class="px-4 mt-auto flex flex-col gap-2 pt-4 border-t border-slate-100">
        <a class="flex items-center gap-3 {{ request()->routeIs('admin.profil*') ? 'bg-orange-50 text-[#a04100] font-semibold' : 'text-slate-600 hover:bg-slate-50' }} px-4 py-2 rounded-xl transition-all" href="{{ route('admin.profil') }}" @if (request()->routeIs('admin.profil*')) aria-current="page" @endif>
            <span class="material-symbols-outlined text-[20px] {{ request()->routeIs('admin.profil*') ? 'text-[#a04100]' : 'text-slate-500' }}">account_circle</span>
            <span class="text-sm font-medium">Profil Saya</span>
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="w-full flex items-center gap-3 text-rose-600 px-4 py-2 hover:bg-rose-50 rounded-xl transition-all" type="submit">
                <span class="material-symbols-outlined text-[20px]">logout</span>
                <span class="text-sm font-medium">Logout (Keluar)</span>
            </button>
        </form>
    </div>
</aside>
