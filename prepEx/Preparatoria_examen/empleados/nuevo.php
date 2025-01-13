<?php
require_once('../utiles/conexion_bbdd.php');

$errores = [];
$nombre = $apellidos = $email = $salario = $hijos = $pais_id = $departamento_id = '';

try {
    // Obtener nacionalidades y departamentos de la base de datos
    $paises = $conexion->query("SELECT id, pais FROM paises")->fetchAll(PDO::FETCH_ASSOC);
    $departamentos = $conexion->query("SELECT id, nombre FROM departamentos")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener datos: " . $e->getMessage());


}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $nombre = trim($_POST['nombre']);
    $apellidos = trim($_POST['apellidos']);
    $email = trim($_POST['email']);
    $salario = trim($_POST['salario']);
    $hijos = trim($_POST['hijos']);
    $pais_id = $_POST['pais_id'];
    $departamento_id = $_POST['departamento_id'];

    // Validar Nombre
    if (strlen($nombre) < 3 || strlen($nombre) > 50) {
        $errores['nombre'] = 'El nombre debe tener entre 3 y 50 caracteres.';
    }

    // Validar Apellidos
    if (strlen($apellidos) < 3 || strlen($apellidos) > 150) {
        $errores['apellidos'] = 'Los apellidos deben tener entre 3 y 150 caracteres.';
    }

    // Validar Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 120) {
        $errores['email'] = 'El correo debe ser válido y no exceder 120 caracteres.';
    }

    // Validar Salario
    if (!is_numeric($salario) || $salario <= 0 || strpos($salario, '.') && strlen(explode('.', $salario)[1]) > 2) {
        $errores['salario'] = 'El salario debe ser un número positivo con hasta 2 decimales.';
    }

    // Validar Número de Hijos
    if (!is_numeric($hijos) || $hijos < 0 || $hijos > 10) {
        $errores['hijos'] = 'El número de hijos debe estar entre 0 y 10.';
    }

    // Validar Nacionalidad
    if (empty($pais_id)) {
        $errores['pais_id'] = 'Debe seleccionar una nacionalidad.';
    }

    // Validar Departamento
    if (empty($departamento_id)) {
        $errores['departamento_id'] = 'Debe seleccionar un departamento.';
    }

    // Si no hay errores, insertar en la base de datos
    if (empty($errores)) {
        try {
            $sql = "INSERT INTO empleados (nombre, apellidos, email, salario, hijos, pais_id, departamento_id) 
                    VALUES (:nombre, :apellidos, :email, :salario, :hijos, :pais_id, :departamento_id)";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([
                ':nombre' => $nombre,
                ':apellidos' => $apellidos,
                ':email' => $email,
                ':salario' => $salario,
                ':hijos' => $hijos,
                ':pais_id' => $pais_id,
                ':departamento_id' => $departamento_id,
            ]);

            header('Location: listado.php');
            exit;
        } catch (PDOException $e) {
            die("Error al insertar el empleado: " . $e->getMessage());
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Empleado</title>
</head>
<body>
    <h1>Nuevo Empleado</h1>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($nombre) ?>">
        <?php if (isset($errores['nombre'])): ?>
            <p style="color: red;"><?= $errores['nombre'] ?></p>
        <?php endif; ?>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="<?= htmlspecialchars($apellidos) ?>">
        <?php if (isset($errores['apellidos'])): ?>
            <p style="color: red;"><?= $errores['apellidos'] ?></p>
        <?php endif; ?>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($email) ?>">
        <?php if (isset($errores['email'])): ?>
            <p style="color: red;"><?= $errores['email'] ?></p>
        <?php endif; ?>

        <label for="salario">Salario:</label>
        <input type="number" step="0.01" name="salario" id="salario" value="<?= htmlspecialchars($salario) ?>">
        <?php if (isset($errores['salario'])): ?>
            <p style="color: red;"><?= $errores['salario'] ?></p>
        <?php endif; ?>

        <label for="hijos">Número de Hijos:</label>
        <input type="number" name="hijos" id="hijos" value="<?= htmlspecialchars($hijos) ?>">
        <?php if (isset($errores['hijos'])): ?>
            <p style="color: red;"><?= $errores['hijos'] ?></p>
        <?php endif; ?>

        <label for="pais_id">Nacionalidad:</label>
        <select name="pais_id" id="pais_id">
            <option value="">Seleccione una nacionalidad</option>
            <?php foreach ($paises as $pais): ?>
                <option value="<?= $pais['id'] ?>" <?= $pais_id == $pais['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($pais['pais']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errores['pais_id'])): ?>
            <p style="color: red;"><?= $errores['pais_id'] ?></p>
        <?php endif; ?>

        <label for="departamento_id">Departamento:</label>
        <select name="departamento_id" id="departamento_id">
            <option value="">Seleccione un departamento</option>
            <?php foreach ($departamentos as $departamento): ?>
                <option value="<?= $departamento['id'] ?>" <?= $departamento_id == $departamento['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($departamento['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($errores['departamento_id'])): ?>
            <p style="color: red;"><?= $errores['departamento_id'] ?></p>
        <?php endif; ?>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
