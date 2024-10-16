<?php
    //obtenemos los datos del post que implican la direccion y las fila y columna de comienzo de conteo
    $direccion = $_REQUEST["direccion"];
    $fila = $_REQUEST["fila"]-1;
    $column = $_REQUEST["columna"]-1;
    //nos quedamos con la matriz
    array_pop($_REQUEST);
    array_pop($_REQUEST);
    array_pop($_REQUEST);
    

    print_r($_REQUEST);
    echo "<br>";
    switch ($direccion) {
        case 1:
            //arriba derecha
            for ($i=$fila; $i >=0 ; $i--) { 
                echo $_REQUEST["num$i$column"];
                if ($column==sqrt(sizeof($_REQUEST))){
                    break;
                }
                $column++;
            }
            break;
        case 2:
            //arriba izquierda
            for ($i=$fila; $i >=0 ; $i--) { 
                echo $_REQUEST["num$i$column"];
                if ($column<=0){
                    break;
                }
                $column--;
            }
            break;
        case 3:
            //abajo derecha
            for ($i=$fila; $i <sqrt(sizeof($_REQUEST)) ; $i++) { 
                echo $_REQUEST["num$i$column"];
                if ($column>=sqrt(sizeof($_REQUEST))){
                    break;
                }
                $column++;
            }
            break;
        case 4:
            //abajo izquierda
            for ($i=$fila; $i <sqrt(sizeof($_REQUEST)) ; $i++) { 
                echo $_REQUEST["num$i$column"];
                if ($column>=sqrt(sizeof($_REQUEST))){
                    break;
                }
                $column--;
            }
            break;
        case 5:
            //abajo
            for($i=$fila; $i<sqrt(sizeof($_REQUEST));$i++){
                echo $_REQUEST["num$$i$column"];
            }
            break;
        case 6:
            //arriba
            for($i=$fila; $i>=0;$i--){
                echo $_REQUEST["num$i$column"];
            }
            break;
        case 7:
            //izquierda
            for($i=$columan; $i>=0;$i--){
                echo $_REQUEST["num$fila$i"];
            }
            break;
        case 8:
            //derecha
            for($i=$fila; $i==sqrt(sizeof($_REQUEST));$i++){
                echo $_REQUEST["num$fila$i"];
            }
            break;
    }
?>
<br>
<a href='../html/ej1.html'>Volver al inicio.</a>