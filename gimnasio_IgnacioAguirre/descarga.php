<?php
session_start();
if (isset($_SESSION['usuario'])){
    include 'horario.php';
    $clase = $_GET['clase'];
    $dia = $_GET['dia'];
    $action = $_GET['action'];
    if ($action=='1'){
        
        if(reservar_plaza($clase,$dia )){
            $action = "Reserva";
        }else{
            $action = "FALLO";
        }

    }else{
        if(liberar_plaza($clase,$dia )){
            $action = "Liberar";
        }else{
            $action = "FALLO";
        }
    }
    // Crear el contenido del archivo .txt
    $contenido = "$action\n";
    $contenido .= "Clase: $clase\n";
    $contenido .= "Día: $dia\n";
    session_unset();
    session_destroy();
    // Crear y enviar el archivo .txt al navegador
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="gim.txt"');
    echo $contenido;
    exit();
    
}else{
    header('Location: index.php');
}
?>
