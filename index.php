<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<<<<<<< HEAD
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Club del Frijol</title>
		<link rel="icon" href="img/ico.png" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
			integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<link rel="stylesheet" href="assets/css/styles.css" />
	</head>
=======
>>>>>>> cb811bb (25-9-2024 terminado...casi)

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

<!-- Navbar start-->
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

	<section id="inicio" class="section-hero container">
		<div class="info">
			<h1>Plantas <span>verdes</span> para un mundo verde</h1>
			<p>
				Compra las mejores flores para ti y haz que tu hogar luzca
				hermoso.
			</p>
		</div>
		<div class="container-img-hero">
			<div class="img-hero">
				<img src="assets/img/header-img.png" alt="Imagen Header" />
			</div>

			<div class="message-float-header">
				<i class="fa-solid fa-gift"></i>
				<span>
					<p>Mejor venta de plantas</p>
					<p>Compra las mejores flores</p>
				</span>
			</div>
		</div>
	</section>
	

<<<<<<< HEAD
        <!-- Navbar start-->
		<header>
			<div class="container section-logo">
				<button class="menu-toggle">Cerrar</button>
				<a href="index.php">
				<img src="assets/img/logo.png" alt="Logo" class="img-logo" />
				</a>
				<nav class="nav-list">
					<a href="dashboard/indexadmi.php">Admin</a>
					<a href="index.php">Inicio</a>
					<a href="flores.php">Flores</a>
					<a href="#">Plantas interior</a>
					<a href="#">Plantas exterior</a>
					<a href="#">Arbustos</a>
					<a href="#">contactos</a>
				</nav>
=======
	<section id="tienda" class="section-categories container">
		<h2>Categorías</h2>
>>>>>>> cb811bb (25-9-2024 terminado...casi)

		<div class="container-cards-categories">
			<div class="card-category" onclick="window.location.href='plantas_interior.php';">
				<div class="img-category">
					<img src="assets/img/category-1.png" alt="Category 1" />
				</div>
				<h3>Plantas de Interior</h3>
			</div>
			<div class="card-category" onclick="window.location.href='plantas_exterior.php';">
				<div class="img-category">
					<img src="assets/img/category-2.png" alt="Category 2" />
				</div>
				<h3>Plantas de Exterior</h3>
			</div>
			<div class="card-category" onclick="window.location.href='flores.php';">
				<div class="img-category">
					<img src="assets/img/category-4.png" alt="Category 4" />
				</div>

				<h3>Flores</h3>
			</div>
			<div class="card-category" onclick="window.location.href='arbustos.php';">
				<div class="img-category">
					<img src="assets/img/category-3.png" alt="Category 3" />
				</div>

				<h3>Arbustos</h3>
			</div>
		</div>
	</section>

	<!-- CARDS RECIENTES -->
	<section class="section-best-products container">
		<h2>Productos Recientes</h2>
		<div class="container-cards-products">
			<?php
			$conection = mysqli_connect("localhost", "root", "", "club_frijol");
			if (!$conection) {
				die("Error de conexión: " . mysqli_connect_error());
			}
			$sql = "SELECT * FROM productos ORDER BY fecha DESC"; //ORDENA POR FECHA
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

	<!-- COMENTARIOS -->
	<section id="comentarios" class="section-reviews container plant-theme">

		<p class="subtitle">
			Escucha lo que nuestros clientes tienen que decir sobre nosotros
		</p>
		<h2>Deja tu comentario</h2>

		<form id="form-comentario" class="form-comentar" method="POST" action="guardar_comentario.php">
			<textarea name="comentario" placeholder="Deja tu comentario" required></textarea>
			<button type="submit" class="btn-submit">Enviar comentario</button>
		</form>

		<div id="carouselComentarios" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<?php
				$sql = "SELECT c.comentario, c.fecha, u.usuario, u.foto_perfil 
            FROM comentarios c 
            JOIN registro_usuario u ON c.usuario_id = u.id 
            ORDER BY c.fecha DESC"; //LLAMA EL COMENTARIO, FECHA, USUARIO Y FOTO DE PERFIL

				$resultado = mysqli_query($conection, $sql);

				if (mysqli_num_rows($resultado) > 0) {
					$activeClass = 'active';
					while ($comentario = mysqli_fetch_assoc($resultado)) {
						echo '<div class="carousel-item ' . $activeClass . '">';
						echo '<div class="card-review plant-card">';

						// Mostrar la imagen de perfil del usuario o una imagen por defecto si no tiene una
						$fotoPerfil = !empty($comentario['foto_perfil']) ? 'php/' . $comentario['foto_perfil'] : 'assets/img/user.svg';
						echo '<div class="img-review">';
						echo '<img src="' . $fotoPerfil . '" alt="Foto del usuario" style="width: 200px; height: 200px; border-radius: 50%;">'; //AJUSTAR FOTO DE PERFIL
						echo '</div>';
						echo '<div class="info-review">';
						echo '<h3>' . $comentario['usuario'] . '</h3>';
						echo '<p>' . $comentario['comentario'] . '</p>';
						echo '<span class="fecha">' . $comentario['fecha'] . '</span>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						$activeClass = '';
					}
				} else {
					echo '<p>No hay comentarios disponibles.</p>';
				}
				?>
			</div>

			<button class="carousel-control-prev" type="button" data-bs-target="#carouselComentarios" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Anterior</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselComentarios" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Siguiente</span>
			</button>

			<ol class="carousel-indicators">
				<?php
				$index = 0;
				mysqli_data_seek($resultado, 0);
				while ($index < mysqli_num_rows($resultado)) {
					echo '<li data-bs-target="#carouselComentarios" data-bs-slide-to="' . $index . '" class="' . ($index == 0 ? 'active' : '') . '"></li>';
					$index++;
				}
				?>
			</ol>
		</div>
	</section>

	<!-- BOTON PARA SUBIR ARRIBA -->
	<button id="scrollToTopBtn">
		<i class="fa-solid fa-arrow-up"></i>
	</button>


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
<<<<<<< HEAD
			<div class="container-img-hero">
				<div class="img-hero">
					<img src="assets/img/header-img.png" alt="Imagen Header" />
=======
			<div class="footer-links">
				<div class="footer-column">
					<h4 class="footer-column-title">Compañía</h4>
					<ul>
						<li><a href="#">Sobre Nosotros</a></li>
						<li><a href="#">Contáctanos</a></li>
						<li><a href="#">Política de Privacidad</a></li>
						<li><a href="#">Carreras</a></li>
					</ul>
>>>>>>> cb811bb (25-9-2024 terminado...casi)
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
<<<<<<< HEAD
			</div>
		</section>

		<section class="section-categories container">
			<h2>Categorías</h2>

			<div class="container-cards-categories">
				<div class="card-category">
					<div class="img-category">
						<img src="assets/img/category-1.png" alt="Category 1" />
					</div>
					<h3>Plantas de Interior</h3>
				</div>
				<div class="card-category">
					<div class="img-category">
						<img src="assets/img/category-2.png" alt="Category 2" />
					</div>
					<h3>Plantas de Exterior</h3>
				</div>
				<div class="card-category">
					<div class="img-category">
						<img src="assets/img/category-3.png" alt="Category 3" />
					</div>

					<h3>Arbustos</h3>
				</div>
				<div class="card-category">
					<div class="img-category">
						<img src="assets/img/category-4.png" alt="Category 4" />
					</div>

					<h3>Flores</h3>
				</div>
			</div>
		</section>

<!-- Cards Start -->

		<section class="section-best-products container">
			<h2>Mejores Productos</h2>

			<div class="container-cards-products">
<!-- new -->


<!-- end new -->
				<div class="card-product">
					<div class="img-product">
						<img src="assets/img/imagen-product-1.png" alt="Product 1" />
					</div>
					<div class="header-card">
						<span>
							<h3>Fiddle Leaf Fig</h3>
							<p class="price">000bs</p>
						</span>
						<button>
							<i class="fa-solid fa-heart"></i>
						</button>
					</div>
					<div class="container-stars">
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-solid fa-star"></i>
						<i class="fa-regular fa-star"></i>
					</div>
					<p class="description">
						La Fiddle Leaf Fig es una planta de interior popular
						gracias a sus hojas grandes y brillantes. Es una planta
						decorativa y fácil de cuidar.
					</p>
					<button class="btn-add-cart">Añadir al carrito</button>
				</div>
			</div>
		</section>

        <!-- Fin Cards -->

		<section class="section-reviews container">
			<h2>Clientes Felices</h2>

			<p class="subtitle">
				Escucha lo que nuestros clientes tienen que decir sobre
				nosotros
			</p>

			<div class="carousel-reviews">
				<div class="card-review">
					<div class="img-review">
						<img src="assets/img/user.svg" alt="Photo User 1" />
					</div>
					<div class="info-review">
						<h3>John Doe</h3>
						<p class="occupation">Artist</p>
						<div class="container-stars">
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-solid fa-star"></i>
							<i class="fa-regular fa-star"></i>
						</div>
						<p>
							Mi casa se volvió más fresca y tranquila al añadir
							muchas plantas hermosas y muy cómodas de ver.
						</p>
					</div>
				</div>

				<button class="slider-button prev">
					<i class="fa-solid fa-chevron-left"></i>
				</button>
				<button class="slider-button next">
					<i class="fa-solid fa-chevron-right"></i>
				</button>

				<div class="slider-indicators">
					<span class="indicator"></span>
					<span class="indicator"></span>
					<span class="indicator active"></span>
					<span class="indicator"></span>
					<span class="indicator"></span>
					<span class="indicator"></span>
					<span class="indicator"></span>
				</div>
			</div>
		</section>

		<footer>
			<div class="section-footer container">
				<div class="footer-section-logo">
					<img src="assets/img/logo.png" alt="Logo" class="img-logo" />

=======
				<div class="footer-column newsletter">
					<h4 class="footer-column-title">
						Suscríbete a nuestros Emails
					</h4>
>>>>>>> cb811bb (25-9-2024 terminado...casi)
					<p>
						Disfruta de un 15% de descuento en tu primer pedido
						cuando te suscribas a nuestro boletín informativo
					</p>
				</div>
			</div>
<<<<<<< HEAD
		</footer>
		<script src="assets/Menu.js"></script>
	</body>
</html>
=======

		</div>
	</footer>
	<script src="assets/js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<?php
	mysqli_close($conection);
	?>
</body>

</html>
>>>>>>> cb811bb (25-9-2024 terminado...casi)
