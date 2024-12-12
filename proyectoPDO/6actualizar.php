<?php
try {
    // Configuración de conexión
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "dwes_manana";
    $password = "root";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // Conexión a la base de datos
    $conexion = new PDO($mysql, $user, $password, $opciones);
    $conexion->exec('UPDATE productos SET precio="2" WHERE id = 1');




   


}
catch (PDOException $e)
{
// Mostramos mensaje en caso de error
echo "<p>" .$e->getMessage()."</p>";
exit();
}
