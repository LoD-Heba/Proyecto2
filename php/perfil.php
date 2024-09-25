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
            echo '
                <script>
                    alert("Foto de perfil actualizada con éxito");
                    window.location = "perfil.php";
                </script>
            ';
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
        echo '
            <script>
                alert("Datos actualizados con éxito");
                window.location = "perfil.php";
            </script>
        ';
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
    <style>
        h2 {
            margin-top: 2rem;
            font-size: 1.5rem;
            color: #333;
        }

        .reservas-list {
            list-style-type: none;
            padding: 0;
            margin: 1rem 0;
        }

        .reservas-list li {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .reservas-list li strong {
            color: #555;
        }

        .btn-cancel {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 10px;
        }

        .btn-cancel:hover {
            background-color: #c0392b;
        }
    </style>

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
    </head>

    <body>
        <header>
            <div class="container section-logo">
                <a href="index.php">
                    <img src="../assets/img/logoclub.png" alt="Logo" class="img-logo" />
                </a>
                <div class="menu-toggle">
                    <i class="fa-solid fa-bars"></i>
                </div>

                <nav class="nav-links">
                    <a href="../index.php">Inicio</a>
                    <a href="../contactos">Contacto</a>
                    <div class="container-actions">
                        <button onclick="window.location.href='<?php echo isset($_SESSION['correo']) ? 'perfil.php' : 'registro.php'; ?>';">
                            <?php if (isset($_SESSION['correo'])): ?>
                                <img src="<?php echo $_SESSION['foto_perfil']; ?>" alt="Foto de perfil" style="width: 90px; height: 90px; border-radius: 50%;">
                            <?php else: ?>
                                <i class="fa-regular fa-user"></i>
                            <?php endif; ?>
                        </button>
                    </div>
                </nav>

            </div>
        </header>

        <!-- Contenido-->

        <div class="container2">
            <h1>Bienvenido, <?php echo htmlspecialchars($nombre); ?></h1>
            <img src="<?php echo htmlspecialchars($foto_perfil); ?>" alt="Foto de perfil" width="150">

            <!-- Datos del usuario -->
            <p><strong>Correo:</strong> <?php echo htmlspecialchars($correo); ?></p>
            <p><strong>Usuario:</strong> <?php echo htmlspecialchars($usuario); ?></p>
            <form action="perfil.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="foto_perfil" accept="image/*" id="file-input" onchange="previewImage(event); toggleButton();" required style="display: none;">
                <label for="file-input" class="file-label" id="file-label">Cambiar foto de perfil</label>
                <img id="preview" src="" alt="Vista previa" width="150" style="display:none;">
                <button type="submit" name="cambiar_foto" id="submit-button" style="display: none;">Aceptar</button>
            </form>

            <!-- Formulario para editar nombre y correo -->
            <form action="perfil.php" method="POST">
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
                <input type="email" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
                <button type="submit" name="editar_usuario">Actualizar Datos</button>
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
                    echo "<form action='cancelar_reserva.php' method='POST'>";
                    echo "<input type='hidden' name='reserva_id' value='" . $reserva['id'] . "'>";
                    echo "<button type='submit' class='btn-cancel'>Cancelar Reserva</button>";
                    echo "</form>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No tienes reservas activas.</p>";
            }
            ?>



            <!-- Ocultar label -->
            <script>
                function previewImage(event) {
                    const label = document.getElementById('file-label');
                    label.style.display = 'none';
                    const img = document.getElementById('preview');
                    img.src = URL.createObjectURL(event.target.files[0]);
                    img.style.display = 'block';

                }

                function toggleButton() {
                    const button = document.getElementById('submit-button');
                    button.style.display = 'block';
                }
            </script>
            <!-- label -> aceptar -->

            <!-- Cerrar sesión -->
            <form action="logout.php" method="POST">
                <button type="submit">Cerrar Sesión</button>
            </form>
        </div>
        <!-- Contenido end -->
        <script src="assets/js/main.js"></script>
    </body>

    </html>