<?php
// Conexión a la base de datos
$conection = mysqli_connect("localhost", "root", "", "club_frijol");

// Obtener el ID del usuario a eliminar
$id = $_GET['id'];

// Eliminar el registro del usuario
$sql = "DELETE FROM registro_usuario WHERE id = $id";

if (mysqli_query($conection, $sql)) {
    echo "Registro eliminado correctamente";
    header("Location: usuarios.php");
} else {
    echo "Error: " . mysqli_error($conection);
}
?>
