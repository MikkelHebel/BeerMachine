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
                'resources/css/admin.css',
                'resources/js/app.js',
                'resources/js/statistics.js',
                'resources/css/statistics.css',
                'resources/js/updateBatchStatus.js',
                'resources/js/updateQueueStatus.js',

                'resources/js/production.js',
                'resources/css/production.css',
                'resources/js/calibration.js',
                'resources/css/notification-bar.css',
                'resources/js/notification-bar.js',

                'resources/css/status.css',
                'resources/js/updateInventoryAmount.js',
                'resources/js/updateMachineStatus.js',
                'resources/js/updateBrewTotal.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
