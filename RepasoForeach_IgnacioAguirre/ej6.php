<?php 
include 'matriz.php';
//se pide crear un sistema de búsqueda avanzado que
//permita buscar por nombre de comunidad, provincia o capital, y mostrar resultados
//relevantes:
// Función para buscar en el array
function buscarEnComunidades($comunidades, $buscar) {
    $resultados = [];

    // Recorremos el array de comunidades
    foreach ($comunidades as $comunidad => $datos) {
        // Comprobamos si el nombre de la comunidad contiene el término de búsqueda
        if (strpos($comunidad, $buscar) !== false) {
            $resultados['comunidad'][] = $comunidad;
        }

        // Buscamos en las provincias de la comunidad
        foreach ($datos['provincias'] as $provincia) {
            if (strpos($provincia, $buscar) !== false) {
                $resultados['provincia'][$comunidad][] = $provincia;
            }
        }

        // Buscamos en las capitales de la comunidad
        foreach ($datos['capital'] as $capital => $info) {
            if (strpos($capital, $buscar) !== false) {
                $resultados['capital'][$comunidad][] = $capital;
            }
        }
    }

    return $resultados;
}

// Si se ha enviado el formulario con un término de búsqueda
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['buscar'])) {
    $buscar = $_POST['buscar'];
    $resultados = buscarEnComunidades($comunidades, $buscar);
    print_r($resultados);
}
?>