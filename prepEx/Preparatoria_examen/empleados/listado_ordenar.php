<?php
require_once('../utiles/conexion_bbdd.php');

// Obtener el campo y el orden para la consulta
$campo = isset($_GET['campo']) ? $_GET['campo'] : 'nombre';
$orden = isset($_GET['orden']) && $_GET['orden'] === 'DESC' ? 'DESC' : 'ASC';

// Validar el campo para prevenir inyecciones SQL
$campos_validos = ['nombre', 'apellidos', 'email', 'salario', 'hijos', 'departamento', 'sede'];
if (!in_array($campo, $campos_validos)) {
    die("Campo de ordenación no válido.");
}

try {
    $sql = "SELECT e.nombre, e.apellidos, e.email, e.salario, e.hijos, d.nombre AS departamento, s.nombre AS sede 
            FROM empleados e 
            JOIN departamentos d ON e.departamento_id = d.id 
            JOIN sedes s ON d.sede_id = s.id 
            ORDER BY $campo $orden";
    $resultado = $conexion->query($sql);
    $empleados = $resultado->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados con Ordenación</title>
</head>
<body>
    <h1>Listado de Empleados con Ordenación</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre <a href="?campo=nombre&orden=ASC">&#8593;</a> <a href="?campo=nombre&orden=DESC">&#8595;</a></th>
                <th>Apellidos <a href="?campo=apellidos&orden=ASC">&#8593;</a> <a href="?campo=apellidos&orden=DESC">&#8595;</a></th>
                <th>Email <a href="?campo=email&orden=ASC">&#8593;</a> <a href="?campo=email&orden=DESC">&#8595;</a></th>
                <th>Salario <a href="?campo=salario&orden=ASC">&#8593;</a> <a href="?campo=salario&orden=DESC">&#8595;</a></th>
                <th>Hijos <a href="?campo=hijos&orden=ASC">&#8593;</a> <a href="?campo=hijos&orden=DESC">&#8595;</a></th>
                <th>Departamento <a href="?campo=departamento&orden=ASC">&#8593;</a> <a href="?campo=departamento&orden=DESC">&#8595;</a></th>
                <th>Sede <a href="?campo=sede&orden=ASC">&#8593;</a> <a href="?campo=sede&orden=DESC">&#8595;</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empleados as $empleado): ?>
                <tr>
                    <td><?= htmlspecialchars($empleado->nombre) ?></td>
                    <td><?= htmlspecialchars($empleado->apellidos) ?></td>
                    <td><?= htmlspecialchars($empleado->email) ?></td>
                    <td><?= number_format($empleado->salario, 2) ?> €</td>
                    <td><?= htmlspecialchars($empleado->hijos) ?></td>
                    <td><?= htmlspecialchars($empleado->departamento) ?></td>
                    <td><?= htmlspecialchars($empleado->sede) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>