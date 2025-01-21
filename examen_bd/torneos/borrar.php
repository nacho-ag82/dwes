<?php
include_once "../funciones.php";
include_once "../config.php";
// Verificamos si se ha recibido el ID del torneo
if (isset($_GET['r'])) {
    $idTorneo = $_GET['r'];

    // Verificar que el ID sea un número
    if (!is_numeric($idTorneo)) {
        echo "ID de torneo no válido.";
        exit();
    }

    try {
        // Configuración de la conexión a la base de datos
        $conexion = conectarPDO($database);
        // Intentamos borrar el torneo
        $sql = "DELETE FROM torneos WHERE id = :id";
        $consulta = $conexion->prepare($sql);
        $consulta->bindParam(':id', $idTorneo, PDO::PARAM_INT);
        $consulta->execute();

        // Verificamos si el torneo fue eliminado
        if ($consulta->rowCount() > 0) {
            echo "Torneo eliminado con éxito.";
        } else {
            echo "No ha sido posible eliminar el torneo.";
        }

        // Cerrar la conexión
        $conexion = null;

    } catch (PDOException $e) {
        // En caso de error en la conexión o consulta
        echo "Error: " . $e->getMessage();
        exit();
    }
} else {
    // Si no se ha recibido un ID de torneo
    echo "No se ha recibido un ID válido.";
}
?>
<br><br>
<!-- Enlace para regresar a la página de listado -->
<a href="listaTorneos.php">Volver al listado de torneos</a>