const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        primary: colors.indigo,
        secondary: colors.gray
      }
    },
    variants: {
      extend: {
        opacity: ['disabled'],
        scale: ['active']
      }
    }
  },

  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
