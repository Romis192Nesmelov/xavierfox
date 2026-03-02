import { wayfinder } from '@laravel/vite-plugin-wayfinder';
// import tailwindcss from '@tailwindcss/vite';
// import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/jquery-3.4.1.min.js',
                'resources/js/main.js',
                'resources/js/article.js',
                'resources/css/style.css',
            ],
            // ssr: 'resources/js/ssr.ts',
            refresh: true,
        }),
        // tailwindcss(),
        // vue({
        //     template: {
        //         transformAssetUrls: {
        //             base: null,
        //             includeAbsolute: false,
        //         },
        //     },
        // }),
        // wayfinder({
        //     formVariants: true,
        // }),
    ],
});
