<?php
session_start();
include '../php/conection-be.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != '1') {
    echo '<script>alert("No tienes permiso para realizar esta acción."); window.location.href = "comentarios.php";</script>';
    exit();
}

if (isset($_POST['comentarios'])) {
    $comentariosSeleccionados = $_POST['comentarios'];

    // Convertir el array de IDs de comentarios a una cadena separada por comas
    $comentariosIds = implode(',', $comentariosSeleccionados);

    // Eliminar los comentarios seleccionados
    $sql = "DELETE FROM comentarios WHERE id IN ($comentariosIds)";
    if (mysqli_query($conection, $sql)) {
        echo '<script> window.location.href = "comentarios.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar los comentarios."); window.location.href = "comentarios.php";</script>';
    }
} else {
    echo '<script>alert("No se seleccionaron comentarios para eliminar."); window.location.href = "comentarios.php";</script>';
}

mysqli_close($conection);
?>
