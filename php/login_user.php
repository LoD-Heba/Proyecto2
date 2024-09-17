<?php 
    session_start();
    include 'conection-be.php';
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $_SESSION['correo'] = $correo;

    $conection=mysqli_connect("localhost", "root", "", "club_frijol");
    $consulta= "SELECT * FROM registro_usuario WHERE correo='$correo' and clave='$clave'";
    $resultado=mysqli_query($conection,$consulta);
    $filas=mysqli_num_rows($resultado);

        if(mysqli_num_rows($resultado) > 0){
            
            echo '
                <script>
                    alert("Bienvenido");
                    window.location = "../registro.php";
                </script>
            ';
            exit;
        }
        else {
            echo '
                <script>
                    alert("Usuario o contraseña incorrectos");
                    window.location = "../registro.php";
                </script>
            ';
        }
        


?>

<!-- Validar -->
<?php 

session_start();
error_reporting();

$validar=$_SESSION['nombre'];

if($validar==null || $validar='');
    header("Location: ../registro");
    die();

?>

