<?php
include 'matriz.php';
//Muestra los datos de las provincias
foreach ($comunidades as $c) {
    print_r($c["provincias"]);
    echo "<br>";
}

?>