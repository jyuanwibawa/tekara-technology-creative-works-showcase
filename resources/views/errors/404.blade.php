<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>404 - Page Not Found</title>
    
    <!-- CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <!-- Vite CSS & JS -->
    @vite(['resources/css/404.css', 'resources/js/404.js'])
</head>
<body class="bg-background h-screen w-screen overflow-hidden flex items-center justify-center font-body-md text-on-surface antialiased">

    <!-- Main Content -->
    <main class="w-full max-w-container-max mx-auto px-margin-mobile md:px-gutter text-center flex flex-col items-center justify-center">
        <div class="max-w-2xl mx-auto flex flex-col items-center gap-stack-lg">
            
            <!-- Hero Illustration -->
            <div class="relative w-64 h-64 md:w-80 md:h-80 float-animation">
                <!-- Using ambient subtle glow behind character -->
                <div class="absolute inset-0 bg-primary-fixed rounded-full blur-3xl opacity-20"></div>
            </div>
            
            <!-- Typography & Message -->
            <div class="flex flex-col items-center gap-unit">
                <h1 class="font-display text-display text-primary tracking-tight font-light opacity-80 leading-none">404</h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-md mt-4">
                    Oops! The page you are looking for has vanished into thin air.
                </p>
            </div>
            
            <!-- Call to Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-stack-md">
                <button id="btn-back" class="font-label-sm text-label-sm px-6 py-3 rounded-full text-secondary hover:bg-surface-container hover:text-on-surface transition-all duration-300 flex items-center gap-2">
                    <span class="material-symbols-outlined icon-18">arrow_back</span>
                    Go Back
                </button>
                <a class="font-label-sm text-label-sm px-8 py-3 rounded-full bg-primary text-on-primary ambient-shadow btn-hover-expand transition-all duration-300 flex items-center gap-2" href="{{ url('/') }}">
                    <span class="material-symbols-outlined icon-18" data-weight="fill">home</span>
                    Homepage
                </a>
            </div>
            
        </div>
    </main>

    <!-- Page Scripts loaded via Vite in <head> -->
</body>
</html>
