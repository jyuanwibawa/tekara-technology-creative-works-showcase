import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                // Halaman Login
                'resources/css/auth/login.css',
                'resources/js/auth/login.js',
                // Coming Soon
                'resources/css/coming-soon.css',
                'resources/js/coming-soon.js',
                // Error 404
                'resources/css/404.css',
                'resources/js/404.js',
                // Dashboard Admin
                'resources/css/dashboard/admin.css',
                'resources/js/dashboard/admin.js',
                'resources/js/dashboard/kelas.js',
                'resources/js/dashboard/koordinator.js',
                'resources/js/dashboard/mitra-industri.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
