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
    <link rel="stylesheet" href="estilosadmi.css">
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
                    <a href="config.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
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
                        <input type="text" placeholder="Search here">
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
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <?php 
                include("conexion.php");
                $sql="SELECT * FROM alumnos";
                $resultado=mysqli_query($conexion,$sql);
            ?>
            <!-- Fin conexion -->
                <h1>Lista de alumnos</h1>
                <a href="agregar.php">Agrar alumno</a>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Editor</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        while($filas = mysqli_fetch_assoc($resultado)){
                        ?>
                        <tr>
                            <th><?php echo $filas['id']?></th>
                            <th><?php echo $filas['nombre']?></th>
                            <th><?php echo $filas['correo']?></th>
                            <th><?php echo $filas['usuario']?></th>
                            <th><?php echo $filas['nocontrol']?></th>
                            <th>
                                <?php echo "<a href='editar.php?id=".$filas['id']."'>Editar</a>";?>
                                -
                                <?php echo "<a href='eliminar.php?id=".$filas['id']."' onclick='return confirmar ()'>Eliminar</a>";?>
                            </th>
                            
                        
                            </tr>
                
                        <?php 
                        }
                        ?>
                    </tbody>

    </table>
            <?php 
                mysqli_close($conexion);
            ?>
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