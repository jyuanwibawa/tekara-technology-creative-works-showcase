<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Admin Portal</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/dashboard/admin.css'])
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex antialiased overflow-x-hidden">
    @include('dashboard.admin.navigation')

    <main class="flex-1 min-w-0 md:ml-64 pt-16 flex flex-col min-h-screen overflow-x-hidden">
        @include('dashboard.admin.header')

        <div class="flex-1 p-5 sm:p-8 bg-slate-50 pb-12">
            <div class="max-w-3xl mx-auto w-full space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <nav class="flex items-center gap-2 text-xs text-slate-500" aria-label="Breadcrumb">
                        <a class="hover:text-slate-900 transition-colors flex items-center gap-1" href="{{ route('admin.dashboard') }}">
                            <span class="material-symbols-outlined text-base">home</span>Dashboard
                        </a>
                        <span class="text-slate-300">/</span><span>Akun</span>
                        <span class="text-slate-300">/</span><span class="font-semibold text-slate-900">Profil Saya</span>
                    </nav>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-orange-50 text-[#a04100] text-[11px] font-semibold tracking-wide">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#f37021]"></span>Admin Portal
                    </span>
                </div>

                @if (session('success'))
                    <div class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800" role="status">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="rounded-xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800" role="alert">
                        <p class="font-semibold">Profil belum berhasil diperbarui.</p>
                        <ul class="list-disc pl-5 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.profil.update') }}" method="POST" class="bg-white rounded-2xl border border-slate-200 p-5 sm:p-8 shadow-sm space-y-7">
                    @csrf
                    @method('PUT')

                    <section class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-100">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 rounded-full bg-orange-100 text-[#a04100] ring-2 ring-orange-100 flex items-center justify-center font-display text-xl font-bold" aria-hidden="true">
                                {{ mb_strtoupper(mb_substr($profile->nama_admin, 0, 1)) }}
                            </div>
                            <div>
                                <div class="flex flex-wrap items-center gap-2">
                                    <h1 class="font-display text-base sm:text-lg text-slate-900 font-bold tracking-tight">{{ $profile->nama_admin }}</h1>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[11px] font-semibold">Admin</span>
                                </div>
                                <p class="text-sm text-slate-500">{{ $profile->email }}</p>
                                <p class="text-xs text-slate-400 mt-0.5">Username: {{ $account->username }}</p>
                            </div>
                        </div>
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-emerald-50 text-emerald-700 text-xs font-semibold self-start sm:self-center">
                            <span class="material-symbols-outlined text-sm">check_circle</span>
                            {{ $profile->status_aktif === 'aktif' && $account->status_aktif === 'aktif' ? 'Aktif' : 'Nonaktif' }}
                        </span>
                    </section>

                    <section class="space-y-4">
                        <div>
                            <h2 class="font-display text-sm font-bold text-slate-900 uppercase tracking-wide">Informasi Profil</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Identitas akun dan unit kerja resmi.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label for="nama_admin" class="block text-xs font-semibold text-slate-600">Nama Lengkap</label>
                                <input id="nama_admin" name="nama_admin" class="w-full bg-slate-50 focus:bg-white rounded-lg px-3.5 py-2 text-sm text-slate-900 outline-none border border-slate-200 focus:ring-2 focus:ring-orange-200 focus:border-[#f37021]" type="text" maxlength="255" required value="{{ old('nama_admin', $profile->nama_admin) }}">
                            </div>
                            <div class="space-y-1">
                                <label for="id_admin" class="flex items-center justify-between text-xs font-semibold text-slate-600">
                                    ID Admin <span class="inline-flex items-center gap-0.5 text-[11px] font-normal"><span class="material-symbols-outlined text-xs">lock</span>Terkunci</span>
                                </label>
                                <input id="id_admin" class="w-full bg-slate-100 rounded-lg px-3.5 py-2 text-sm text-slate-500 border border-transparent" readonly type="text" value="{{ $profile->id_admin }}">
                            </div>
                            <div class="space-y-1">
                                <label for="email" class="block text-xs font-semibold text-slate-600">Email Institusi</label>
                                <input id="email" name="email" class="w-full bg-slate-50 focus:bg-white rounded-lg px-3.5 py-2 text-sm text-slate-900 outline-none border border-slate-200 focus:ring-2 focus:ring-orange-200 focus:border-[#f37021]" type="email" maxlength="255" required value="{{ old('email', $profile->email) }}">
                            </div>
                            <div class="space-y-1">
                                <label for="unit_kerja" class="flex items-center justify-between text-xs font-semibold text-slate-600">
                                    Unit Kerja <span class="inline-flex items-center gap-0.5 text-[11px] font-normal"><span class="material-symbols-outlined text-xs">lock</span>Terkunci</span>
                                </label>
                                <input id="unit_kerja" class="w-full bg-slate-100 rounded-lg px-3.5 py-2 text-sm text-slate-500 border border-transparent" readonly type="text" value="{{ $profile->unit_kerja ?: 'Belum diatur' }}">
                            </div>
                        </div>
                    </section>

                    <section class="space-y-4 border-t border-slate-100 pt-6">
                        <div>
                            <h2 class="font-display text-sm font-bold text-slate-900 uppercase tracking-wide">Ubah Kata Sandi</h2>
                            <p class="text-xs text-slate-500 mt-0.5">Kosongkan jika tidak ingin mengubah kata sandi. Kata sandi saat ini wajib diisi untuk perubahan.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="space-y-1 md:col-span-2">
                                <label for="current_password" class="block text-xs font-semibold text-slate-600">Kata Sandi Saat Ini</label>
                                <input id="current_password" name="current_password" class="w-full bg-slate-50 focus:bg-white rounded-lg px-3.5 py-2 text-sm text-slate-900 outline-none border border-slate-200 focus:ring-2 focus:ring-orange-200 focus:border-[#f37021]" autocomplete="current-password" placeholder="Wajib untuk mengubah kata sandi" type="password">
                            </div>
                            <div class="space-y-1">
                                <label for="new_password" class="block text-xs font-semibold text-slate-600">Kata Sandi Baru</label>
                                <input id="password" name="password" class="w-full bg-slate-50 focus:bg-white rounded-lg px-3.5 py-2 text-sm text-slate-900 outline-none border border-slate-200 focus:ring-2 focus:ring-orange-200 focus:border-[#f37021]" autocomplete="new-password" minlength="8" placeholder="Minimal 8 karakter" type="password">
                            </div>
                            <div class="space-y-1">
                                <label for="password_confirmation" class="block text-xs font-semibold text-slate-600">Konfirmasi Kata Sandi Baru</label>
                                <input id="password_confirmation" name="password_confirmation" class="w-full bg-slate-50 focus:bg-white rounded-lg px-3.5 py-2 text-sm text-slate-900 outline-none border border-slate-200 focus:ring-2 focus:ring-orange-200 focus:border-[#f37021]" autocomplete="new-password" minlength="8" placeholder="Ulangi kata sandi baru" type="password">
                            </div>
                        </div>
                    </section>

                    <div class="flex flex-wrap items-center justify-end gap-3 border-t border-slate-100 pt-6">
                        <a href="{{ route('admin.profil') }}" class="px-4 py-2 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 text-sm font-semibold transition-all">Batal</a>
                        <button class="px-5 py-2 rounded-lg bg-[#f37021] hover:bg-[#a04100] text-white text-sm font-semibold transition-all shadow-sm flex items-center gap-2" type="submit">
                            <span class="material-symbols-outlined text-[18px]">check</span>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @include('dashboard.admin.footer')
    </main>
</body>
</html>
