<?php
try {
    // Configuración de conexión
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "dwes_manana";
    $password = "root";
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    // Conexión a la base de datos
    $conexion = new PDO($mysql, $user, $password, $opciones);
    $resultado = $conexion->query('select * FROM mensajes');
    echo "<h3>Registros en la tabla 'mensajes2':</h3>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Mensaje</th></tr>";

    foreach ($resultado as $fila) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['mensaje']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";

$conexion = null;
}
catch (PDOException $e)
{
// Mostramos mensaje en caso de error
echo "<p>" .$e->getMessage()."</p>";
}
?>