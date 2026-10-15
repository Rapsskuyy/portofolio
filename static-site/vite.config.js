import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import { resolve } from 'node:path';

export default defineConfig({
    plugins: [tailwindcss()],
    build: {
        emptyOutDir: false,
        outDir: 'dist/build',
        rollupOptions: {
            input: resolve('src/public-styles.js'),
            output: {
                assetFileNames: 'assets/public.[ext]',
                entryFileNames: 'assets/public.js',
            },
        },
    },
});
