<?php
session_start();
include '../php/conection-be.php';

function tiempo_transcurrido($fecha)
{
    $ahora = new DateTime(); // Fecha y hora actual
    $fecha_comentario = new DateTime($fecha); // Fecha del comentario
    $diferencia = $ahora->diff($fecha_comentario);

    if ($diferencia->y > 0) {
        return ($diferencia->y === 1) ? 'hace 1 año' : 'hace ' . $diferencia->y . ' años';
    } elseif ($diferencia->m > 0) {
        return ($diferencia->m === 1) ? 'hace 1 mes' : 'hace ' . $diferencia->m . ' meses';
    } elseif ($diferencia->d > 0) {
        if ($diferencia->d === 1) {
            return 'hace 1 día';
        } elseif ($diferencia->d < 7) {
            return 'hace ' . $diferencia->d . ' días';
        } else {
            $semanas = floor($diferencia->d / 7);
            return ($semanas === 1) ? 'hace 1 semana' : 'hace ' . $semanas . ' semanas';
        }
    } elseif ($diferencia->h > 0) {
        return ($diferencia->h === 1) ? 'hace 1 hora' : 'hace ' . $diferencia->h . ' horas';
    } elseif ($diferencia->i > 0) {
        return ($diferencia->i === 1) ? 'hace 1 minuto' : 'hace ' . $diferencia->i . ' minutos';
    } else {
        return 'hace unos segundos';
    }
}

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

                                    // Calcula el tiempo transcurrido desde la fecha del comentario
                                    echo "<td>" . tiempo_transcurrido($comentario['fecha']) . "</td>";

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
        <script src="../assets/js/sweetalert.js"></script>
        <script src="assets/js/menu_ham.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>