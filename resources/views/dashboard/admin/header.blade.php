<header class="flex justify-between items-center w-full px-5 sm:px-8 h-16 bg-white border-b border-slate-200/80 sticky top-0 z-30">
    <div class="md:hidden flex items-center gap-3">
        <div class="h-9 w-9 rounded-full bg-[#173b72] border border-[#f37021] text-white flex items-center justify-center text-xs font-extrabold">UB</div>
        <span class="font-display text-lg text-slate-900 font-bold">Admin Portal</span>
    </div>

    <nav class="hidden md:flex items-center gap-8 h-full" aria-label="Navigasi atas">
        <a class="text-sm {{ request()->routeIs('admin.dashboard') ? 'text-slate-900 border-b-2 border-[#f37021] font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} h-full flex items-center transition-colors" href="{{ route('admin.dashboard') }}" @if (request()->routeIs('admin.dashboard')) aria-current="page" @endif>Dashboard</a>
        <a class="text-sm {{ request()->routeIs('admin.kelas-capstone') ? 'text-slate-900 border-b-2 border-[#f37021] font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} h-full flex items-center transition-colors" href="{{ route('admin.kelas-capstone') }}" @if (request()->routeIs('admin.kelas-capstone')) aria-current="page" @endif>Kelas Capstone</a>
        <a class="text-sm {{ request()->routeIs('admin.koordinator*') ? 'text-slate-900 border-b-2 border-[#f37021] font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} h-full flex items-center transition-colors" href="{{ route('admin.koordinator') }}" @if (request()->routeIs('admin.koordinator*')) aria-current="page" @endif>Koordinator</a>
        <a class="text-sm {{ request()->routeIs('admin.mitra-industri*') ? 'text-slate-900 border-b-2 border-[#f37021] font-bold' : 'text-slate-500 hover:text-slate-900 font-medium' }} h-full flex items-center transition-colors" href="{{ route('admin.mitra-industri') }}" @if (request()->routeIs('admin.mitra-industri*')) aria-current="page" @endif>Mitra Industri</a>
        <a class="text-sm text-slate-500 hover:text-slate-900 transition-colors font-medium" href="{{ route('coming-soon') }}">Laporan</a>
    </nav>

    <div class="flex items-center gap-3 ml-auto">
        <label class="relative hidden sm:block">
            <span class="material-symbols-outlined text-[18px] text-slate-400 absolute left-2.5 top-2">search</span>
            <input class="w-60 bg-slate-50 border border-slate-200 rounded-lg pl-9 pr-4 py-1.5 text-xs focus:ring-2 focus:ring-[#f37021] focus:border-transparent outline-none transition-all placeholder:text-slate-400" placeholder="Cari..." type="search" aria-label="Cari">
        </label>
        <button class="relative text-slate-500 hover:text-slate-800 transition-colors p-2 rounded-full hover:bg-slate-100" type="button" aria-label="Notifikasi">
            <span class="material-symbols-outlined text-[22px]">notifications</span>
            <span class="absolute top-2 right-2 w-2 h-2 rounded-full bg-[#f37021] ring-2 ring-white"></span>
        </button>
        <button class="text-slate-500 hover:text-slate-800 transition-colors p-2 rounded-full hover:bg-slate-100" type="button" aria-label="Bantuan">
            <span class="material-symbols-outlined text-[22px]">help</span>
        </button>
        <div class="h-9 w-9 rounded-full bg-slate-100 border border-slate-300 flex items-center justify-center text-slate-700 font-bold ring-2 ring-slate-100" aria-label="Profil administrator">
            {{ strtoupper(substr(auth('akun')->user()->username, 0, 1)) }}
        </div>
    </div>
</header>
