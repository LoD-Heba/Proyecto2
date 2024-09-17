<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Club del Frijol</title>
		<link rel="icon" href="assets/img/ico.png" />
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
			integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<link rel="stylesheet" href="assets/css/styles.css" />
	</head>

	<body>
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

				<div class="social-links">
					<a href="#" class="btn-social-link">
						<i class="fa-brands fa-facebook"></i>
					</a>
					<a href="#" class="btn-social-link">
						<i class="fa-brands fa-instagram"></i>
					</a>
					<a href="#" class="btn-social-link">
						<i class="fa-brands fa-x-twitter"></i>
					</a>
				</div>
			</div>
		</div>
        <!-- Anuncios end -->

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

				<div class="container-actions">
					<a href="#" class="icon-button">
						<i class="fa-solid fa-magnifying-glass"></i>
					</a>
					<a href="#" class="icon-button">
						<i class="fa-regular fa-bell"></i>
					</a>
					<a href="registro.php" class="register-button">
						🌱 Login
					</a>
				</div>
				
			</div>
		</header>
        <!-- Navbar end -->
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

<!-- Contenido start-->
<section class="section-best-products container">
    <h2>Mejores Productos</h2>
    <div class="container-cards-products">
        <?php
        $conection = mysqli_connect("localhost", "root", "", "club_frijol");
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
                echo "<button><i class='fa-solid fa-heart'></i></button>";
                echo "</div>";
                echo "<p class='description'>" . $producto['descripcion'] . "</p>";
                echo "<button class='btn-add-cart'>Añadir al carrito</button>";
                echo "</div>";
            }
        } else {
            echo "<p>No hay productos disponibles en esta categoría.</p>";
        }
        ?>
    </div>
</section>


<!-- Contenido end -->

        <footer>
			<div class="section-footer container">
				<div class="footer-section-logo">
					<img src="assets/img/logo.png" alt="Logo" class="img-logo" />

					<p>
						Ofrecemos una amplia variedad de plantas de interior y
						exterior, perfectas para decorar tu hogar y mejorar tu
						bienestar. Nuestra misión es conectar a las personas con
						la naturaleza.
					</p>
					<div class="social-links">
						<a href="#" class="btn-social-link">
							<i class="fa-brands fa-facebook"></i>
						</a>
						<a href="#" class="btn-social-link">
							<i class="fa-brands fa-instagram"></i>
						</a>
						<a href="#" class="btn-social-link">
							<i class="fa-brands fa-x-twitter"></i>
						</a>
					</div>
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
	</body>
</html>