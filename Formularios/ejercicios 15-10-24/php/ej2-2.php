<?php
    $direccion = $_REQUEST["direccion"];
    $fila = $_REQUEST["fila"];
    $column = $_REQUEST["columna"];
    $_REQUEST= array_slice($_REQUEST, sizeof($_REQUEST),);
    print_r($_REQUEST);
    switch ($direccion) {
        case 1:
            //arriba derecha
            /*for ($i=0; $i < ; $i++) { 
                # code...
            }*/
            break;
        case 2:
            //arriba izuierda
            break;
        case 3:
            //abajo derecha
            break;
        case 4:
            //abajo izquierda
            break;
    }
?>
<br>
<a href='../html/ej1.html'>Volver al inicio.</a>