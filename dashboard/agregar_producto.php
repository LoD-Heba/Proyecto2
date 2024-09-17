<?php
// Conexión a la base de datos
$conection = mysqli_connect("localhost", "root", "", "club_frijol");

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];

// Subir imagen
$imagen = $_FILES['imagen']['name'];
$ruta = "../assets/img/" . basename($imagen);
move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

// Insertar en la base de datos
$sql = "INSERT INTO productos (nombre, precio, categoria, descripcion, imagen) 
        VALUES ('$nombre', '$precio', '$categoria', '$descripcion', '$imagen')";

if (mysqli_query($conection, $sql)) {
    echo "<script>
            alert('Producto añadido con éxito');
            window.location.href = 'productos.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conection);
}
?>
