<?php 
    // Incluir el archivo de conexion a la base de datos
    require_once("../utiles/conexion_bbdd.php");

    $resultado = $conexion->query('select * FROM sedes');
    echo "<h3>Listado de la tabla 'SEDES':</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Nombre</th><th>Direccion</th></tr>";

    /* PDO::FETCH_ASSOC devuelve cada fila como un array asociativo, donde las claves son los nombres 
     * de las columnas de la base de datos.
    */
    $registro = $resultado->fetchAll(PDO::FETCH_ASSOC);

    foreach ($registro as $fila) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['direccion']) . "</td>";
        echo "</tr>";

    }
    echo "</table>";

    

$conexion = null;

?>
<br>
<a href="nuevo.php">Añadir nueva Sede a la tabla</a>