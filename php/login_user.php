<?php
session_start();
include 'conection-be.php';

$correo = $_POST['correo'];
$clave = $_POST['clave'];

// Consulta para autenticar al usuario
$login = mysqli_query($conection, "SELECT * FROM registro_usuario WHERE (correo='$correo') AND clave='$clave'");

if (mysqli_num_rows($login) > 0) {
    $row = mysqli_fetch_assoc($login);

    // Guardar datos del usuario en la sesión
    $_SESSION['usuario_id'] = $row['id'];
    $_SESSION['usuario'] = $row['usuario'];
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['correo'] = $row['correo'];
    $_SESSION['foto_perfil'] = $row['foto_perfil'];
    $_SESSION['rol'] = $row['rol'];

    echo '
        <script>
            window.location = "../index.php"; 
        </script>
    ';
} else {
    // Alerta si el login falla
    echo '
        <script>
        alert("Contraseña incorrecta");
        window.location = "../registro.php";
        </script>
    ';
}

mysqli_close($conection);
?>
