<?php
// Conectar a la base de datos
include '../php/conection-be.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar que el ID no sea del administrador
    if ($id != 1) {
        // Eliminar los comentarios asociados al usuario
        $sqlComentarios = "DELETE FROM comentarios WHERE usuario_id = ?";
        $stmtComentarios = $conection->prepare($sqlComentarios);
        $stmtComentarios->bind_param("i", $id);
        $stmtComentarios->execute();
        $stmtComentarios->close();

        // Ahora eliminar el usuario
        $sql = "DELETE FROM registro_usuario WHERE id = ?";
        $stmt = $conection->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirigir a la página de usuarios con un mensaje de éxito
            header("Location: usuarios.php?mensaje=Usuario eliminado con éxito");
            exit();
        } else {
            // Manejar errores en caso de fallo en la eliminación
            echo "Error al eliminar el usuario.";
        }

        $stmt->close();
    } else {
        // Si el ID es del administrador, muestra un mensaje y no lo elimines
        header("Location: usuarios.php?mensaje=No puedes eliminar al administrador");
        exit();
    }
} else {
    // Si no hay un ID en la URL
    header("Location: usuarios.php");
}
?>
