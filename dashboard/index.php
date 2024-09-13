<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        function confirmar (){
            return confirm('¿Estas seguro?');
        }
    </script>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<!-- Conexion -->
<?php 
include("conexion.php");
$sql="SELECT * FROM alumnos";
$resultado=mysqli_query($conexion,$sql);
?>
<!-- Fin conexion -->
    <h1>Lista de alumnos</h1>
    <a href="agregar.php">Agrar alumno</a> <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>No. Control</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php 
            while($filas = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <th><?php echo $filas['id']?></th>
                <th><?php echo $filas['nombre']?></th>
                <th><?php echo $filas['nocontrol']?></th>
                <th>
                    <?php echo "<a href='editar.php?id=".$filas['id']."'>Editar</a>";?>
                    -
                    <?php echo "<a href='eliminar.php?id=".$filas['id']."' onclick='return confirmar ()'>Eliminar</a>";?>
                </th>
                
            
                </tr>
    
            <?php 
            }
            ?>
        </tbody>

    </table>
            <?php 
                mysqli_close($conexion);
            ?>
</body>
</html>