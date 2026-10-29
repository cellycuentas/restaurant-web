// Selecciona el plato en el formulario cuando se pulsa "Elegir plato".
function seleccionarPlato(nombre) {
    const selector = document.getElementById("plato");
    if (selector) {
        selector.value = nombre;
        document.getElementById("pedido").scrollIntoView({ behavior: "smooth" });
    }
}

// Menú adaptable para pantallas pequeñas.
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

if (menuToggle && navLinks) {
    menuToggle.addEventListener("click", function () {
        navLinks.classList.toggle("activo");
    });
}
