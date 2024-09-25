<?php
session_start();
?>

<?php
$conection = mysqli_connect("localhost", "root", "", "club_frijol");
$id = intval($_GET['id']);
$sql = "SELECT * FROM productos WHERE id = $id";
$resultado = mysqli_query($conection, $sql);
$fila = mysqli_fetch_assoc($resultado);

if (isset($_POST['actualizar'])) {
    $nombre = mysqli_real_escape_string($conection, $_POST['nombre']);
    $precio = mysqli_real_escape_string($conection, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($conection, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($conection, $_POST['categoria']);

    if (!empty($_FILES['imagen']['name'])) {
        $imagen = $_FILES['imagen']['name'];
        $ruta = "../assets/img/" . basename($imagen);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

        $sql_update = "UPDATE productos SET nombre='$nombre', precio='$precio', descripcion='$descripcion', categoria='$categoria', imagen='$imagen' WHERE id=$id";
    } else {
        $sql_update = "UPDATE productos SET nombre='$nombre', precio='$precio', descripcion='$descripcion', categoria='$categoria' WHERE id=$id";
    }

    if (mysqli_query($conection, $sql_update)) {
        echo "<script>
                window.location.href = 'productos.php';
              </script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($conection);
    }
}
?>


<!-- Estilos comienzo -->
<style>
    .edit-product-container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #f4f9f4;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .edit-product-container h2 {
        text-align: center;
        color: #3b6e58;
        font-family: 'Poppins', sans-serif;
        margin-bottom: 20px;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        font-size: 20px;
        color: #3b6e58;
        font-weight: bold;
        margin-bottom: 5px;
        font-family: 'Poppins', sans-serif;
    }

    .input-group input[type="text"],
    .input-group input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
        transition: border-color 0.3s;
    }

    .input-group textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #f8f8f8;
        font-size: 16px;
        resize: none;
    }

    /* Botón de actualizar */
    .btn-update {
        display: block;
        width: 100%;
        background-color: #3b6e58;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        padding: 12px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
        font-weight: bold;
    }

    .btn-update:hover {
        background-color: #2a5542;
        box-shadow: 0 6px 12px rgba(59, 110, 88, 0.4);
    }
</style>
<!-- ESTILOS FIN -->


<!-- Formulario para editar el usuario -->
<div class="edit-product-container">
    <h2>Editar Producto</h2>
    <form action="editar_producto.php?id=<?php echo $fila['id']; ?>" method="POST" enctype="multipart/form-data" class="edit-product-form">
        <div class="input-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>" required>
        </div>

        <div class="input-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="<?php echo $fila['precio']; ?>" step="0.01" required>
        </div>

        <div class="input-group">
            <label for="categoria">Categoría:</label>
            <select name="categoria" id="categoria" required>
                <option value="1" <?php if ($fila['categoria'] == '1') echo 'selected'; ?>>Plantas de Interior</option>
                <option value="2" <?php if ($fila['categoria'] == '2') echo 'selected'; ?>>Plantas de Exterior</option>
                <option value="3" <?php if ($fila['categoria'] == '3') echo 'selected'; ?>>Flores</option>
                <option value="4" <?php if ($fila['categoria'] == '4') echo 'selected'; ?>>Arbustos</option>
            </select>
        </div>

        <div class="input-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="4" required><?php echo $fila['descripcion']; ?></textarea>
        </div>

        <div class="input-group">
            <label for="imagen">Imagen Actual:</label>
            <img src="../assets/img/<?php echo $fila['imagen']; ?>" alt="Imagen del Producto" style="width: 100px; height: auto;">
        </div>

        <div class="input-group">
            <label for="imagen">Nueva Imagen (opcional):</label>
            <input type="file" name="imagen" id="imagen">
        </div>

        <input type="submit" name="actualizar" value="Actualizar" class="btn-update">
    </form>
</div>