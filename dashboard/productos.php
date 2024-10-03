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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <link rel="stylesheet" href="assets/css/estilosadmi.css">

    <head>
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
            <div class="details">
                <div class="recentOrders">
                    <h1>Lista de productos</h1>
                    <a class='myButton3' href="agregar_producto.php">Agregar</a>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Imagen</th>
                                <th>Editor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $conection = mysqli_connect("localhost", "root", "", "club_frijol");
                            $sql = "SELECT productos.id, productos.nombre, productos.precio, productos.categoria, productos.descripcion, productos.fecha, productos.imagen 
            FROM productos 
            LEFT JOIN categorias ON productos.categoria = categorias.id";
                            $resultado = mysqli_query($conection, $sql);

                            // Verificar si hay resultados
                            if (mysqli_num_rows($resultado) > 0) {
                                while ($fila = mysqli_fetch_assoc($resultado)) {
                                    $fecha = date('Y-m-d', strtotime($fila['fecha']));

                                    echo "<tr>";
                                    echo "<td>" . $fila['id'] . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['precio']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['categoria']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fila['descripcion']) . "</td>";
                                    echo "<td>" . htmlspecialchars($fecha) . "</td>";
                                    echo "<td><img src='../assets/img/" . htmlspecialchars($fila['imagen']) . "' alt='Imagen' style='width:100px; height:auto;'></td>";

                                    echo "<td>
                                            <a class='myButton1' href='editar_producto.php?id=" . $fila['id'] . "'>Editar</a> -
                                            <a class='myButton2' href='eliminar_producto.php?id=" . $fila['id'] . "' onclick='return confirmar(event)'>Eliminar</a>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No hay productos registrados</td></tr>";
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
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