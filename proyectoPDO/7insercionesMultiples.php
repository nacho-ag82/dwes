<?php 

try {
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "dwes_manana";
    $password = "root";
    $conexion = new PDO($mysql, $user, $password);
    }
catch (PDOException $e)
{
// Mostramos mensaje en caso de error
echo "<p>" .$e->getMessage()."</p>";
exit();
}
try {
$conexion->beginTransaction();
$conexion->query("INSERT INTO productos (nombre, descripcion, precio, stock, categoria)
VALUES ('Nombre1', 'Descripcion1', '12', '10', 'patata1')");
$conexion->query("INSERT INTO productos (nombre, descripcion, precio, stock, categoria)
VALUES ('Nombre2', 'Descripcion2', '12', '10', 'patata2')");
$conexion->query("INSERT INTO productos (nombre, descripcion, precio, stock, categoria)
VALUES ('Nombre3', 'Descripcion3', '12', '10', 'patata1')");
$conexion->query("INSERT INTO productos (nombre, descripcion, precio, stock, categoria)
VALUES ('Nombre4', 'Descripcion4', '12', '10', 'patata2')");
$conexion->commit();
print "<p>Se han introducido los nuevos productos</p>";
} catch (Exception $e)
{
echo "<p>Ha habido algún error</p>";
$conexion->rollback();
}
$conexion = null;
?>