<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tekara Technology Creative Works Showcase</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#F8F9FA] text-[#1A1A1A] font-sans antialiased min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo / Brand -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-600/20">
                        T
                    </div>
                    <span class="font-bold text-xl tracking-tight text-gray-900">Tekara Technology</span>
                </div>
                
                <!-- Simple Navigation (Hidden on mobile for now) -->
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="text-indigo-600 font-semibold border-b-2 border-indigo-600 px-1 py-2">Home</a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600 font-medium transition-colors px-1 py-2">Portfolio</a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600 font-medium transition-colors px-1 py-2">About</a>
                    <a href="#" class="text-gray-500 hover:text-indigo-600 font-medium transition-colors px-1 py-2">Contact</a>
                </nav>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="text-gray-500 hover:text-gray-700 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100 mt-auto py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center text-center">
            <p class="text-sm text-gray-500 font-medium">
                Copyright &copy; 2026 | Universitas Brawijaya
            </p>
        </div>
    </footer>

</body>
</html>
