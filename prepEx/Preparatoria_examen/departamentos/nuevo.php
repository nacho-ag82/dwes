<?php
require_once('../utiles/conexion_bbdd.php');

$errores = [];
$nombre = $presupuesto = $sede_id = '';

try {
    $sedes = $conexion->query("SELECT id, nombre FROM sedes")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener sedes: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $presupuesto = trim($_POST['presupuesto']);
    $sede_id = $_POST['sede_id'];

    // Validar el nombre
    if (strlen($nombre) < 3 || strlen($nombre) > 100) {
        $errores['nombre'] = 'El nombre debe tener entre 3 y 100 caracteres.';
    }

    // Validar el presupuesto
    if (!is_numeric($presupuesto) || $presupuesto <= 0) {
        $errores['presupuesto'] = 'El presupuesto debe ser un número entero positivo.';
    }

    // Validar la sede
    if (empty($sede_id)) {
        $errores['sede_id'] = 'Debe seleccionar una sede.';
    }

    // Verificar que el nombre sea único
    $resultado = $conexion->prepare("SELECT COUNT(*) FROM departamentos WHERE nombre = :nombre");
    $resultado->execute([':nombre' => $nombre]);
    if ($resultado->fetchColumn() > 0) {
        $errores['nombre'] = 'Ya existe un departamento con este nombre.';
    }

    // Si no hay errores, insertar en la base de datos
    if (empty($errores)) {
        try {
            $sql = "INSERT INTO departamentos (nombre, presupuesto, sede_id) VALUES (:nombre, :presupuesto, :sede_id)";
            $resultado = $conexion->prepare($sql);
            $resultado->execute([':nombre' => $nombre, ':presupuesto' => $presupuesto, ':sede_id' => $sede_id]);

            header('Location: listado.php');
            exit;
        } catch (PDOException $e) {
            die("Error al insertar el departamento: " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Departamento</title>
</head>
<body>
    <h1>Nuevo Departamento</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <?php if (isset($errores['nombre'])): ?>
            <p style="color: red;"><?= $errores['nombre'] ?></p>
        <?php endif; ?>

        <label for="presupuesto">Presupuesto:</label>
        <input type="number" name="presupuesto" id="presupuesto" value="<?= htmlspecialchars($presupuesto) ?>">
        <?php if (isset($errores['presupuesto'])): ?>
            <p style="color: red;"><?= $errores['presupuesto'] ?></p>
        <?php endif; ?>

        <label for="sede_id">Sede:</label>
        <select name="sede_id" id="sede_id">
            <option value="">Seleccione una sede</option>
            <?php foreach ($sedes as $sede): ?>
                <option value="<?= $sede['id'] ?>" <?= $sede_id == $sede['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($sede['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errores['sede_id'])): ?>
            <p style="color: red;"><?= $errores['sede_id'] ?></p>
        <?php endif; ?>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>