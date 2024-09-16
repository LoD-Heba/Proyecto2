<?php
    $conection = mysqli_connect("localhost", "root","","club_frijol");
        
    if (!$conection) {
        die("Error de conexión: " . mysqli_connect_error());
    }
?>