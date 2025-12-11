document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.querySelector(".menu-toggle");
  const body = document.body;   
  const nav = document.querySelector(".nav-ul"); 

  menuToggle.addEventListener("click", () => {
    body.classList.toggle("mobile"); 
    const expanded = menuToggle.getAttribute("aria-expanded") === "true";
    menuToggle.setAttribute("aria-expanded", !expanded);
    menuToggle.classList.toggle("is-active");
  });
});
