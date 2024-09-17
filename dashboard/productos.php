<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
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
<!-- New -->
<div class="add-product-container">
    <h2>Añadir Nuevo Producto</h2>
    <form action="agregar_producto.php" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="input-group">
            <label for="precio">Precio (Bs):</label>
            <input type="number" id="precio" name="precio" required>
        </div>
        <div class="input-group">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="1">Plantas de Interior</option>
                <option value="2">Plantas de Exterior</option>
                <option value="3">Flores</option>
                <option value="4">Arbustos</option>
            </select>
        </div>
        <div class="input-group">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
        </div>
        <div class="input-group">
            <label for="imagen">Imagen del Producto:</label>
            <input type="file" id="imagen" name="imagen" required>
        </div>
        <button type="submit" class="btn-add-product">Añadir Producto</button>
    </form>
</div>



<!-- End new -->
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