<?php
session_start();
include '../php/conection-be.php';

$producto_id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id = $producto_id";
$resultado = mysqli_query($conection, $sql);
$producto = mysqli_fetch_assoc($resultado);
?>

<!-- Estilos formulario de reservar -->
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    h1 {
        font-size: 2rem;
        color: #333;
        margin-bottom: 2rem;
        text-align: center;
    }

    form {
        background-color: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        box-sizing: border-box;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        color: #555;
        font-weight: bold;
    }

    input[type="number"] {
        width: 100%;
        padding: 0.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
        box-sizing: border-box;
    }

    button {
        margin-top: 5px;
        margin-bottom: 5px;
        width: 100%;
        padding: 0.75rem;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #218838;
    }

    @media (max-width: 600px) {
        form {
            padding: 1.5rem;
            width: 90%;
        }
    }
</style>

<!-- Form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reservar Producto</title>
</head>

<body>
    <h1>Reservar Producto: <br> <?php echo $producto['nombre']; ?></h1>
    <form action="procesar_reserva.php" method="POST">
        <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
        <input type="hidden" name="return_url" value="<?php echo $_SERVER['HTTP_REFERER']; ?>">
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" required min="1"><br>

        <label for="dias_reserva">Días de reserva (máximo 7):</label>
        <input type="number" name="dias_reserva" id="dias_reserva" required min="1" max="7"><br>

        <button type="submit">Reservar</button>
        <button type="button" onclick="window.history.back()">Cancelar</button>
        
    </form>
</body>

</html>