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
            <!-- New -->
            <div class="add-product-container">

                <h2>Añadir Nuevo Producto</h2>
                <form action="agregar_producto_config.php" method="POST" enctype="multipart/form-data">
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
                    <div class="button-agre">
                        <button type="submit" class="btn-add-product">Añadir Producto</button>
                        <a class='myButton1' href="productos.php">Cancelar</a>
                    </div>
                </form>
            </div>
            <!-- End new -->
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
