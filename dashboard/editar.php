<?php
// Conexión a la base de datos
$conection = mysqli_connect("localhost", "root", "", "club_frijol");

// Obtener el ID del usuario a editar
$id = $_GET['id'];

// Obtener los datos del usuario
$sql = "SELECT * FROM registro_usuario WHERE id = $id";
$resultado = mysqli_query($conection, $sql);
$fila = mysqli_fetch_assoc($resultado);

// Si se ha enviado el formulario, actualizar el registro
if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];

    $sql_update = "UPDATE registro_usuario SET nombre='$nombre', correo='$correo', usuario='$usuario' WHERE id=$id";
    
    if (mysqli_query($conection, $sql_update)) {
        echo "Registro actualizado correctamente";
        // Redirigir a la página de la lista
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conection);
    }
}
?>

<!-- Formulario para editar el usuario -->
<h2>Editar Usuario</h2>
<form action="" method="post">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?php echo $fila['nombre']; ?>"><br>

    <label>Correo:</label><br>
    <input type="email" name="correo" value="<?php echo $fila['correo']; ?>"><br>

    <label>Usuario:</label><br>
    <input type="text" name="usuario" value="<?php echo $fila['usuario']; ?>"><br>

    <input type="submit" name="actualizar" value="Actualizar">
</form>
