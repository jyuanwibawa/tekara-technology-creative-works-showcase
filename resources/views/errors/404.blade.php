<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-primary-fixed": "#001944",
                        "surface-container-highest": "#e5e2e1",
                        "on-secondary": "#ffffff",
                        "background": "#fcf9f8",
                        "surface-container-low": "#f6f3f2",
                        "tertiary-fixed-dim": "#c4c7ca",
                        "tertiary-container": "#717578",
                        "on-secondary-fixed-variant": "#454748",
                        "on-primary-container": "#fefcff",
                        "on-error-container": "#93000a",
                        "on-secondary-fixed": "#191c1d",
                        "surface-container-high": "#ebe7e7",
                        "secondary-fixed": "#e1e3e4",
                        "surface-tint": "#0059c7",
                        "on-tertiary-container": "#fbfdff",
                        "on-tertiary-fixed-variant": "#43474a",
                        "surface-dim": "#dcd9d9",
                        "secondary": "#5c5f60",
                        "outline": "#727786",
                        "outline-variant": "#c2c6d7",
                        "on-primary-fixed-variant": "#004299",
                        "surface-container-lowest": "#ffffff",
                        "primary-fixed": "#d9e2ff",
                        "on-surface-variant": "#424754",
                        "on-tertiary-fixed": "#181c1e",
                        "surface": "#fcf9f8",
                        "on-background": "#1c1b1b",
                        "secondary-fixed-dim": "#c5c7c8",
                        "secondary-container": "#e1e3e4",
                        "inverse-surface": "#313030",
                        "inverse-on-surface": "#f3f0ef",
                        "tertiary": "#585c5f",
                        "inverse-primary": "#afc6ff",
                        "on-surface": "#1c1b1b",
                        "error": "#ba1a1a",
                        "on-error": "#ffffff",
                        "error-container": "#ffdad6",
                        "surface-bright": "#fcf9f8",
                        "on-primary": "#ffffff",
                        "on-secondary-container": "#626566",
                        "primary-fixed-dim": "#afc6ff",
                        "primary": "#0057c3",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#f0edec",
                        "primary-container": "#0f6ef0",
                        "surface-variant": "#e5e2e1",
                        "tertiary-fixed": "#e0e3e6"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "stack-lg": "64px",
                        "stack-md": "32px",
                        "stack-sm": "16px",
                        "gutter": "24px",
                        "container-max": "1200px",
                        "unit": "8px",
                        "margin-mobile": "20px"
                    },
                    "fontFamily": {
                        "headline-lg-mobile": ["Manrope"],
                        "headline-lg": ["Manrope"],
                        "body-md": ["Inter"],
                        "display": ["Manrope"],
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "headline-lg-mobile": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "headline-lg": ["48px", { "lineHeight": "56px", "letterSpacing": "-0.02em", "fontWeight": "600" }],
                        "body-md": ["16px", { "lineHeight": "24px", "letterSpacing": "0", "fontWeight": "400" }],
                        "display": ["120px", { "lineHeight": "120px", "letterSpacing": "-0.04em", "fontWeight": "700" }],
                        "label-sm": ["14px", { "lineHeight": "20px", "letterSpacing": "0.02em", "fontWeight": "500" }],
                        "body-lg": ["18px", { "lineHeight": "28px", "letterSpacing": "0", "fontWeight": "400" }]
                    }
                }
            }
        }
    </script>
    <style>
        .ambient-shadow {
            box-shadow: 0 10px 40px rgba(0, 87, 195, 0.06);
        }
        .btn-hover-expand:hover {
            transform: scale(1.02);
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
    </style>
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
                <button class="font-label-sm text-label-sm px-6 py-3 rounded-full text-secondary hover:bg-surface-container hover:text-on-surface transition-all duration-300 flex items-center gap-2" onclick="window.history.back()">
                    <span class="material-symbols-outlined" style="font-size: 18px;">arrow_back</span>
                    Go Back
                </button>
                <a class="font-label-sm text-label-sm px-8 py-3 rounded-full bg-primary text-on-primary ambient-shadow btn-hover-expand transition-all duration-300 flex items-center gap-2" href="{{ url('/') }}">
                    <span class="material-symbols-outlined" data-weight="fill" style="font-size: 18px;">home</span>
                    Homepage
                </a>
            </div>
            
        </div>
    </main>

</body>
</html>
