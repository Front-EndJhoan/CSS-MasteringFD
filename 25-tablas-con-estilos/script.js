document.addEventListener("DOMContentLoaded", () => {
  const radios = document.querySelectorAll('input[name="plan"]');

  radios.forEach(radio => {
    radio.addEventListener("change", () => {
      const plan = radio.id;

      // Resetear todos los td
      document.querySelectorAll("[data-plan]").forEach(td => {
        td.style.color = "";
      });

      // Resetear iconos
      document.querySelectorAll('td[title="Yes"]').forEach(td => {
        td.style.backgroundImage = 'url(check-solid-full.svg)';
      });

      // Pintar el plan seleccionado
      document.querySelectorAll(`[data-plan="${plan}"]`).forEach(td => {
        td.style.color = "#e50914";

        // Iconos solo para los Yes del plan activo
        if (td.closest('td[title="Yes"]')) {
          td.closest('td[title="Yes"]').style.backgroundImage =
            'url(check-solid-full-active.svg)';
        }
      });
    });
  });
});
s