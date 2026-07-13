module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'navy-blue': '#082B63',
        'dark-navy': '#041E46',
        'royal-blue': '#164A91',
        'primary-pink': '#F59AC2',
        'soft-pink': '#FCE4EF',
        'light-bg': '#F7F9FC',
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
