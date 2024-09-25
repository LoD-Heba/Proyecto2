<?php
session_start();
include '../php/conection-be.php';

if (!isset($_SESSION['usuario_id'])) {
    echo '<script>alert("Debes iniciar sesión para cancelar una reserva."); window.location.href = "../registro.php";</script>';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reserva_id'])) {
    $reserva_id = $_POST['reserva_id'];
    $usuario_id = $_SESSION['usuario_id'];

    // Verificar que la reserva le pertenezca al usuario actual
    $sql_verificar = "SELECT * FROM reservas WHERE id='$reserva_id' AND usuario_id='$usuario_id'";
    $resultado_verificar = mysqli_query($conection, $sql_verificar);

    if (mysqli_num_rows($resultado_verificar) > 0) {

        // Eliminar la reserva
        $sql_cancelar = "DELETE FROM reservas WHERE id='$reserva_id'";
        if (mysqli_query($conection, $sql_cancelar)) {
            echo '<script> window.location.href = "perfil.php";</script>';
        } else {
            echo '<script> window.location.href = "perfil.php";</script>';
        }
    } else {
        echo '<script>alert("No tienes permiso para cancelar esta reserva."); window.location.href = "perfil.php";</script>';
    }
} else {
    echo '<script>alert("Solicitud inválida."); window.location.href = "perfil.php";</script>';
}
