<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

include '../php/conection-be.php';

// Obtener el ID del usuario
$usuario_id = $_SESSION['usuario_id'];

// Obtener las reservas del usuario
$query = "SELECT r.id, p.nombre AS producto_nombre, r.cantidad, r.dias_reserva 
          FROM reservas r 
          JOIN productos p ON r.producto_id = p.id 
          WHERE r.usuario_id = '$usuario_id'";
$result = mysqli_query($conection, $query);
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
        function eliminar_reserva(reservaId) {
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
                    // envio de formulario
                    document.getElementById('deleteForm' + reservaId).submit();
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
                <?php
				if (isset($_SESSION['correo'])): ?>
					<form class="cerrar-sesion" action="php/logout.php" method="POST" onsubmit="return false;">
						<button type="button" onclick="confirmLogout(this)">Cerrar Sesión</button>
					</form>
				<?php endif; ?>
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

                <div>
                <a href="reservas.php" style="text-decoration: none; color: inherit;">
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
                </a>
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

            <div class="details">
                <div class="recentOrders">
                    <h1>Lista de productos</h1>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Días de Reserva</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row['producto_nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($row['cantidad']); ?></td>
                                        <td><?php echo htmlspecialchars($row['dias_reserva']); ?></td>
                                        <td>
                                            <form id="deleteForm<?php echo $row['id']; ?>" action="eliminar_reserva.php" method="POST">
                                                <input type="hidden" name="reserva_id" value="<?php echo $row['id']; ?>">
                                                <button type="button" class="myButton1" onclick="eliminar_reserva(<?php echo $row['id']; ?>)">Eliminar</button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No tienes reservas activas.</p>
                    <?php endif; ?>
                </div>
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