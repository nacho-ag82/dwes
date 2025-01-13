<?php 
    /*
    *conexion para examen
    *
    try {
        // configuracion de conexion a la base de datos.
        $mysql = "mysql:host=localhost;dbname=dwes_manana_empresa;charset=UTF8";
        $user = "dwes_manana";
        $password = "dwes_2024";
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        // Conexion a la base de datos.
        $conexion = new PDO($mysql, $user, $password, $opciones);
    }*/
    /*conexion propia*/
    try {
        $mysql = "mysql:host=localhost;dbname=dwes_manana_empresa;charset=UTF8";
        $user = "root";
        $conexion = new PDO($mysql, $user);
    } 
    catch (PDOException $e)
    {
        // Mostramos mensaje en caso de error
        echo "<p>" .$e->getMessage()."</p>";
    }

?>