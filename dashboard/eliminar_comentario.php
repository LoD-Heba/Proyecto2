<?php
session_start();
include '../php/conection-be.php';

if (!isset($_SESSION['usuario'])) {
    echo '<script>alert("Debes iniciar sesión para comentar."); window.location.href = "usuarios.php";</script>';
    exit();
}

if (!isset($_SESSION['usuario_id'])) {
    echo '<script>alert("No se pudo identificar el usuario. Inicia sesión nuevamente."); window.location.href = "usuarios.php";</script>';
    exit();
}

if (isset($_GET['id'])) {
    $comentario_id = $_GET['id']; 
    $usuario_id = $_SESSION['usuario_id']; 
    $sql = "DELETE FROM comentarios WHERE id = '$comentario_id' AND usuario_id = '$usuario_id'";

    if (mysqli_query($conection, $sql)) {
        echo '<script> window.location.href = "comentarios.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar el comentario."); window.location.href = "comentarios.php";</script>';
    }
} else {
    echo '<script>alert("No se pudo identificar el comentario."); window.location.href = "comentarios.php";</script>';
}

mysqli_close($conection);
?>
