document.addEventListener("DOMContentLoaded", function() {
    const button = document.querySelector("button");
    
    function updateName() {
        let nombre = prompt("¿Cómo te llamas?");
        button.textContent = button.textContent + ": " + nombre;
    }
    button.addEventListener("click", updateName);
});