<?php
session_start();  // Iniciar la sesión
include 'funciones.php';

// La siguiente clave se crea cuando se inicia sesión (llamada a la página)
$_SESSION["timeout"] = time();
// Establecer tiempo de vida de la sesión en segundos
$inactividad = 20;
// Comprobar si $_SESSION["timeout"] está establecida
if(isset($_SESSION["timeout"])){
    // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
    $sessionTTL = time() - $_SESSION["timeout"];
    if($sessionTTL > $inactividad){
        unset($_SESSION['asientos_seleccionados']);
        header("Location: index.php");
        exit();  // Añadir exit aquí para evitar que se ejecute más código.   
    }
}




// Obtener los parámetros de la URL
$pelicula_id = $_GET['pelicula_id'];
$sesion_id = $_GET['sesion_id'];

// Obtener los asientos disponibles para la sesión seleccionada
$asientos_disponibles = obtenerAsientosDisponibles($pelicula_id, $sesion_id);

// Configuración del cine (5 filas y 6 asientos por fila)
$fila_count = 5;
$asientos_por_fila = 6;

// Verificar si el formulario fue enviado con la selección de asientos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['asientos'])) {
    // Obtener los asientos seleccionados
    $asientos_seleccionados = $_POST['asientos'];

    // Verificar que los asientos seleccionados sean válidos
    foreach ($asientos_seleccionados as $asiento) {
        if (!in_array($asiento, $asientos_disponibles)) {
            echo "El asiento $asiento ya está ocupado o no es válido. Por favor, selecciona otros asientos.";
            exit();
        }
    }

    // Guardar los asientos seleccionados en la sesión
    $_SESSION['asientos_seleccionados'] = $asientos_seleccionados;

    // Actualizar los asientos ocupados en el archivo JSON
    actualizarAsientosOcupados($sesion_id, $asientos_seleccionados);

    // Redirigir a la página de pago
    header("Location: pago.php?pelicula_id=$pelicula_id&sesion_id=$sesion_id");
    exit();
}

// Mostrar los asientos disponibles como una matriz
echo "<h1>Selecciona tus asientos para la sesión de " . obtenerSesion($sesion_id) . ":</h1>";
echo "<form method='POST' action='seleccion_asientos.php?pelicula_id=$pelicula_id&sesion_id=$sesion_id'>";
echo "<table style='border: 1px solid black; border-collapse: collapse;'>";

// Generar las filas de asientos
for ($i = 1; $i <= $fila_count; $i++) {
    echo "<tr>";  // Iniciar una fila
    for ($j = 1; $j <= $asientos_por_fila; $j++) {
        $asiento_numero = ($i - 1) * $asientos_por_fila + $j;  // Calcular el número de asiento
        $estado_asiento = in_array($asiento_numero, $asientos_disponibles) ? 'disponible' : 'ocupado'; // Verificar si el asiento está disponible
        $disabled = ($estado_asiento == 'ocupado') ? 'disabled' : '';  // Deshabilitar los asientos ocupados
        $checked = (in_array($asiento_numero, $_SESSION['asientos_seleccionados'] ?? [])) ? 'checked' : '';  // Marcar como seleccionado si el asiento está en la selección actual

        echo "<td style='width: 50px; height: 50px; text-align: center;'>";
        echo "<label>";
        echo "<input type='checkbox' name='asientos[]' value='$asiento_numero' $disabled $checked> $asiento_numero";
        echo "</label>";
        echo "</td>";
    }
    echo "</tr>";  // Cerrar la fila
}

echo "</table>";
echo "<button type='submit'>Confirmar selección de asientos</button>";
echo "</form>";
?>
