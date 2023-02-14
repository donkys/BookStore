/** @type {import('tailwindcss').Config} */
module.exports = {
  mode: 'jit',
  purge: [
    './src/**/*.{html,js,php}',
  ],
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors:{
        'superred': '#F76A7D',
        'bsuperred': '#AF5C78',
        'supergray': '##3F4F59',
        'bsuperpink': '#F291AB',
        'superpink': '#F2D0D7',
        'redred': '#D61355',
      },
    },
  },
  variants:{
    display: ['group-focus'],
    opacity: ['group-focus'],
    inset: ['group-focus']
  },
  plugins: [],
}
