<?php
session_start();
include '../php/conection-be.php';
// if (!isset($_SESSION['usuario_id'])) {
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club del Frijol</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/estilosadmi.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        function eliminar_comentario(event) {
            event.preventDefault(); // Evita que el enlace se ejecute inmediatamente
            Swal.fire({
                title: "¿Estás seguro?",
                text: "¡No podrás revertir esto!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sí, eliminarlo",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Eliminado",
                        text: "Tu archivo ha sido eliminado.",
                        icon: "success"
                    }).then(() => {
                        window.location.href = event.target.href;
                    });
                }
            });
        }
    </script>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="../index.php">
                        <img src="../assets/img/logoclub.png" alt="Logo" class="img-logo" />
                    </a>
                </li>
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
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
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

            <!-- Comentarios start -->
            <div class="details">
                <div class="recentOrders">
                    <h1>Lista de Comentarios</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Comentario</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (!isset($_SESSION['usuario_id']) || !isset($_SESSION['rol'])) {
                                header("Location: ../php/login_user.php");
                                exit();
                            }
                            $conection = mysqli_connect("localhost", "root", "", "club_frijol");
                            if (!$conection) {
                                die("Conexión fallida: " . mysqli_connect_error());
                            }

                            $sql = "SELECT c.id, u.usuario, c.comentario, c.fecha
        FROM comentarios c
        JOIN registro_usuario u ON c.usuario_id = u.id
        ORDER BY c.fecha DESC";
                            $resultado = mysqli_query($conection, $sql);

                            if (mysqli_num_rows($resultado) > 0) {
                                while ($comentario = mysqli_fetch_assoc($resultado)) {
                                    echo "<tr>";
                                    echo "<td>" . $comentario['id'] . "</td>";
                                    echo "<td>" . $comentario['usuario'] . "</td>";
                                    echo "<td>" . $comentario['comentario'] . "</td>";
                                    echo "<td>" . $comentario['fecha'] . "</td>";
                                    if ($_SESSION['rol'] == '1') {
                                        echo "<td>
                                    <a class='myButton1' href='eliminar_comentario.php?id=" . $comentario['id'] . "' onclick='return eliminar_comentario(event)'>Eliminar</a>
                                </td>";
                                    } else {
                                        echo "<td>-</td>";
                                    }

                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No hay comentarios disponibles</td></tr>";
                            }

                            mysqli_close($conection);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- =========== Scripts =========  -->
        <script src="assets/js/main.js"></script>
        <script src="assets/js/menu_ham.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>