/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'brand-orange': '#FF6600',
        'brand-black': '#000000',
        'brand-light': '#E8E8E8',
        'brand-gray': '#555555',
      },
    },
  },
  plugins: [],
}