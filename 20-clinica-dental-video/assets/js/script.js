document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.querySelector("button.menu-toggle");
  const nav = document.querySelector("nav");

  menuToggle.addEventListener("click", () => {
    nav.classList.toggle("mobile-nav");

    const expanded = menuToggle.getAttribute("aria-expanded") === "true";
    menuToggle.setAttribute("aria-expanded", !expanded);

    let label = menuToggle.getAttribute("aria-label");
    label = (label === "Abrir menú") ? "Cerrar menú" : "Abrir menú";

    menuToggle.setAttribute("aria-label", label);

    menuToggle.classList.toggle("is-active");
  });
});
