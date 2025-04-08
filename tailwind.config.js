import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                clementine: {
                  50: '#fdf7ef',
                  100: '#fbebd9',
                  200: '#f7d4b1',
                  300: '#f1b680',
                  400: '#eb8f4c',
                  500: '#e56b21',
                  600: '#d7581f',
                  700: '#b3421b',
                  800: '#8f361d',
                  900: '#732e1b',
                  950: '#3e150c',
                },
              },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};
