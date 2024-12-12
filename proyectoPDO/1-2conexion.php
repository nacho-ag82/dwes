<?php 
try {
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "dwes_manana";
    $password = "root";
    $conexion = new PDO($mysql, $user, $password);
    echo "<p>Conectado a la BBDD</p>";
    print_r(PDO::getAvailableDrivers());
} catch (PDOException $e) {
    echo "<p>" .$e->getMessage()."</p>";
}

?>