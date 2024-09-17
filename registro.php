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
		<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/styles.css" />
	</head>

	<body>
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

		<!-- REGISTRO -->

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
                    <form action="php/login_user.php" class="formulario__login" method="POST" >
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="correo" required>
                        <input type="password" placeholder="Contraseña" name required>
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="php/user_register.php" method="POST" class="formulario__register"> 
                        <h2>Regístrarse</h2>
                        <input type="text" placeholder="Nombre completo" name="nombre" required>
                        <input type="text" placeholder="Correo Electronico" name="correo" required>
                        <input type="text" placeholder="Usuario" name="usuario" required>
                        <input type="password" placeholder="Contraseña" name="password" required>
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>



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
		<script src="assets/js/script.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	</body>
</html>