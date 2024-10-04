<?php
include 'conection-be.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$telefono = $_POST['telefono']; // Nuevo campo de teléfono
$foto_perfil = "uploads/default-avatar.png";

// Verificar si el correo ya existe
$verificarCorreo = mysqli_query($conection, "SELECT * FROM registro_usuario WHERE correo='$correo'");
if (mysqli_num_rows($verificarCorreo) > 0) {
    echo '
        <script>
            alert("El correo ya está registrado");
            window.location = "../registro.php";
        </script>
    ';
    exit();
}

// Verificar si el nombre ya existe
$verificarNombre = mysqli_query($conection, "SELECT * FROM registro_usuario WHERE nombre='$nombre'");
if (mysqli_num_rows($verificarNombre) > 0) {
    echo '
        <script>
            alert("El nombre ya está siendo usado");
            window.location = "../registro.php";
        </script>
    ';
    exit();
}

// Registrar
$registrar = "INSERT INTO registro_usuario(nombre, correo, usuario, clave, telefono, foto_perfil, rol) 
              VALUES('$nombre', '$correo', '$usuario', '$clave', '$telefono', '$foto_perfil', 2)"; // Agregar el campo de teléfono

if (mysqli_query($conection, $registrar)) {
    echo '
        <script>
            alert("Usuario registrado con éxito");
            window.location = "../registro.php";
        </script>
    ';
} else {
    echo '
        <script>
            alert("Error al registrar: ' . mysqli_error($conection) . '");
            window.location = "../registro.php";
        </script>
    ';
}

mysqli_close($conection);
?>
