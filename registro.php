<?php
session_start();
?>

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
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/styles.css" />
</head>

<body>
	<!-- Navbar start-->
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
					echo '<a href="dashboard/usuarios.php">Admi</a>';
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
				<?php
				if (isset($_SESSION['correo'])): ?>
					<form class="cerrar-sesion" action="php/logout.php" method="POST" onsubmit="return false;">
						<button type="button" onclick="confirmLogout(this)">Cerrar Sesión</button>
					</form>
				<?php endif; ?>
			</nav>

		</div>
	</header>
	<!-- Navbar end -->

	<!-- REGISTRO PLANTILLA-->
	<main>
		<div class="contenedor__todo">
			<div class="caja__trasera">
				<div class="caja__trasera-login">
					<h3>¿Ya tienes una cuenta?</h3>
					<p>Inicia sesión para entrar en la página</p>
					<button id="btn__iniciar-sesion">Iniciar Sesión</button>
				</div>
				<div class="caja__trasera-register">
					<h3>¿Aún no tienes una cuenta?</h3>
					<p>Regístrate para que puedas iniciar sesión</p>
					<button id="btn__registrarse">Regístrarse</button>
				</div>
			</div>

			<!--Formulario de Login y registro-->
			<div class="contenedor__login-register">
				<!--Login-->
				<form action="php/login_user.php" class="formulario__login" method="POST">
					<h2>Iniciar Sesión</h2>
					<input type="email" placeholder="Correo Electronico" name="correo" required>
					<input type="password" placeholder="Contraseña" name="clave" required>
					<button>Entrar</button>
				</form>

				<!--Register-->
				<form action="php/user_register.php" method="POST" class="formulario__register" enctype="multipart/form-data">
					<?php
					if (isset($message)) {
						foreach ($message as $message) {
							echo '<div class="message">' . $message . '</div>';
						}
					}
					?>
					<h2>Regístrarse</h2>
					<input type="text" placeholder="Nombre completo" name="nombre" required>
					<input type="email" placeholder="Correo Electronico" name="correo" required>
					<input type="text" placeholder="Usuario" name="usuario" required>
					<input type="password" placeholder="Contraseña" name="clave" required>

					<button>Regístrarse</button>
				</form>
			</div>
		</div>

	</main>
	
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
						<li><a href="#">Sobre Nosotros</a></li>
						<li><a href="#">Contáctanos</a></li>
						<li><a href="#">Política de Privacidad</a></li>
						<li><a href="#">Carreras</a></li>
					</ul>
				</div>
				<div class="footer-column">
					<h4 class="footer-column-title">Servicio al Cliente</h4>
					<ul>
						<li><a href="#">Preguntas Frecuentes</a></li>
						<li><a href="#">Términos de Uso</a></li>
						<li><a href="#">Condiciones de Pedido</a></li>
						<li><a href="#">Métodos de Pago</a></li>
					</ul>
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
	<script src="assets/js/login.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>