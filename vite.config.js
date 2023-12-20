import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/dark.css'
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
                'resources/css/dark.css'
            ],
            
        }),
    ],
});
