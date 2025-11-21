import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/navigation-bar.css',
                'resources/css/home.css',
                'resources/css/login.css',
                'resources/js/app.js',
                'resources/js/statistics.js',
                'resources/css/statistics.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
