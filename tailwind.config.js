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
                primary: {
                    100: '#FFEB99',
                    200: '#FFDA66',
                    300: '#FFCC33',
                    400: '#FFBE41',  // Your custom primary color
                    500: '#FFAA00',  // Darker shade of your primary color
                },
                secondary: '#121C45',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
