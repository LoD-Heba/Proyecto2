<?php 
    include("conexion.php");
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilosadmi.css">
</head>
<body>
    <?php 
        if (isset($_POST['enviar'])){
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $nocontrol=$_POST['nocontrol'];

            $sql="UPDATE alumnos SET nombre='".$nombre."', 
            nocontrol='".$nocontrol."' where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);

            if($resultado){
                echo "<script language='JavaScript'>
                    alert('Los datos se actualizaron');
                    
                    location.assign('usuarios.php');
                    </script>";            
                }
                else{
                    echo "<script language='JavaScript'>
                    alert('Los datos no se actualizaron');
                    
                    location.assign('usuarios.php');
                    </script>";            
                }
                mysqli_close($conexion);
        }
        else{
        // $id=$_GET['id'];
        // $sql="SELECT * FROM escuela where id='".$id."'";
        // $resultado=mysqli_query($conexion,$sql);
        // $fila=mysqli_fetch_assoc($resultado);
            $id=$_GET['id'];
            $sql="SELECT * FROM alumnos where id='".$id."'";
            $resultado=mysqli_query($conexion,$sql);
            
            $fila=mysqli_fetch_assoc($resultado);
            $nombre=$fila['nombre'];
            $nocontrol=$fila['nocontrol'];

            mysqli_close($conexion); 
    ?>
    <h1>Editar tabla</h1>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">

        <label for="">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"> <br>

        <label for="">No. control</label>
        <input type="text" name="nocontrol" value="<?php echo $nocontrol; ?>"> <br>

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" name="enviar" value="ACTUALIZAR">
        <a href="usuarios.php">Regresar</a>


    </form>
    <?php 
        }
    ?>
</body>
</html>