<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Coming Soon - Tekara Technology</title>

    <!-- CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Manrope:wght@600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Manrope:wght@100..900&display=swap" rel="stylesheet">

    <!-- Vite CSS & JS -->
    @vite(['resources/css/coming-soon.css', 'resources/js/coming-soon.js'])
</head>
<body class="bg-surface text-on-surface font-body-md flex flex-col min-h-screen">
    
    <!-- TopAppBar -->
    <header class="bg-surface dark:bg-inverse-surface w-full z-50">
    </header>
    
    <!-- Main Content Canvas -->
    <main class="flex-grow flex flex-col items-center justify-center px-6 py-stack-lg max-w-container-max mx-auto text-center w-full">
        <div class="max-w-3xl flex flex-col items-center gap-stack-md">
            <div class="flex flex-col items-center gap-stack-sm">
                <h1 class="font-headline-lg-mobile text-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-on-surface">
                    Sesuatu yang Luar Biasa Akan Segera Hadir
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl">
                    Kami sedang merancang pengalaman baru yang akan mengubah cara Anda bekerja. Bersiaplah untuk inovasi berikutnya dari Tekara Technology.
                </p>
            </div>
            
            <!-- Spacer -->
            <div class="my-stack-md"></div>
            
            <!-- Subscription Form -->
            <form class="w-full max-w-md flex flex-col sm:flex-row gap-4 items-center mt-4">
                <div class="relative w-full flex-grow">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-secondary pointer-events-none" data-icon="mail">mail</span>
                    <input class="w-full pl-12 pr-4 py-3 bg-surface-container-lowest border border-outline-variant rounded-lg text-on-surface font-body-md focus:ring-2 focus:ring-primary focus:border-primary transition-all outline-none" placeholder="Enter your email" required="" type="email">
                </div>
                <button class="w-full sm:w-auto px-6 py-3 bg-primary text-on-primary font-label-sm text-label-sm rounded-lg hover:bg-on-primary-fixed-variant transition-colors whitespace-nowrap shadow-sm hover:shadow-md" type="submit">
                    Notify Me
                </button>
            </form>
        </div>
    </main>
    
    <!-- Footer -->
    <footer class="bg-surface dark:bg-inverse-surface w-full mt-auto border-t border-surface-variant">
    </footer>

    <!-- Page Scripts loaded via Vite in <head> -->
</body>
</html>
