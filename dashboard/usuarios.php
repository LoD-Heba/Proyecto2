<?php
session_start();
include '../php/conection-be.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club del Frijol</title>
    <link rel="stylesheet" href="assets/css/estilosadmi.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Script alert -->
    <script type="text/javascript">
        function confirmarEliminar(event) {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = event.target.href;
                }
            });
        }
    </script>
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <div class="menu-toggle">
				<i class="fa-solid fa-bars"></i>
			</div>
            <nav class="nav-links"> <!-- Cambié <ul> por <nav> para mantener coherencia con el script -->
                <ul>
                    <li>
                        <a href="../index.php">
                            <img src="../assets/img/logoclub.png" alt="Logo" class="img-logo" />
                        </a>
                    </li>
                    <div class="menu-toggle">
				<i class="fa-solid fa-bars"></i>
			</div>
                    <li>
                        <a href="usuarios.php">
                            <span class="icon">
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">Usuarios</span>
                        </a>
                    </li>

                    <li>
                        <a href="comentarios.php">
                            <span class="icon">
                                <ion-icon name="chatbubble-outline"></ion-icon>
                            </span>
                            <span class="title">Comentarios</span>
                        </a>
                    </li>

                    <li>
                        <a href="productos.php">
                            <span class="icon">
                                <ion-icon name="leaf-outline"></ion-icon>
                            </span>
                            <span class="title">Productos</span>
                        </a>
                    </li>
                    <li>
                        <a href="reservas.php">
                            <span class="icon">
                                <ion-icon name="cart"></ion-icon>
                            </span>
                            <span class="title">Reservas</span>
                        </a>
                    </li>

                    <li>
                        <a href="../index.php">
                            <span class="icon">
                                <ion-icon name="home-outline"></ion-icon>
                            </span>
                            <span class="title">Volver</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <!-- <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div> -->

                <div class="container-actions">
                    <button onclick="window.location.href='<?php echo isset($_SESSION['correo']) ? '../php/perfil.php' : '../registro.php'; ?>';">
                        <?php if (isset($_SESSION['correo'])): ?>
                            <img src="<?php echo '../php/' . $_SESSION['foto_perfil']; ?>" alt="Foto de perfil" style="width: 90px; height: 90px; border-radius: 50%;">
                        <?php else: ?>
                            <i class="fa-regular fa-user"></i>
                        <?php endif; ?>
                    </button>
                </div>
            </div>
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1</div>
                        <div class="cardName">Vistas</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <?php
                        $conection = mysqli_connect("localhost", "root", "", "club_frijol");
                        $sql_count_ventas = "SELECT COUNT(*) as total_ventas FROM reservas";
                        $result_count_ventas = mysqli_query($conection, $sql_count_ventas);
                        $total_ventas = 0;
                        if ($result_count_ventas) {
                            $row_count_ventas = mysqli_fetch_assoc($result_count_ventas);
                            $total_ventas = $row_count_ventas['total_ventas'];
                        }
                        ?>
                        <div class="numbers"><?php echo $total_ventas; ?></div>
                        <div class="cardName">Reservas</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div>
                    <a href="comentarios.php" style="text-decoration: none; color: inherit;">
                        <div class="card">
                            <div>
                                <?php
                                $conection = mysqli_connect("localhost", "root", "", "club_frijol");
                                $sql_count = "SELECT COUNT(*) as total_comentarios FROM comentarios";
                                $result_count = mysqli_query($conection, $sql_count);
                                $total_comentarios = 0;
                                if ($result_count) {
                                    $row_count = mysqli_fetch_assoc($result_count);
                                    $total_comentarios = $row_count['total_comentarios'];
                                }
                                ?>
                                <div class="numbers"><?php echo $total_comentarios; ?></div>
                                <div class="cardName">Comentarios</div>
                            </div>

                            <div class="iconBx">
                                <ion-icon name="chatbubbles-outline"></ion-icon>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <?php
            // Consulta para obtener los registros de los usuarios
            $sql = "SELECT id, nombre, correo, usuario, rol, clave FROM registro_usuario";
            $resultado = mysqli_query($conection, $sql);
            ?>
            <div class="details">
                <div class="recentOrders">
                    <h1>Lista de usuarios</h1>
                    <table class="responsive-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Editor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sql = "SELECT registro_usuario.id, registro_usuario.nombre, registro_usuario.correo, registro_usuario.usuario, permisos.rol FROM registro_usuario
                                LEFT JOIN permisos ON registro_usuario.rol = permisos.id";
                            $resultado = mysqli_query($conection, $sql);
                            if (mysqli_num_rows($resultado) > 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo "<td>" . $fila['id'] . "</td>";
                                    echo "<td>" . $fila['nombre'] . "</td>";
                                    echo "<td>" . $fila['correo'] . "</td>";
                                    echo "<td>" . $fila['usuario'] . "</td>";
                                    echo "<td>" . $fila['rol'] . "</td>";
                                    echo "<td>
                                        <a class='myButton1' href='editar.php?id=" . $fila['id'] . "'>Editar</a> -
                                        <a class='myButton2' href='eliminar.php?id=" . $fila['id'] . "' onclick='confirmarEliminar(event)'>Eliminar</a>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No hay usuarios registrados</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/menu_ham.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>