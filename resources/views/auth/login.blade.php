<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login – Sistem Autentikasi UB</title>
    <meta name="description" content="Halaman login Sistem Autentikasi Universitas Brawijaya">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #0f172a 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }

        .bg-glow {
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 50% 50%, rgba(59, 130, 246, 0.4) 0%, transparent 60%);
            pointer-events: none;
            z-index: 0;
        }

        .login-card {
            z-index: 10;
            border: 4px solid #f97316;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
        }

        /* Animasi shake untuk error */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%       { transform: translateX(-6px); }
            40%       { transform: translateX(6px); }
            60%       { transform: translateX(-4px); }
            80%       { transform: translateX(4px); }
        }
        .shake { animation: shake 0.4s ease; }
    </style>
</head>
<body class="relative overflow-hidden text-gray-800">

    <!-- Glow Effect Background -->
    <div class="bg-glow"></div>

    <!-- BEGIN: MainContent -->
    <main class="w-full max-w-lg px-4 flex flex-col items-center z-10">

        <!-- BEGIN: LogoHeader -->
        <header class="mb-10 text-center">
            <div class="flex items-center justify-center gap-4 text-white">
                <div class="w-16 h-16 bg-blue-900 border-2 border-yellow-500 rounded-full flex items-center justify-center flex-shrink-0 relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center text-yellow-500 text-[9px] font-bold text-center leading-tight p-1 z-20">
                        UNIVERSITAS<br/>BRAWIJAYA
                    </div>
                    <div class="w-8 h-10 border border-yellow-500 bg-blue-800 absolute z-10"></div>
                </div>
                <div class="text-left font-serif">
                    <div class="text-lg tracking-widest leading-none font-bold">UNIVERSITAS</div>
                    <div class="text-3xl font-bold tracking-wider leading-tight">BRAWIJAYA</div>
                </div>
            </div>
        </header>
        <!-- END: LogoHeader -->

        <!-- BEGIN: LoginForm -->
        <section class="bg-white rounded-lg w-full p-10 login-card" id="login-card">
            <h1 class="text-2xl font-semibold text-center mb-8 text-gray-800">Sistem Autentikasi UB</h1>

            {{-- Alert sukses (setelah logout dll.) --}}
            @if (session('success'))
                <div class="mb-5 flex items-center gap-2 bg-green-50 border border-green-300 text-green-700 text-sm rounded px-4 py-3" role="alert">
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- Alert error global --}}
            @if ($errors->any())
                <div class="mb-5 flex items-start gap-2 bg-red-50 border border-red-300 text-red-700 text-sm rounded px-4 py-3" role="alert" id="error-alert">
                    <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" id="login-form" class="space-y-6" novalidate>
                @csrf

                {{-- Username --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="username">
                        Username
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        required
                        autocomplete="username"
                        value="{{ old('username') }}"
                        class="block w-full border {{ $errors->has('username') ? 'border-red-400 bg-red-50' : 'border-gray-300' }} rounded-sm shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition"
                        placeholder="Masukkan username Anda"
                    />
                    @error('username')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="password">
                        Password
                    </label>
                    <div class="relative">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="current-password"
                            class="block w-full border {{ $errors->has('password') ? 'border-red-400 bg-red-50' : 'border-gray-300' }} rounded-sm shadow-sm py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm pr-10 transition"
                            placeholder="Masukkan password Anda"
                        />
                        {{-- Toggle show/hide password --}}
                        <button
                            type="button"
                            id="toggle-password"
                            aria-label="Tampilkan password"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 focus:outline-none transition-colors"
                        >
                            {{-- Eye icon (password tersembunyi) --}}
                            <svg id="icon-eye" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            {{-- Eye-off icon (password terlihat) --}}
                            <svg id="icon-eye-off" class="h-5 w-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center">
                    <input
                        id="remember"
                        name="remember"
                        type="checkbox"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    />
                    <label for="remember" class="ml-2 block text-sm text-gray-600 select-none cursor-pointer">
                        Ingat saya
                    </label>
                </div>

                {{-- Submit Button --}}
                <div class="pt-2">
                    <button
                        id="btn-login"
                        type="submit"
                        class="w-full flex items-center justify-center gap-2 py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#00488d] hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors disabled:opacity-60 disabled:cursor-not-allowed"
                    >
                        {{-- Spinner (muncul saat loading) --}}
                        <svg id="spinner" class="hidden animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"/>
                        </svg>
                        <span id="btn-text">Sign In</span>
                    </button>
                </div>
            </form>
        </section>
        <!-- END: LoginForm -->

        <p class="mt-6 text-xs text-blue-200 text-center">
            &copy; {{ date('Y') }} Universitas Brawijaya. Hak cipta dilindungi.
        </p>

    </main>
    <!-- END: MainContent -->

    <script>
        // ---------------------------------------------------------------
        // Toggle show / hide password
        // ---------------------------------------------------------------
        const toggleBtn  = document.getElementById('toggle-password');
        const pwdInput   = document.getElementById('password');
        const iconEye    = document.getElementById('icon-eye');
        const iconEyeOff = document.getElementById('icon-eye-off');

        toggleBtn.addEventListener('click', () => {
            const isHidden = pwdInput.type === 'password';
            pwdInput.type           = isHidden ? 'text' : 'password';
            iconEye.classList.toggle('hidden', isHidden);
            iconEyeOff.classList.toggle('hidden', !isHidden);
            toggleBtn.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
        });

        // ---------------------------------------------------------------
        // Loading state saat form submit
        // ---------------------------------------------------------------
        const form    = document.getElementById('login-form');
        const btnText = document.getElementById('btn-text');
        const spinner = document.getElementById('spinner');
        const btnLogin = document.getElementById('btn-login');

        form.addEventListener('submit', () => {
            btnLogin.disabled = true;
            spinner.classList.remove('hidden');
            btnText.textContent = 'Memproses...';
        });

        // ---------------------------------------------------------------
        // Animasi shake pada card jika ada error
        // ---------------------------------------------------------------
        const errorAlert = document.getElementById('error-alert');
        const loginCard  = document.getElementById('login-card');
        if (errorAlert) {
            loginCard.classList.add('shake');
            loginCard.addEventListener('animationend', () => {
                loginCard.classList.remove('shake');
            }, { once: true });
        }

        // ---------------------------------------------------------------
        // Auto-focus ke field pertama yang kosong / error
        // ---------------------------------------------------------------
        const usernameInput = document.getElementById('username');
        if (!usernameInput.value) {
            usernameInput.focus();
        } else {
            pwdInput.focus();
        }
    </script>

</body>
</html>
