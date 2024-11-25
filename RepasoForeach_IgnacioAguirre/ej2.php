<?php 
include 'matriz.php';
//Mostrar todas las capitales y sus poblaciones:
foreach ($comunidades as $c) {
    echo "Capital: <br>";
    print_r($c["capital"]);
    echo "<br>Provincias:<br>";
    print_r($c["provincias"]);
    echo "<br>";
}

?>