<?php
session_start();
include '../php/conection-be.php';

if (!isset($_SESSION['usuario_id'])) {
    echo '<script>alert("Debes iniciar sesión para reservar."); window.location.href = "../registro.php";</script>';
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_id = $_POST['producto_id'];
    $usuario_id = $_SESSION['usuario_id'];
    $cantidad = $_POST['cantidad'];
    $dias_reserva = $_POST['dias_reserva'];
    $return_url = $_POST['return_url']; 

    // Introducir datos
    $sql = "INSERT INTO reservas (producto_id, usuario_id, cantidad, dias_reserva) 
            VALUES ('$producto_id', '$usuario_id', '$cantidad', '$dias_reserva')";

    if (mysqli_query($conection, $sql)) {
        echo '<script>alert("Reserva realizada exitosamente."); window.location.href = "' . $return_url . '";</script>'; //sweetalert
    } else {
        echo '<script>alert("Error al procesar la reserva."); window.location.href = "' . $return_url . '";</script>'; //Sweetalert
    }
} else {
    echo '<script>alert("Solicitud inválida."); window.location.href = "reservar_producto.php";</script>';
}

mysqli_close($conection);
?>
