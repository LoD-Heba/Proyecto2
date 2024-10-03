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
	<link rel="stylesheet" href="assets/css/styles.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
			</nav>
		</div>
	</header>

	<!-- Contenido start-->
	<section id="tienda" class="section-categories container">
		<h2>Categorías</h2>

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

	<section class="section-best-products container">
		<h2>Llevese nuestras flores</h2>
		<div class="container-cards-products">
			<?php
			$conection = mysqli_connect("localhost", "root", "", "club_frijol");
			if (!$conection) {
				die("Error de conexión: " . mysqli_connect_error());
			}
			$sql = "SELECT * FROM productos WHERE categoria = 3";
			$resultado = mysqli_query($conection, $sql);

			if (mysqli_num_rows($resultado) > 0) {
				while ($producto = mysqli_fetch_assoc($resultado)) {
					echo "<div class='card-product'>";
					echo "<div class='img-product'>";
					echo "<img src='assets/img/" . $producto['imagen'] . "' alt='" . $producto['nombre'] . "' />";
					echo "</div>";
					echo "<div class='header-card'>";
					echo "<span><h3>" . $producto['nombre'] . "</h3><p class='price'>" . $producto['precio'] . "bs</p></span>";
					echo "</div>";
					echo "<p class='description'>" . $producto['descripcion'] . "</p>";
					echo "<button class='btn-add-cart' onclick=\"window.location.href='php/reservar_producto.php?id=" . $producto['id'] . "'\">Reservar</button>";
					echo "</div>";
				}
			} else {
				echo "<p>No hay productos disponibles.</p>";
			}
			?>
		</div>
	</section>
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
	<script src="assets/js/main.js"></script>
	<script src="assets/js/posicion-user.js"></script>
</body>
</html>