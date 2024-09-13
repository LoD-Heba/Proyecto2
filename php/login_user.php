<?php 
    session_start();
    include 'conection-be.php';
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);


    $validar_login = mysqli_query($conection, "SELECT * FROM registro_usuario WHERE correo='$correo' and password='$password'");
        if(mysqli_num_rows($validar_login) > 0){
            $_SESSION['usuario'] = $correo;
            header("location: ../index.php");
            exit;
        }
        else{
            echo '
                <script>
                    // Usuario no existe

                    window.location: "..index.php";
                </script>
            ';
        }


?>