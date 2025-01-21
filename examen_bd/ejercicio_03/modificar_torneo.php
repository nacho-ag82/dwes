<?php
include_once "../utiles/funciones.php";
include_once "../utiles/config.php";
// Inicializamos las variables
$nombre = "";
$ciudad="";
$superficie_id = "";
$errores = [];

// Obtener el id del torneo desde el parámetro GET
$idTorneo = $_GET["r"] ?? null;

// Validar que se haya recibido un id válido
if (!$idTorneo || !is_numeric($idTorneo)) {
    die("ID de torneo no válido.");
}

// Realizo la consulta para obtener los datos del torneo
try {
    // Configuración de la conexión
    $conexion = conectarPDO($database);
    //Consulta para obtener los datos del torneo
    $consulta = $conexion->prepare("SELECT nombre, ciudad, superficie_id FROM torneos WHERE id = :id");
    $consulta->bindParam(':id', $idTorneo, PDO::PARAM_INT);
    $consulta->execute();
    $registro = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($registro) {
        $nombre = $registro["nombre"];
        $superficie_id = $registro["superficie_id"];
        $ciudad = $registro["ciudad"];
    } else {
        die("Torneo no encontrado.");
    }
} catch (PDOException $e) {
    echo "<p>Error en la conexión a la base de datos: " . $e->getMessage() . "</p>";
    exit();
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogemos los valores enviados
    $nombre = trim($_POST["nombre"]);
    $superficie_id = trim($_POST["superficie_id"]);

    // Validación del nombre
    if (empty($nombre)) {
        $errores["nombre"] = "El nombre del torneo es obligatorio.";
    }else if(!validarLongitudCadena($nombre,3,60)){
        $errores["nombre"] = "El nombre debe tener un minimo de 3 y un maximo de 60 caracteres.";
    }
    $resultado=$conexion->query('SELECT * FROM torneos WHERE nombre LIKE "'.$nombre.'"');
    while ($registro=$resultado->fetch()){
        $errores["nombre"] = "El nombre no puede repetirse";
    }

    // Validación de la superficie
    if (empty($superficie_id) || !is_numeric($superficie_id)) {
        $errores["superficie_id"] = "Debes seleccionar una superficie válida.";
    }

    if (empty($ciudad)) {
        $errores["ciudad"] = "Debes escribir una ciudad válida.";
    }else if(!validarLongitudCadena($ciudad,3,60)){
        $errores["ciudad"] = "La ciudad debe tener un minimo de 3 y un maximo de 60 caracteres.";
    }

    // Si no hay errores, actualizamos el torneo
    if (empty($errores)) {
        try {
            $conexion = conectarPDO($database);
            $conexion->exec('UPDATE torneos SET nombre='.$nombre.', ciudad='.$ciudad.', superficie_id='.$superficie_id.' WHERE id='.$_GET['r']);
            $consulta->execute();
            // Redirigir al listado de torneos después de la actualización
            header("Location: listado.php");
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
    <title>Modificar Torneo</title>
</head>
<body>
    <h1>Modificación de Torneo</h1>
    <form action="modificar_torneo.php?r=<?= htmlspecialchars($idTorneo) ?>" method="POST">
        <fieldset>
            <legend>Datos del Torneo</legend>

            <!-- Campo para el nombre -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($nombre) ?>">
            <br><br>

            <!-- Campo para la ciudad -->
            <label for="nombre">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" value="<?= htmlspecialchars($ciudad) ?>">
            <br><br>

            <!-- Campo para seleccionar superficie -->
            <label for="superficie_id">Superficie:</label>
            <select name="superficie_id" id="superficie_id">
                <option value="">Seleccione una superficie</option>

                <?php
                // Consultamos las superficies disponibles
                $superficies = $conexion->query("SELECT * FROM superficies");
                while ($superficie = $superficies->fetch(PDO::FETCH_ASSOC)) {
                    $selected = ($superficie["id"] == $superficie_id) ? 'selected' : '';
                    echo "<option value='" . $superficie["id"] . "' $selected>" . htmlspecialchars($superficie["nombre"]) . "</option>";
                }
                ?>
            </select>
            <br><br>

            <!-- Botón de envío -->
            <button type="submit">Guardar</button>
        </fieldset>
    </form>
</body>
</html>