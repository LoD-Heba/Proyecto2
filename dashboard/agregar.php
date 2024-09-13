<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilosadmi.css">
</head>
<body>

    <?php 
        if(isset($_POST['enviar'])){
            //vincular con sql
            $nombre=$_POST['nombre'];
            $nocontrol=$_POST['contraseña'];
            //conectar
            include("conexion.php");
            //insertar datos
            //insert into alumnos(nombre,nocontrol) values($nombre,$nocontrol);
            
            $sql="INSERT INTO alumnos(nombre,nocontrol) VALUES ('".$nombre."','".$nocontrol."')";
            $resultado=mysqli_query($conexion,$sql);

        //ALERTA
            if($resultado){
                echo "<script language='JavaScript'>
                alert('Los datos ingresaron correctamente');
                location.assign('usuarios.php');
                </script>";
            }
            else{
                echo 
                "<script language='JavaScript'>
                alert('ERROR: Los datos son incorrectos');
                location.assign('usuarios.php');
                </script>";
            }
        //FIN ALERT

            mysqli_close($conexion); //Cerrar de conexion
        } 
        else{
    ?>  

    <h1>Agrega nuevos alumnos</h1>
    <!-- Enviar datos del form <//?=$_SERVER['PHP_SELF']?> -->
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" required> <br>
        <label for="">No. Control</label>
        <input type="text" name="nocontrol" required>
        <input type="submit" name="enviar" value="AGREGAR">
        <a href="usuarios.php">Regresar</a>
    </form>
    <?php 
        }
    ?>        
    
</body>
</html>