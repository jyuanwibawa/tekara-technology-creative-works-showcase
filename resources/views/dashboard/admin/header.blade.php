<header class="flex justify-between items-center w-full px-6 h-16 bg-white shadow-sm sticky top-0 z-30">
    <div class="md:hidden flex items-center gap-3">
        <div class="h-10 w-10 rounded-full bg-primary text-white flex items-center justify-center font-bold">UB</div>
        <span class="font-display text-xl text-primary font-bold">Capstone Admin</span>
    </div>

    <nav class="hidden md:flex items-center gap-6" aria-label="Navigasi atas">
        <a class="text-primary border-b-2 border-primary font-bold pb-1" href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a class="text-secondary hover:text-primary transition-colors" href="{{ route('coming-soon') }}">Reports</a>
        <a class="text-secondary hover:text-primary transition-colors" href="{{ route('coming-soon') }}">Settings</a>
    </nav>

    <div class="flex items-center gap-3 ml-auto">
        <button class="text-on-surface-variant hover:text-primary p-2 rounded-full hover:bg-surface-container" type="button" aria-label="Notifikasi">
            <span class="material-symbols-outlined">notifications</span>
        </button>
        <button class="text-on-surface-variant hover:text-primary p-2 rounded-full hover:bg-surface-container" type="button" aria-label="Bantuan">
            <span class="material-symbols-outlined">help</span>
        </button>
        <div class="h-10 w-10 rounded-full bg-secondary-container border border-outline-variant flex items-center justify-center text-secondary font-bold" aria-label="Profil administrator">
            {{ strtoupper(substr(auth('akun')->user()->username, 0, 1)) }}
        </div>
    </div>
</header>
