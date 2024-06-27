/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./public/**/*.{html,js}",
    "./app/View/*.php",
    "./app/View/**/*.php",
    "./app/View/**/**/*.php",
    // "./app/**/.{html,js,php}",
  ],
  theme: {
    extend: {
      fontFamily: {
        nunito: ['Nunito', 'sans-serif'],
        kanit: ['Kanit', 'sans-serif'],
        bree: ['Bree Serif', 'serif'],
        secularOne: ['Secular One', 'sans-serif'],
        poppins: ['Poppins', 'sans-serif'],
        rubik: ['Rubik', 'sans-serif']
      },
      colors : {
        "biru" : '#032FF2',
        "abu" : '#262433',
        "dark-white" : '#EEEFFF',
        "kuning" : '#FFCE00',
        "merah" : '#6366F1'
      },
      backgroundImage : {
        "hero-bg" : "url('http://localhost/images/bg/Roman.jpg')"
      }
    },
  },
  plugins: [
    // require("daisyui"),
    // require('@tailwindcss/forms')
  ],
}

