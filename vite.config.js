import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/client.js', 'resources/css/client.css'],
            refresh: true,
        }),
    ],
    build: {
        manifest: true, // Cette option est nécessaire pour générer le fichier manifeste
      },
});
