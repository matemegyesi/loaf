/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./index.html",
      "./src/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
      extend: {
        boxShadow: {
          'custom-card': '2px 2px 4px rgba(0, 0, 0, 0.3)',
        },
      },
    },
    plugins: [
        import('@tailwindcss/aspect-ratio'),
        import('@tailwindcss/container-queries'),
        import('@tailwindcss/forms'),
        import('@tailwindcss/typography')
    ],
  }