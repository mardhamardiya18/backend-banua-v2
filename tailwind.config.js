import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography, require("daisyui")],

    daisyui: {
        themes: ["light", "dark"], // atau bisa pakai theme kustom
        darkTheme: "dark", // jika ingin mendukung dark mode
        logs: true, // opsional, bisa diaktifkan untuk debugging
        prefix: "", // kosong artinya tidak ada prefix
    },
};
