<?php
include_once "../funciones.php";
include_once "../config.php";
// Inicializamos las variables
$nombre = "";
$anno = "";
$ubicacion = "";
$superficie_id = "";
$errores = [];

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los valores enviados
    $nombre = trim($_POST["nombre"]);
    $anno = trim($_POST["anno"]);
    $ubicacion = trim($_POST["ubicacion"]);
    $superficie_id = trim($_POST["superficie_id"]);

    // Validación del nombre
    if (empty($nombre)) {
        $errores["nombre"] = "El nombre del torneo es obligatorio.";
    } elseif (strlen($nombre) < 3 || strlen($nombre) > 100) {
        $errores["nombre"] = "El nombre debe tener entre 3 y 100 caracteres.";
    }

    // Validación del año
    if (empty($anno) || !is_numeric($anno) || $anno < 1900 || $anno > date("Y")) {
        $errores["anno"] = "El año debe ser un número válido entre 1900 y el año actual.";
    }

    // Validación de la ubicación
    if (empty($ubicacion)) {
        $errores["ubicacion"] = "La ubicación es obligatoria.";
    }

    // Validación de la superficie
    if (empty($superficie_id) || !is_numeric($superficie_id)) {
        $errores["superficie_id"] = "Debes seleccionar una superficie válida.";
    }

    // Si no hay errores, insertamos el nuevo torneo
    if (empty($errores)) {
        try {
            // Configuración de conexión
            $conexion= conectarPDO($database);

            // Consulta preparada para insertar el nuevo torneo
            $consulta = $conexion->prepare("INSERT INTO torneos (nombre, anno, ubicacion, superficie_id) VALUES (?, ?, ?, ?)");
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $anno);
            $consulta->bindParam(3, $ubicacion);
            $consulta->bindParam(4, $superficie_id, PDO::PARAM_INT);
            $consulta->execute();

            // Redirigir al listado de torneos después de la inserción
            header("Location: listado_torneos.php");
            exit();
        } catch (PDOException $e) {
            echo "<p>Error en la conexión a la base de datos: " . $e->getMessage() . "</p>";
            exit();
        }
    } else {
        foreach ($errores as $error) {
            echo "<p>$error</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Torneo</title>
</head>
<body>
    <h1>Inserción de Nuevo Torneo</h1>
    <form action="nuevo_torneo.php" method="POST">
        <fieldset>
            <legend>Datos del Torneo</legend>

            <!-- Campo para el nombre -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
            <br><br>

            <!-- Campo para el año -->
            <label for="anno">Año:</label>
            <input type="number" id="anno" name="anno" value="<?= htmlspecialchars($anno) ?>" min="1900" max="<?= date('Y') ?>">
            <br><br>

            <!-- Campo para la ubicación -->
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" value="<?= htmlspecialchars($ubicacion) ?>">
            <br><br>

            <!-- Campo para seleccionar la superficie -->
            <label for="superficie_id">Superficie:</label>
            <select id="superficie_id" name="superficie_id">
                <option value="">Selecciona una superficie</option>
                <?php
                // Obtener todas las superficies para el desplegable
                $superficies = $conexion->query("SELECT id, nombre FROM superficies");
                while ($superficie = $superficies->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='{$superficie['id']}'>{$superficie['nombre']}</option>";
                }
                ?>
            </select>
            <br><br>

            <!-- Botón de envío -->
            <button type="submit">Añadir</button>
        </fieldset>
    </form>
</body>
</html>