import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";
import inertia from "./resources/js/inertia-layout.ts";
import path from "path";

export default defineConfig({
    plugins: [
        inertia(),
        vue({
            include: [/\.vue$/, /\.md$/],
        }),
        laravel({
            input: [


                './resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/',
            'ziggy': path.resolve('vendor/tightenco/ziggy/dist/vue.es.js'),
        },
    },
});
