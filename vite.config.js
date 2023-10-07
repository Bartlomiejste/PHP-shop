import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/css/cart.css",
                "resources/js/app.js",
                "public/js/delete.js",
                "public/js/welcome.js",
            ],
            refresh: true,
        }),
    ],
});
