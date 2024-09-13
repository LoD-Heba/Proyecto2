<?php 
$id=$_GET['id'];
include("conexion.php");

$sql="DELETE FROM alumnos where id='".$id."'";
$resultado=mysqli_query($conexion,$sql);

if($resultado){
        echo "<script language='JavaScript'>
            alert('Los datos se eliminaron');
            
            location.assign('usuarios.php');
            </script>";            
        }
        else{
            echo "<script language='JavaScript'>
            alert('Los datos no se eliminaron');
            
            location.assign('usuarios.php');
            </script>";            
        }
        mysqli_close($conexion);



?>