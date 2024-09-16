<?php 
        // llave
        include 'conection-be.php'; 
        
        
        
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];

        // Encriptar

        $registrar =   "INSERT INTO registro_usuario(nombre, correo, usuario, clave) 
                    VALUES('$nombre', '$correo', '$usuario', '$clave')";
                    if (mysqli_query($conection, $registrar)) {
                        echo "Usuario registrado con éxito";
                    } else {
                        echo "Error: " . mysqli_error($conection);
                    }

        // llave

                                
        // Verificar registro repetido
        $verificar = mysqli_query($conection, "SELECT * FROM registro_usuario WHERE correo='$correo'");
                if(mysqli_num_rows($verificar) > 0){
                        echo '
                                <script>
                                alert("Registrado");
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
        // Fin Verificar

        // Registro exitoso o error
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
        //Fin registro
        mysqli_close($conection);
?>