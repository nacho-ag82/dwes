<?php

use App\Models\Clase;

session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    exit();
}

require_once 'autoload.php';

$claseNombre = $_GET['clase'];
$dia = $_GET['dia'];
$action = $_GET['action'];

$clase = Clase::findClaseByName($claseNombre);
if (!$clase) {
    echo "Clase no encontrada.";
    exit();
}

$resultado = false;
$accionRealizada = '';

if ($action === 'reservar') {
    $resultado = $clase->reservarPlaza($dia);
    $accionRealizada = $resultado ? "Reserva realizada" : "No se pudo reservar";
} elseif ($action === 'liberar') {
    $resultado = $clase->liberarPlaza($dia);
    $accionRealizada = $resultado ? "Liberación realizada" : "No se pudo liberar";
}

$contenido = $accionRealizada . "\n";
$contenido .= "Clase: $claseNombre\n";
$contenido .= "Día: $dia\n";

header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="gim.txt"');
echo $contenido;
exit();
