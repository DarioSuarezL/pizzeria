import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/stylespagoform.css',
                'resources/css/stylesguipagoform.css',
                'resources/js/PagoFacilCheckoutClient.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
                'resources/css/stylespagoform.css',
                'resources/css/stylesguipagoform.css',
                'resources/js/PagoFacilCheckoutClient.js',
            ],
            
        }),
    ],
});
