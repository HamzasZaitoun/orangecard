import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
            // add your js entry if you have one:
            // 'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
})
