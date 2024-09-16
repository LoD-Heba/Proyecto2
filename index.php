<!DOCTYPE html>
<html lang="es">
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
		<link rel="stylesheet" href="styles.css" />
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

				
			</div>
		</div>
        <!-- Anuncios end -->

        <!-- Navbar start-->
		<header>
			<div class="container section-logo">
				<button class="menu-toggle">Cerrar</button>
				<a href="index.php">
				<img src="img/logo.png" alt="Logo" class="img-logo" />
				</a>
				<nav class="nav-list">
					<a href="dashboard/indexadmi.php">Admin</a>
					<a href="index.php">Inicio</a>
					<a href="tienda.php">Flores</a>
					<a href="#">Plantas interior</a>
					<a href="#">Plantas exterior</a>
					<a href="#">Arbustos</a>
					<a href="#">contactos</a>
				</nav>

				<div class="container-actions">
					<a href="https://www.ejemplo1.com" class="icon-button">
						<i class="fa-solid fa-magnifying-glass"></i>
					</a>
					<a href="https://www.ejemplo2.com" class="icon-button">
						<i class="fa-regular fa-bell"></i>
					</a>
					<a href="registro.php" class="register-button">
						🌱 Login
					</a>
				</div>
				
			</div>
		</header>
        <!-- Navbar end -->

        
		<section class="section-hero container">
			<div class="info">
				<h1>Plantas <span>verdes</span> para un mundo verde</h1>
				<p>
					Compra las mejores flores para ti y haz que tu hogar luzca
					hermoso.
				</p>

				<div class="container-buttons-header">
					<button>
						Ordenar Ahora
						<i class="fa-solid fa-circle-chevron-right"></i>
					</button>
					<button>
						<i class="fa-regular fa-circle-play"></i>
						¿Cómo funciona?
					</button>
				</div>
			</div>
			<div class="container-img-hero">
				<div class="img-hero">
					<img src="img/header-img.png" alt="Imagen Header" />
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

		<section class="section-categories container">
			<h2>Categorías</h2>

			<div class="container-cards-categories">
				<div class="card-category">
					<div class="img-category">
						<img src="img/category-1.png" alt="Category 1" />
					</div>
					<h3>Plantas de Interior</h3>
				</div>
				<div class="card-category">
					<div class="img-category">
						<img src="img/category-2.png" alt="Category 2" />
					</div>
					<h3>Plantas de Exterior</h3>
				</div>
				<div class="card-category">
					<div class="img-category">
						<img src="img/category-3.png" alt="Category 3" />
					</div>

					<h3>Arbustos</h3>
				</div>
				<div class="card-category">
					<div class="img-category">
						<img src="img/category-4.png" alt="Category 4" />
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
						<img src="img/imagen-product-2.png" alt="Product 2" />
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
						<img src="img/user.svg" alt="Photo User 1" />
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
					<img src="img/logo.png" alt="Logo" class="img-logo" />

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
			<!-- <form class="newsletter-form">
				<input
					type="email"
					placeholder="Tu correo electrónico"
				/>
				<button type="submit">
					<i class="fas fa-arrow-right"></i>
				</button>
			</form> -->
		</footer>
		<script src="assets/Menu.js"></script>
	</body>
</html>
