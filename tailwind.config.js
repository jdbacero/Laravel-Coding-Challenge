const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
  purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {
      backgroundColor: ['odd', 'even'],
    },
  },
  plugins: [],
}
