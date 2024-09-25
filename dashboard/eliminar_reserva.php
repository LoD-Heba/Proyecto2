<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit();
}

include '../php/conection-be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reserva_id = $_POST['reserva_id'];

    // Eliminar la reserva
    $sql = "DELETE FROM reservas WHERE id = '$reserva_id' AND usuario_id = '{$_SESSION['usuario_id']}'";
    if (mysqli_query($conection, $sql)) {
        echo '<script> window.location.href = "reservas.php";</script>';
    } else {
        echo '<script>alert("Error al eliminar la reserva."); window.location.href = "reservas.php";</script>';
    }
} else {
    echo '<script>alert("Solicitud inválida."); window.location.href = "reservas.php";</script>';
}

mysqli_close($conection);
?>
