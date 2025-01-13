/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './index.php',
    './public/**.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: "var(--primary-color)", // Marron
        primaryopacity: "rgba(110, 67, 60, 0.78)", // Marron- opacité
        secondary: "var(--secondary-color)", // Orange
        light: "var(--light-color)", // Clair
        darkprimary: "#541A25", // Foncé
        background: "var(--background-color)", // Fond
        graycustom: "#858494", // Gris
      },
      backgroundImage: {
        "fond-quadrille": "url('../images//Fond quadrillé.jpg')",
        "grid-pattern":
          "url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAIAAACRXR/mAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAAADqYAAAXb5JfxUYAAABnSURBVHja7M5RDYAwDEXRDgmvEocnlrQS2SwUFST9uEfBGWs9c97nbGtDcquqiKhOImLs/UpuzVzWEi1atGjRokWLFi1atGjRokWLFi1atGjRokWLFi1af7Ukz8xWp8z8AAAA//8DAJ4LoEAAlL1nAAAAAElFTkSuQmCC')",
        "gradient-clair-orange":
          "linear-gradient(to bottom, var(--light-color) 68%, var(--secondary-color) 100%)",
      },
      fontFamily: {
        changa: ["Changa One", "sans-serif"],
        rubik: ["Rubik", "sans-serif"],
      },
      boxShadow: {
        "inner-lg": "inset 0 4px 8px rgba(0, 0, 0, 0.2)",
        "inner-box": "inset 0 15px 10px rgba(0, 0, 0, 0.2)",
      },
      // Ajouter le text-shadow dans les extensions de Tailwind
      textShadow: {
        white: "2px 2px 4px rgba(255, 255, 255, 0.7)", // Ombre blanche autour du texte
      },
      animation: {
        float: "float 3s ease-in-out infinite",
        float2: "float 3s ease-in-out infinite 1.5s", // Pour décaler l'animation
        "bg-scroll": "bg-scrolling-reverse 1.92s linear infinite",
      },
      keyframes: {
        float: {
          "0%, 100%": { transform: "translateY(0px) translateX(0px)" },
          "50%": { transform: "translateY(-8px) translateX(4px)" },
        },
        "bg-scrolling-reverse": {
          "100%": { backgroundPosition: "50px 50px" },
        },
      },
    },
  },
  plugins: [],
}