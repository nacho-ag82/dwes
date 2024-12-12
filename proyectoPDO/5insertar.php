<?php
try {
    // Configuración de conexión
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "dwes_manana";
    $password = "root";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // Conexión a la base de datos
    $conexion = new PDO($mysql, $user, $password, $opciones);
    $consulta = $conexion->prepare('INSERT INTO productos (nombre, descripcion, precio, strock, categoria) values (?,?,?,?,?)');
    $nombre = $_REQUEST['nombre'];
    $descripcion = $_REQUEST['descripcion'];
    $precio = $_REQUEST['precio'];
    $stock = $_REQUEST['stock'];
    $categoria = $_REQUEST['categoria'];
    $consulta->bindParam(1, $nombre);
    $consulta->bindParam(2, $descripcion);
    $consulta->bindParam(3, $precio);
    $consulta->bindParam(4, $stock);
    $consulta->bindParam(5, $categoria);

    $consulta->execute();


}
catch (PDOException $e)
{
// Mostramos mensaje en caso de error
echo "<p>" .$e->getMessage()."</p>";
exit();
}
