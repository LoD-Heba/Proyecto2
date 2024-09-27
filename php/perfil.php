    <?php
    session_start();

    if (!isset($_SESSION['usuario'])) {
        header("Location: ../index.php");
        exit();
    }

    include 'conection-be.php';

    // Cambiar foto de perfil
    if (isset($_POST['cambiar_foto'])) {
        $nueva_foto = $_FILES['foto_perfil']['name'];
        $ruta_foto = "uploads/" . basename($nueva_foto);
        // Mover la foto a la carpeta uploads
        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $ruta_foto)) {
            $usuario = $_SESSION['usuario'];
            mysqli_query($conection, "UPDATE registro_usuario SET foto_perfil='$ruta_foto' WHERE usuario='$usuario'");
            $_SESSION['foto_perfil'] = $ruta_foto; // Actualizar la sesión con la nueva foto
        } else {
            echo '
                <script>
                    alert("Error al subir la foto");
                    window.location = "perfil.php";
                </script>
            ';
        }
    }

    if (isset($_POST['editar_usuario'])) {
        $nuevo_nombre = $_POST['nombre'];
        $nuevo_correo = $_POST['correo'];
        $usuario = $_SESSION['usuario'];

        // Actualizar nombre y correo
        mysqli_query($conection, "UPDATE registro_usuario SET nombre='$nuevo_nombre', correo='$nuevo_correo' WHERE usuario='$usuario'");

        // Actualizar sesión con los nuevos datos
        $_SESSION['nombre'] = $nuevo_nombre;
    }

    // Obtener los datos del usuario
    $usuario = $_SESSION['usuario'];
    $query = "SELECT nombre, correo, foto_perfil FROM registro_usuario WHERE usuario='$usuario'";
    $result = mysqli_query($conection, $query);

    if (mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $nombre = $user_data['nombre'];
        $correo = $user_data['correo'];
        $foto_perfil = $user_data['foto_perfil'];
    } else {
        echo '
            <script>
                alert("No se encontraron datos del usuario.");
                window.location = "../index.php";
            </script>
        ';
    }
    ?>


    <!-- HTML -->
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0" />
        <title>Club del Frijol</title>
        <link rel="icon" href="../assets/img/ico.png" />
        <link rel="stylesheet" href="css/styles_perfil.css">
        <script>
            function previewImage(event) {
                const img = document.getElementById('preview');
                img.src = URL.createObjectURL(event.target.files[0]);
                img.style.display = 'block';
            }
        </script>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>

    <body>
        <header>
            <div class="container section-logo">
                <a href="../index.php">
                    <img src="../assets/img/logoclub.png" alt="Logo" class="img-logo" />
                </a>
                <div class="menu-toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>


                <nav class="nav-links" id="nav-links">
                    <?php
                    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
                        echo '<a href="../dashboard/usuarios.php">Admi</a>';
                    }
                    ?>
                    <a href="../index.php">Inicio</a>
                    <a href="../contactos">Contacto</a>

                    <div class="container-actions">
                        <button class="btn-perfil" onclick="window.location.href='<?php echo isset($_SESSION['correo']) ? 'perfil.php' : 'registro.php'; ?>';">
                            <?php if (isset($_SESSION['correo'])): ?>
                                <img src="<?php echo $_SESSION['foto_perfil']; ?>" alt="Foto de perfil" style="width: 90px; height: 90px; border-radius: 50%;">
                            <?php else: ?>
                                <img src="uploads/default-avatar.png" alt="foto por defecto">
                            <?php endif; ?>
                        </button>

                    </div>
                    <!-- Cerrar sesión -->
                    <form class="cerrar-sesion" action="logout.php" method="POST" onsubmit="return false;">
                        <button type="button" onclick="confirmLogout(this)">Cerrar Sesión</button>
                    </form>
                </nav>
            </div>
        </header>

        <!-- Contenido-->

        <div class="container2">
            <h1>Bienvenido, <?php echo htmlspecialchars($nombre); ?></h1>
            <img src="<?php echo htmlspecialchars($foto_perfil); ?>" alt="Foto de perfil" style="width: 190px; height: 190px; border-radius: 50%;">

            <!-- Datos del usuario -->
            <p><strong>Correo:</strong> <?php echo htmlspecialchars($correo); ?></p>
            <p><strong>Usuario:</strong> <?php echo htmlspecialchars($usuario); ?></p>
            <form action="perfil.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="foto_perfil" accept="image/*" id="file-input" onchange="previewImage(event); toggleButton();" required style="display: none;">
                <label for="file-input" class="file-label" id="file-label">Cambiar foto de perfil</label>
                <img id="preview" src="" alt="Vista previa" width="150" style="display:none; width: 190px; height: 190px; border-radius: 50%;">
                <button type="submit" name="cambiar_foto" id="submit-button" style="display: none; margin-bottom: 10px;" onclick="alertaExito()">Aceptar</button>
                <button type="button" id="cancel-button" style="display: none;" onclick="window.history.back()">Cancelar</button>
            </form>

            <!-- Formulario para editar nombre y correo -->
            <form action="perfil.php" method="POST">
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
                <input type="email" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
                <button type="submit" name="editar_usuario" onclick="alertaExito()">Actualizar Datos</button>
            </form>
            <?php

            // Obtener las reservas
            $usuario_id = $_SESSION['usuario_id'];
            $sql_reservas = "SELECT reservas.id, productos.nombre AS producto_nombre, reservas.cantidad, reservas.dias_reserva, reservas.fecha_reserva 
                    FROM reservas 
                    JOIN productos ON reservas.producto_id = productos.id 
                    WHERE reservas.usuario_id = '$usuario_id'";
            $resultado_reservas = mysqli_query($conection, $sql_reservas);

            ?>

            <h2>Reservas Activas</h2>

            <?php
            if (mysqli_num_rows($resultado_reservas) > 0) {
                echo "<ul class='reservas-list'>";
                while ($reserva = mysqli_fetch_assoc($resultado_reservas)) {
                    echo "<li>";
                    echo "<strong>Producto:</strong> " . htmlspecialchars($reserva['producto_nombre']) . "<br>";
                    echo "<strong>Cantidad:</strong> " . htmlspecialchars($reserva['cantidad']) . "<br>";
                    echo "<strong>Días de reserva:</strong> " . htmlspecialchars($reserva['dias_reserva']) . "<br>";
                    echo "<strong>Fecha de reserva:</strong> " . htmlspecialchars($reserva['fecha_reserva']) . "<br>";
                    echo "<form action='cancelar_reserva.php' method='POST' class='cancel-form'>";
                    echo "<input type='hidden' name='reserva_id' value='" . $reserva['id'] . "'>";
                    echo "<button type='button' class='btn-cancel' onclick='confirmCancel(this)'>Cancelar Reserva</button>";
                    echo "</form>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No tienes reservas activas.</p>";
            }
            ?>

        </div>
        <!-- Contenido end -->
        <script src="../assets/js/main.js"></script>

    </body>

    </html>