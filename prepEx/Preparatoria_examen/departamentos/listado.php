<?php 
// Incluir el archivo de conexión a la base de datos
require_once("../utiles/conexion_bbdd.php");

$resultado = $conexion->query('SELECT * FROM departamentos');
echo "<h3>Listado de la tabla 'DEPARTAMENTOS':</h3>";
echo "<table border='1'>";
echo "<tr><th>Id</th><th>Nombre</th><th>Presupuesto</th><th>Sede_id</th></tr>";

// Vincular las columnas a variables
$resultado->bindColumn('id', $id);
$resultado->bindColumn('nombre', $nombre);
$resultado->bindColumn('presupuesto', $presupuesto);
$resultado->bindColumn('sede_id', $sede_id);

/* PDO::FETCH_BOUND asigna las columnas de la fila a variables previamente
 * vinculadas mediante bindColumn, permitiendo acceder directamente a 
 * sus valores.
*/
while ($resultado->fetch(PDO::FETCH_BOUND)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($id) . "</td>";
    echo "<td>" . htmlspecialchars($nombre) . "</td>";
    echo "<td>" . htmlspecialchars($presupuesto) . "</td>";
    echo "<td>" . htmlspecialchars($sede_id) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Cerrar la conexión
$conexion = null;
?>
<br>
<a href="nuevo.php">Añadir nuevo Departamento a la tabla</a>