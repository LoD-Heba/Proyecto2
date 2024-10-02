<?php
session_start();
include 'php/conection-be.php';


if (!isset($_SESSION['usuario'])) {
    echo '<script>alert("Debes iniciar sesión para comentar."); window.location.href = "php/login_user.php";</script>';
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$comentario = $_POST['comentario'];

// Insertar el comentario en la base de datos
$sql = "INSERT INTO comentarios (usuario_id, comentario) VALUES ('$usuario_id', '$comentario')";
if (mysqli_query($conection, $sql)) {
    echo '<script>window.location.href = "index.php";</script>'; //sweetalert
} else {
    echo '<script>alert("Error al guardar el comentario."); window.location.href = "index.php";</script>'; //sweetalert
}

mysqli_close($conection);
?>
