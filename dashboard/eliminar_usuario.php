<?php
include '../php/conection-be.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($id != 1) {
        $sqlComentarios = "DELETE FROM comentarios WHERE usuario_id = ?";
        $stmtComentarios = $conection->prepare($sqlComentarios);
        $stmtComentarios->bind_param("i", $id);
        $stmtComentarios->execute();
        $stmtComentarios->close();

        $sql = "DELETE FROM registro_usuario WHERE id = ?";
        $stmt = $conection->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: usuarios.php?");
            exit();
        } else {
            echo "Error al eliminar el usuario.";
        }

        $stmt->close();
    } else {
        header("Location: usuarios.php?mensaje=No puedes eliminar al administrador");
        exit();
    }
} else {
    header("Location: usuarios.php");
}
?>
