<?php 
try {
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "dwes_manana";
    $password = "root";
    $conexion = new PDO($mysql, $user, $password);
    # code...
} catch (\Throwable $e) {
    # code...
}

?>