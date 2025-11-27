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
                'resources/js/updateBatchStatus.js',
                'resources/js/updateQueueStatus.js',
                'resources/js/production.js',
                'resources/css/production.css',
                'resources/js/calibration.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
