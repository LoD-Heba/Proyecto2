<?php
$conection = mysqli_connect("localhost", "root", "", "club_frijol");
$id = $_GET['id'];
$sql = "SELECT * FROM registro_usuario WHERE id = $id";
$resultado = mysqli_query($conection, $sql);
$fila = mysqli_fetch_assoc($resultado);

if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];

    $sql_update = "UPDATE registro_usuario SET nombre='$nombre', correo='$correo', usuario='$usuario',rol='$rol' WHERE id=$id";

    if (mysqli_query($conection, $sql_update)) {
        echo "Registro actualizado correctamente";
        header("Location: usuarios.php");
    } else {
        echo "Error: " . mysqli_error($conection);
    }
}
?>

<!-- Estilos comienzo -->
<style>
    .edit-user-container {
        max-width: 600px;
        margin: 20px auto;
        background-color: #f4f9f4;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .edit-user-container h2 {
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
        font-size: 14px;
        color: #3b6e58;
        font-weight: bold;
        margin-bottom: 5px;
        font-family: 'Poppins', sans-serif;
    }

    .input-group input[type="text"],
    .input-group input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: 'Poppins', sans-serif;
        transition: border-color 0.3s;
    }

    .input-group input:focus {
        border-color: #3b6e58;
        outline: none;
        box-shadow: 0 0 5px rgba(59, 110, 88, 0.5);
    }

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
<div class="edit-user-container">
    <h2>Editar Usuario</h2>
    <form action="" method="post" class="edit-user-form">
        <div class="input-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $fila['nombre']; ?>">
        </div>

        <div class="input-group">
            <label for="correo">Correo:</label>
            <input type="email" name="correo" id="correo" value="<?php echo $fila['correo']; ?>">
        </div>

        <div class="input-group">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" value="<?php echo $fila['usuario']; ?>">
        </div>

        <div class="input-group">
            <label for="rol">Rol:</label>
            <input type="text" name="rol" id="rol" value="<?php echo $fila['rol']; ?>">
        </div>
        <button type="submit" name="actualizar" onclick="alertaExito(this)">Actualizar Datos</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../assets/js/sweetalert.js"></script>