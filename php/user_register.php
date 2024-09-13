<?php 
        // llave
        include 'conection-be.php'; 
        
        
        
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        // Encriptar

        $password = hash('sha512', $password);

        $registrar =   "INSERT INTO registro_usuario(nombre, correo, usuario, password) 
                    VALUES('$nombre', '$correo', '$usuario', '$password')";
                                // llave

                                
        // Verificar registro repetido
        $verificar = mysqli_query($conection, "SELECT * FROM registro_usuario WHERE correo='$correo'");
                if(mysqli_num_rows($verificar) > 0){
                        echo '
                                <script>
                                alert("El correo ya está siendo usado");
                                window.location = "../registro.php";
                                </script>
                        ';
                        exit();
                }

         $verificar = mysqli_query($conection, "SELECT * FROM registro_usuario WHERE nombre='$nombre'");
                if(mysqli_num_rows($verificar) > 0){
                        echo '
                                <script>
                                alert("El nombre ya está siendo usado");
                                window.location = "../registro.php";
                                </script>
                        ';
                        exit();
                }        

        $ejecutar = mysqli_query($conection, $registrar);    
        if ($ejecutar){
                echo '
                        <script>
                                alert("Registrado exitosamente");
                                window.location = "../registro.php";
                                
                        </script>
                ';
        }
        else {
                echo '
                        <script>
                                alert("Intente de nuevo");
                                window.location = "../registro.php";
                                
                        </script>
                ';
        }

        mysqli_close($conection);
?>