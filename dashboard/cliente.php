<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <script type="text/javascript">
        function confirmar (){
            return confirm('¿Estas seguro?');
        }
    </script>
    <link rel="stylesheet" href="assets/css/estilosadmi.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container"></div>
        <div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon">
                            <ion-icon name="logo-apple"></ion-icon>
                        </span>
                        <span class="title">Club Del Frijol</span>
                    </a>
                </li>

                <li>
                    <a href="indexadmi.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Inicio</span>
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
                    <a href="configuracion.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Configurar</span>
                    </a>
                </li>

                <li>
                    <a href="../index.php">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline">Regresar</ion-icon>
                        </span>
                        <span class="title">Regresar</span>
                    </a>
                </li>

                <li>.
                    <a href="">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
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

                <div class="search">
                    <label>
                        <input type="text" placeholder="Buscar">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
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
                        <div class="numbers">1</div>
                        <div class="cardName">ventas</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">1</div>
                        <div class="cardName">Comentarios</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>
            </div>



            <!-- ================ Order Details List ================= -->
            <?php
// Conexión a la base de datos
$conection = mysqli_connect("localhost", "root", "", "club_frijol");

// Consulta para obtener los registros de los usuarios
$sql = "SELECT id, nombre, correo, usuario,rol, clave FROM registro_usuario";
$resultado = mysqli_query($conection, $sql);

?>
        <div class="details">
            <div class="recentOrders">
            <!-- Fin conexion -->
                <h1>Lista de usuarios</h1>
                <table>
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
                $conexion=mysqli_connect("localhost","root","","club_frijol");               
                $SQL="SELECT registro_usuario.id, registro_usuario.nombre, registro_usuario.correo, registro_usuario.clave, permisos.rol FROM registro_usuario
                LEFT JOIN permisos ON registro_usuario.rol = permisos.id";
                $dato = mysqli_query($conexion, $SQL);
                // Verificar si hay resultados
                if (mysqli_num_rows($resultado) > 0) {
                    // Iterar sobre los resultados
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td>" . $fila['id'] . "</td>";
                        echo "<td>" . $fila['nombre'] . "</td>";
                        echo "<td>" . $fila['correo'] . "</td>";
                        echo "<td>" . $fila['usuario'] . "</td>";
                        echo "<td>" . $fila['rol']  . "</td>";
                        echo "<td>
                                <a href='editar.php?id=" . $fila['id'] . "'>Editar</a> -
                               
                                <a href='eliminar.php?id=".$fila['id']."' onclick='return confirmar ()'>Eliminar</a>";
                             
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
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>