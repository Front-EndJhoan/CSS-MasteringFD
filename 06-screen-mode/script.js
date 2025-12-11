// Referencias
const toggle = document.getElementById('theme-toggle');
const root = document.documentElement;

// Colores de cada tema
const temaClaro = {
  '--color-fondo': '#f7f7f7',
  '--color-texto': '#222',
  '--color-principal': '0066ff',
  '--color-secundario': '#ffffff'
};

const temaOscuro = {
  '--color-fondo': '#121212',
  '--color-texto': '#eaeaea',
  '--color-principal': '#4da3ff',
  '--color-secundario': '#1e1e1e'
};

// Cambiar el tema al marcar el switch
toggle.addEventListener('change', (e) => {
  const tema = e.target.checked ? temaOscuro : temaClaro;
  for (const prop in tema) {
    root.style.setProperty(prop, tema[prop]);
  }
});

// Ejemplo: botón para cambiar el color principal de forma dinámica
const btn = document.querySelector('.action-btn');
btn.addEventListener('click', () => {
  const randomColor = `hsl(${Math.floor(Math.random() * 360)}, 80%, 50%)`;
  root.style.setProperty('--color-principal', randomColor);
});

