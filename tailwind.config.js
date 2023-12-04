/** @type {import('tailwindcss').Config} */
export default {
  content: ["index.php"],
  theme: {
    extend: {
      fontFamily: {
        "font-text": ["Quicksand", "Mono"],
        "font-title": ["Raleway", "sans-serif"],
      },

      colors: {
        primary: "#111111",
        secondary: "#FF3E00",
        tertiary: "#1e1e1e",

        test: "rgba(255,62,0,0.15)",
      },

      boxShadow: {
        custom: "rgba(255,62,0) 1.95px 1.95px 1.95px",
        "custom-2": "rgba(255,62,0) 0px 0px 0px 2px",
      },
    },
  },
  plugins: [],
};
