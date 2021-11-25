module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
      container: {
          center: true,
      },
    extend: {
        gridTemplateColumns:{
            '16': 'repeat(16, minmax(0, 1fr))',
            'footer': '200px minmax(900px, 1fr) 100px',
        },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
