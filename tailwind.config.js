import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Quicksand', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        themes: [
            {
                lief: {
                    "primary": "#fac969",
                    "primary-content": "#1a1339",
                    "secondary": "#60c2e4",
                    "secondary-content": "#030e12",
                    "accent": "#FD8E73",
                    "accent-content": "#160705",
                    "neutral": "#FFFFFF",
                    "neutral-content": "#e5e7eb",
                    // "base-100": "#ffffff",
                    // "base-200": "#d9ba79",
                    // "base-300": "#ba9e66",
                    "base-content": "#191338",
                    "info": "#6896E4",
                    "info-content": "#040812",
                    "success": "#00a96e",
                    "success-content": "#000a04",
                    "warning": "#FBB784",
                    "warning-content": "#150c06",
                    "error": "#FE8579",
                    "error-content": "#160605",
                },
            },
        ],
    },
    plugins: [forms, typography, require('daisyui')],
};
