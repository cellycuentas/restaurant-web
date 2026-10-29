<?php
// Menú del restaurante Aluci. Este arreglo se recorre con foreach.
$platos = [
    [
        "nombre" => "Ensalada Verde",
        "precio" => 25,
        "categoria" => "Saludable",
        "imagen" => "https://images.unsplash.com/photo-1540420773420-3366772f4999",
        "descripcion" => "Lechuga, tomate, zanahoria, aguacate y aderezo natural."
    ],
    [
        "nombre" => "Bowl Vegano",
        "precio" => 30,
        "categoria" => "Favorito",
        "imagen" => "https://images.unsplash.com/photo-1512621776951-a57141f2eefd",
        "descripcion" => "Arroz integral, garbanzos, vegetales frescos y aguacate."
    ],
    [
        "nombre" => "Plato Natural",
        "precio" => 28,
        "categoria" => "Natural",
        "imagen" => "https://images.unsplash.com/photo-1547592180-85f173990554",
        "descripcion" => "Quinoa, verduras salteadas y proteína vegetal."
    ],
    [
        "nombre" => "Veggie Burger",
        "precio" => 32,
        "categoria" => "Especial",
        "imagen" => "https://images.unsplash.com/photo-1529042410759-befb1204b468",
        "descripcion" => "Hamburguesa vegetal, lechuga, tomate y salsa de la casa."
    ],
    [
        "nombre" => "Sopa de Verduras",
        "precio" => 20,
        "categoria" => "Casero",
        "imagen" => "https://images.unsplash.com/photo-1547592180-85f173990554",
        "descripcion" => "Sopa caliente preparada con verduras frescas y especias naturales."
    ],
    [
        "nombre" => "Postre Natural",
        "precio" => 18,
        "categoria" => "Postre",
        "imagen" => "https://images.unsplash.com/photo-1498837167922-ddd27525d352",
        "descripcion" => "Delicioso postre preparado con ingredientes naturales."
    ]
];
$estado = $_GET["estado"] ?? "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluci | Restaurante Vegetariano</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
<header class="header">
    <nav class="navbar">
        <a href="#inicio" class="logo">
            <i class="fa-solid fa-leaf"></i> Aluci
        </a>
        <button class="menu-toggle" id="menuToggle" type="button" aria-label="Abrir menú">
            <i class="fa-solid fa-bars"></i>
        </button>
        <ul class="nav-links" id="navLinks">
            <li><a href="#inicio">Inicio</a></li>
            <li><a href="#menu">Menú</a></li>
            <li><a href="#nosotros">Nosotros</a></li>
            <li><a href="#contacto">Contacto</a></li>
            <li><a href="#pedido">Realizar pedido</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="hero" id="inicio">
        <div class="hero-content">
            <p class="hero-subtitle">RESTAURANTE VEGETARIANO</p>
            <h1>Comer saludable <span>también puede ser delicioso.</span></h1>
            <p class="hero-description">Descubre sabores naturales, frescos y deliciosos preparados con ingredientes de origen vegetal.</p>
            <div class="hero-buttons">
                <a href="#menu" class="btn btn-primary">Ver nuestro menú</a>
                <a href="https://wa.me/59173612520" target="_blank" rel="noopener" class="btn btn-whatsapp">
                    <i class="fa-brands fa-whatsapp"></i> Pedir por WhatsApp
                </a>
            </div>
        </div>
    </section>

    <?php if ($estado === "ok"): ?>
        <div class="mensaje-pedido mensaje-exito">¡Gracias! Tu pedido se registró correctamente en Aluci.</div>
    <?php elseif ($estado === "error"): ?>
        <div class="mensaje-pedido mensaje-error">No se pudo registrar el pedido. Revisa los datos e inténtalo nuevamente.</div>
    <?php endif; ?>

    <section class="features">
        <div class="feature">
            <i class="fa-solid fa-leaf"></i>
            <h3>100% Vegetal</h3>
            <p>Preparaciones elaboradas con ingredientes de origen vegetal.</p>
        </div>
        <div class="feature">
            <i class="fa-solid fa-seedling"></i>
            <h3>Ingredientes frescos</h3>
            <p>Seleccionamos ingredientes frescos para cada preparación.</p>
        </div>
        <div class="feature">
            <i class="fa-solid fa-heart"></i>
            <h3>Hecho con amor</h3>
            <p>Cada plato es preparado pensando en nuestros clientes.</p>
        </div>
    </section>

    <section class="menu-section" id="menu">
        <div class="section-title">
            <p>DESCUBRE NUESTROS SABORES</p>
            <h2>Nuestro Menú</h2>
            <span>Una selección de nuestros platos favoritos.</span>
        </div>
        <div class="menu-grid">
            <?php foreach ($platos as $plato): ?>
                <article class="food-card">
                    <div class="food-image">
                        <img src="<?= htmlspecialchars($plato["imagen"], ENT_QUOTES, "UTF-8") ?>" alt="<?= htmlspecialchars($plato["nombre"], ENT_QUOTES, "UTF-8") ?>">
                        <span class="food-category"><?= htmlspecialchars($plato["categoria"], ENT_QUOTES, "UTF-8") ?></span>
                    </div>
                    <div class="food-info">
                        <div class="food-title">
                            <h3><?= htmlspecialchars($plato["nombre"], ENT_QUOTES, "UTF-8") ?></h3>
                            <strong>Bs. <?= number_format($plato["precio"], 2) ?></strong>
                        </div>
                        <p><?= htmlspecialchars($plato["descripcion"], ENT_QUOTES, "UTF-8") ?></p>
                        <button class="order-btn" type="button" onclick="seleccionarPlato('<?= htmlspecialchars($plato["nombre"], ENT_QUOTES, "UTF-8") ?>')">
                            <i class="fa-solid fa-basket-shopping"></i> Elegir plato
                        </button>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="about" id="nosotros">
        <div class="about-image">
            <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352" alt="Ingredientes frescos">
        </div>
        <div class="about-content">
            <p class="section-label">CONÓCENOS</p>
            <h2>Una forma diferente de disfrutar la comida.</h2>
            <p>En Restaurant Aluci queremos demostrar que una alimentación basada en plantas puede ser deliciosa, variada y accesible.</p>
            <p>Nuestro objetivo es ofrecer platos preparados con ingredientes frescos, cuidando cada detalle desde la cocina hasta tu mesa.</p>
            <a href="#contacto" class="btn btn-primary">Conoce más</a>
        </div>
    </section>

    <section class="contact-section" id="contacto">
        <div class="section-title">
            <p>ESTAMOS PARA ATENDERTE</p>
            <h2>Contáctanos</h2>
            <span>Haz tu pedido o visítanos.</span>
        </div>
        <div class="contact-grid">
            <div class="contact-card">
                <i class="fa-brands fa-whatsapp"></i>
                <h3>WhatsApp</h3>
                <p>73612520</p>
                <a href="https://wa.me/59173612520" target="_blank" rel="noopener">Enviar mensaje</a>
            </div>
            <div class="contact-card">
                <i class="fa-solid fa-location-dot"></i>
                <h3>Ubicación</h3>
                <p>La Asunta, Bolivia</p>
                <a href="https://www.google.com/maps/search/?api=1&query=La+Asunta+Bolivia" target="_blank" rel="noopener">Ver ubicación</a>
            </div>
            <div class="contact-card">
                <i class="fa-regular fa-clock"></i>
                <h3>Horario</h3>
                <p>Domingo a viernes</p>
                <span>09:00 - 20:00</span>
            </div>
        </div>
    </section>

    <section class="contact-section" id="pedido">
        <div class="section-title">
            <p>HAZ TU PEDIDO</p>
            <h2>Formulario de pedido</h2>
            <span>Completa tus datos para guardar tu pedido en la base de datos.</span>
        </div>
        <form class="form-pedido" action="procesar.php" method="POST">
            <label for="nombre">Nombre completo</label>
            <input type="text" id="nombre" name="nombre" maxlength="100" required>
               <br> 
            <label for="telefono">Número de teléfono</label>
            <input type="tel" id="telefono" name="telefono" maxlength="20" required><br> 

            <label for="plato">Selecciona tu plato</label>  
            <select id="plato" name="plato" required>
                <option value="">-- Elige un plato --</option> 
                <?php foreach ($platos as $plato): ?>
                    <option value="<?= htmlspecialchars($plato["nombre"], ENT_QUOTES, "UTF-8") ?>">
                        <?= htmlspecialchars($plato["nombre"], ENT_QUOTES, "UTF-8") ?> - Bs. <?= number_format($plato["precio"], 2) ?>
                    </option><br> 
                <?php endforeach; ?>
            </select><br> 

            <label for="cantidad">Cantidad</label>
            <input type="number" id="cantidad" name="cantidad" min="1" max="50" value="1" required><br> 

            <label for="detalle">Detalle adicional (opcional)</label>
            <textarea id="detalle" name="detalle" rows="3" maxlength="500"></textarea><br> 

            <button type="submit" class="btn btn-primary">Registrar pedido</button>
        </form>
    </section>
</main>

<footer>
    <div class="footer-content">
        <div class="footer-logo"><i class="fa-solid fa-leaf"></i> Aluci</div>
        <p>Alimentación saludable, natural y deliciosa.</p>
        <div class="social-links">
            <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
            <a href="https://wa.me/59173612520" target="_blank" rel="noopener" aria-label="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
        <hr>
        <p class="copyright">© 2026 Aluci. Todos los derechos reservados | Autor: Celly Villca Cuentas</p>
    </div>
</footer>

<a href="https://wa.me/59173612520" target="_blank" rel="noopener" class="whatsapp-float" aria-label="WhatsApp">
    <i class="fa-brands fa-whatsapp"></i>
</a>
<script src="script.js"></script>
</body>
</html>
