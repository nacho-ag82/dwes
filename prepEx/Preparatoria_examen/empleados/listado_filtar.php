<?php
require_once('../utiles/conexion_bbdd.php');

// Recoger los valores del formulario
$hijos = isset($_GET['hijos']) ? (int)$_GET['hijos'] : null;
$salario_min = isset($_GET['salario_min']) ? (float)$_GET['salario_min'] : null;
$salario_max = isset($_GET['salario_max']) ? (float)$_GET['salario_max'] : null;
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : null;

$criterios = [];
$params = [];

if (!is_null($hijos)) {
    $criterios[] = "e.hijos = ?";
    $params[] = $hijos;
}
if (!is_null($salario_min)) {
    $criterios[] = "e.salario >= ?";
    $params[] = $salario_min;
}
if (!is_null($salario_max)) {
    $criterios[] = "e.salario <= ?";
    $params[] = $salario_max;
}
if (!is_null($busqueda)) {
    $criterios[] = "(e.nombre LIKE '%$busqueda%' OR e.apellidos LIKE '%$busqueda%' OR e.email LIKE '%$busqueda%')";
}

// Cambiar la forma de construir el WHERE para que funcione con un solo filtro
$where = count($criterios) > 0 ? "WHERE " . implode(" AND ", $criterios) : "";

try {
    $sql = "SELECT e.nombre, e.apellidos, e.email, e.salario, e.hijos, d.nombre AS departamento, s.nombre AS sede 
            FROM empleados e 
            JOIN departamentos d ON e.departamento_id = d.id 
            JOIN sedes s ON d.sede_id = s.id 
            $where";
    $resultado = $conexion->prepare($sql);
    $resultado->execute($params);
    $empleados = $resultado->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados con Filtros</title>
</head>
<body>
    <h1>Listado de Empleados con Filtros</h1>
    <form method="GET" action="">
        <fieldset>
            <legend>Filtros</legend>

            <label for="busqueda">Buscar:</label>
            <input type="text" name="busqueda" id="busqueda">
            <br><br>
            <label for="salario_min">Salario mínimo:</label>
            <input type="number" step="0.01" name="salario_min" id="salario_min">
            <label for="salario_max">Salario máximo:</label>
            <input type="number" step="0.01" name="salario_max" id="salario_max">
            <br><br>
            <label for="hijos">Número de hijos:</label>
            <select id="hijos" name="hijos">
                <option value="">Seleccioname el numero de hijos...</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            <br><br>
            <button type="submit">Filtrar</button>
        </fieldset>
    </form>
    <hr>
    <?php if (count($empleados) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Salario</th>
                    <th>Hijos</th>
                    <th>Departamento</th>
                    <th>Sede</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($empleados as $empleado): ?>
                    <tr>
                        <td><?= htmlspecialchars($empleado['nombre']) ?></td>
                        <td><?= htmlspecialchars($empleado['apellidos']) ?></td>
                        <td><?= htmlspecialchars($empleado['email']) ?></td>
                        <td><?= number_format($empleado['salario'], 2) ?> €</td>
                        <td><?= htmlspecialchars($empleado['hijos']) ?></td>
                        <td><?= htmlspecialchars($empleado['departamento']) ?></td>
                        <td><?= htmlspecialchars($empleado['sede']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron empleados con los criterios especificados.</p>
    <?php endif; ?>
</body>
</html>
