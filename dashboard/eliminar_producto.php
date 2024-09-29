<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

$conection = mysqli_connect("localhost", "root", "", "club_frijol");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Eliminar las reservas relacionadas
    $sql_reservas = "DELETE FROM reservas WHERE producto_id = $id";
    mysqli_query($conection, $sql_reservas); 

    $sql = "DELETE FROM productos WHERE id = $id";

    if (mysqli_query($conection, $sql)) {
        
        echo '<script>window.location.href = "productos.php";</script>';
    } else {
        echo '<script>window.location.href = "productos.php";</script>';
    }
} else {
    echo '<script>window.location.href = "productos.php";</script>';
}

mysqli_close($conection);
?>
