/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                blue: {
                    'blue_gradient_first' : '#2E3192',
                    'blue_gradient_end' :'#1BFFFF'
                }
            }
        },
    },
    plugins: [],
}
