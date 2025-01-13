<?php 
// Incluir el archivo de conexión a la base de datos
require_once("../utiles/conexion_bbdd.php");

$resultado = $conexion->query('SELECT * FROM empleados');
echo "<h3>Listado de la tabla 'empleados':</h3>";
echo "<table border='1'>";
echo "<tr><th>Id</th><th>Nombre</th><th>Email</th><th>Apellidos</th><th>Salario</th><th>Hijos</th><th>Departamento_id</th><th>Pais_id</th></tr>";

/* PDO::FETCH_OBJ devuelve cada fila como un objeto anónimo, donde las columnas 
 * de la base de datos se acceden como propiedades del objeto.
*/
$registro = $resultado->fetchAll(PDO::FETCH_OBJ);

foreach ($registro as $fila) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($fila->id) . "</td>";
    echo "<td>" . htmlspecialchars($fila->nombre) . "</td>";
    echo "<td>" . htmlspecialchars($fila->email) . "</td>";
    echo "<td>" . htmlspecialchars($fila->apellidos) . "</td>";
    echo "<td>" . htmlspecialchars($fila->salario) . "</td>";
    echo "<td>" . htmlspecialchars($fila->hijos) . "</td>";
    echo "<td>" . htmlspecialchars($fila->departamento_id) . "</td>";
    echo "<td>" . htmlspecialchars($fila->pais_id) . "</td>";
    echo "</tr>";
}

echo "</table>";

// Cerrar la conexión
$conexion = null;
?>
<br>
<a href="nuevo.php">Añadir nuevo Empleado a la tabla</a>
