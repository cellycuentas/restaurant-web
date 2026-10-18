/* ========================================
   MENÚ PARA CELULAR
======================================== */

const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");

menuToggle.addEventListener("click", function () {

    navLinks.classList.toggle("active");

});


/* ========================================
   CERRAR MENÚ AL SELECCIONAR UNA OPCIÓN
======================================== */

const enlaces = document.querySelectorAll(".nav-links a");

enlaces.forEach(function (enlace) {

    enlace.addEventListener("click", function () {

        navLinks.classList.remove("active");

    });

});


/* ========================================
   PEDIDOS POR WHATSAPP
======================================== */

function pedirPlato(plato) {

    const numero = "59170000000";

    const mensaje =
        "Hola, quiero realizar un pedido de " + plato +
        " en Verde Vida.";

    const url =
        "https://wa.me/" +
        numero +
        "?text=" +
        encodeURIComponent(mensaje);

    window.open(url, "_blank");

}


/* ========================================
   UBICACIÓN
======================================== */

function mostrarUbicacion() {

    alert(
        "📍 Verde Vida\n\n" +
        "La Asunta, Bolivia\n\n" +
        "Próximamente agregaremos nuestro mapa."
    );

}


/* ========================================
   ANIMACIÓN AL HACER SCROLL
======================================== */

const elementos = document.querySelectorAll(
    ".food-card, .feature, .contact-card"
);

const observer = new IntersectionObserver(
    function (entradas) {

        entradas.forEach(function (entrada) {

            if (entrada.isIntersecting) {

                entrada.target.style.opacity = "1";
                entrada.target.style.transform = "translateY(0)";

            }

        });

    },
    {
        threshold: 0.15
    }
);


elementos.forEach(function (elemento) {

    elemento.style.opacity = "0";
    elemento.style.transform = "translateY(30px)";
    elemento.style.transition = "opacity 0.6s ease, transform 0.6s ease";

    observer.observe(elemento);

});