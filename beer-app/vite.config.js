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
                'resources/js/app.js',
                'resources/js/production.js',
                'resources/css/production.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
