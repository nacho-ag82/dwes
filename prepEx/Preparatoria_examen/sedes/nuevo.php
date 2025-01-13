<?php
require_once('../utiles/conexion_bbdd.php');

$errores = [];
$nombre = $direccion = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $direccion = trim($_POST['direccion']);

    // Validar el nombre
    if (strlen($nombre) < 3 || strlen($nombre) > 50) {
        $errores['nombre'] = 'El nombre debe tener entre 3 y 50 caracteres.';
    }

    // Validar la dirección
    if (strlen($direccion) < 10 || strlen($direccion) > 255) {
        $errores['direccion'] = 'La dirección debe tener entre 10 y 255 caracteres.';
    }

    // Si no hay errores, insertar en la base de datos
    if (empty($errores)) {
        try {
            $sql = "INSERT INTO sedes (nombre, direccion) VALUES (:nombre, :direccion)";
            $resultado = $conexion->prepare($sql);
            $resultado->execute([':nombre' => $nombre, ':direccion' => $direccion]);

            header('Location: listado.php');
            exit;
        } catch (PDOException $e) {
            die("Error al insertar la sede: " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Sede</title>
</head>
<body>
    <h1>Nueva Sede</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <?php if (isset($errores['nombre'])): ?>
            <p style="color: red;"><?= $errores['nombre'] ?></p>
        <?php endif; ?>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" value="<?= htmlspecialchars($direccion) ?>">
        <?php if (isset($errores['direccion'])): ?>
            <p style="color: red;"><?= $errores['direccion'] ?></p>
        <?php endif; ?>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
