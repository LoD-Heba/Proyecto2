<?php
session_start();
?>

<!-- Estilos contacto -->
<style>
    .contact-section {
        padding: 50px;
        text-align: center;
    }

    .contact-section h1 {
        color: #4CAF50;
        text-shadow: 2px 2px 3px rgb(236, 236, 236);
    }

    .contact-container {
        display: flex;
        justify-content: space-around;
        margin-top: 20px;
    }

    .contact-info h2,
    .contact-form h2 {
        color: #4CAF50;
    }

    .contact-info p {
        font-size: 22px;
        color: black;
    }

    .map-section {
        margin-top: 50px;
        text-align: center;
    }
    .whatsapp {
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#25d366;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:30px;
  z-index:100;
}

.whatsapp-icon {
  margin-top:13px;
}
</style>
<!-- Estilos fin -->


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0" />
    <title>Club del Frijol</title>
    <link rel="icon" href="img/ico.png" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<!-- anuncios start-->

<div class="announcement-bar">
    <div class="announcement-bar-content container">
        <div class="content-info">
            <p>
                <i class="fa-solid fa-phone-volume"></i>
                +591 6###4081
            </p>
            <p>
                <i class="fa-regular fa-envelope"></i>
                zegion511@gmail.com
            </p>
            <a href="https://wa.me/5211234567890?text=Me%20gustaría%20saber%20el%20precio%20del%20coche" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
        </div>


    </div>
</div>
<!-- Anuncios end -->

<body>
    <header>
        <div class="container section-logo">
            <a href="index.php">
				<img src="assets/img/logoclub.png" alt="Logo" class="img-logo" />
			</a>

            <div class="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </div>
			<nav class="nav-links">
            <?php
				if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
					echo '<a href="dashboard/usuarios.php">Administrador</a>';
				}
				?>
				<a href="index.php">Inicio</a>
				<a href="#tienda">Tienda</a>
				<a href="contactos.php">Contacto</a>
				<div class="container-actions">
					<button onclick="window.location.href='<?php echo isset($_SESSION['correo']) ? 'php/perfil.php' : 'registro.php'; ?>';">
						<?php if (isset($_SESSION['correo'])): ?>
							<img src="<?php echo 'php/' . $_SESSION['foto_perfil']; ?>" alt="Foto de perfil" style="width: 90px; height: 90px; border-radius: 50%;">
						<?php else: ?>
							<i class="fa-regular fa-user"></i>
						<?php endif; ?>
					</button>
				</div>
			</nav>

        </div>
    </header>

    <!-- Contenido start-->
    <section id="tienda" class="section-categories container">
        <h2>Categorías</h2>

<!-- CATEGORIAS NAV -->
        <div class="container-cards-categories">
            <div class="card-category" onclick="window.location.href='plantas_interior.php';" data-category="interior">
                <div class="img-category">
                    <img src="assets/img/category-1.png" alt="Category 1" />
                </div>
                <h3>Plantas de Interior</h3>
            </div>
            <div class="card-category" onclick="window.location.href='plantas_exterior.php';" data-category="exterior">
                <div class="img-category">
                    <img src="assets/img/category-2.png" alt="Category 2" />
                </div>
                <h3>Plantas de Exterior</h3>
            </div>
            <div class="card-category" onclick="window.location.href='flores.php';" data-category="flores">
                <div class="img-category">
                    <img src="assets/img/category-4.png" alt="Category 4" />
                </div>
                <h3>Flores</h3>
            </div>
            <div class="card-category" onclick="window.location.href='arbustos.php';" data-category="arbustos">
                <div class="img-category">
                    <img src="assets/img/category-3.png" alt="Category 3" />
                </div>
                <h3>Arbustos</h3>
            </div>
        </div>
    </section>

    <!-- Sección de contacto -->
    <section class="contact-section">
        <h1>Contáctanos</h1>
        <div class="contact-container">
            <div class="contact-info">
                <h2>Información de Contacto</h2>
                <p><strong>Dirección:</strong> Sacaba</p>
                <p><strong>Teléfono:</strong> +591 ########</p>
                
            </div>
        </div>
    </section>
    <section class="map-section">
        <h2>Nuestra Ubicación</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d903.9139211579056!2d-66.05363094545872!3d-17.414645449720897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e373e0d9e4ab27%3A0xa2719ae9532c3e65!2sCochabamba!5e1!3m2!1ses!2sbo!4v1727220968330!5m2!1ses!2sbo" width="800" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <!-- contacto end -->
        <!-- Contenido end -->

        <footer>
		<div class="section-footer container">
			<div class="footer-section-logo">
				<img src="assets/img/logoclub.png" alt="Logo" class="img-logo" />

				<p>
					Ofrecemos una amplia variedad de plantas de interior y
					exterior, perfectas para decorar tu hogar y mejorar tu
					bienestar. Nuestra misión es conectar a las personas con
					la naturaleza.
				</p>
			</div>
			<div class="footer-links">
				<div class="footer-column">
					<h4 class="footer-column-title">Compañía</h4>
					<ul>
						<li><a href="index.php">Inicio</a></li>
						<li><a href="contactos.php">Contáctanos</a></li>
					</ul>
				</div>
				<div class="footer-column">
					<h4 class="footer-column-title">Políticas de privacidad</h4>
					
					<p>&copy; 2024 Mi Tienda de Plantas. Todos los derechos reservados.</p>


				</div>
				<div class="footer-column newsletter">
					<h4 class="footer-column-title">
						Suscríbete a nuestros Emails
					</h4>
					<p>
						Disfruta de un 15% de descuento en tu primer pedido
						cuando te suscribas a nuestro boletín informativo
					</p>
				</div>
			</div>

		</div>
	</footer>
        <script src="assets/js/main.js"></script>
        <script src="assets/js/posicion-user.js"></script>
</body>
</html>