<?php 
try {
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "dwes_manana";
    $password = "root";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $conexion = new PDO($mysql, $user, $password);
    $version = $conexion->getAttribute(PDO::ATTR_SERVER_VERSION);
    echo "<p>Conectado a la BBDD</p>";
    echo "Versión: $version";
    
} catch (PDOException $e) {
    echo "<p>" .$e->getMessage()."</p>";
}
    $registros = $conexion->exec('DELETE FROM mensajes WHERE
    mensaje="Texto del Mensaje"');
    $resultado = $conexion->query('select * FROM mensajes');
    while ($registro = $resultado->fetch()) {
    echo "<p>Nombre: ".$registro['nombre']."</p>";
    // O también $registro[1];
    }
    echo "<p>Se han borrado $registros registros.</p>";
    $conexion = null;


?>