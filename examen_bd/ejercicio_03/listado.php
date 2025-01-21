<?php 
include_once "../utiles/funciones.php";
include_once "../utiles/config.php";

$conexion = conectarPDO($database);
$resultado = $conexion->query('SELECT * FROM torneos');
echo "<table border='1'>";
echo
"<tr><th>ID</th><th>Nombre</th><th>Ciudad</th><th>Superficie</th><th>Acciones</th></tr>";
// tendrás que añadir un foreache o similar


    while ($registro = $resultado->fetch()) {
        echo "<tr>";
        echo "<td>".$registro['id']."</td>";
        echo "<td>".$registro['nombre']."</td>";
        echo "<td>".$registro['ciudad']."</td>";
        $resultado2 = $conexion->query('Select nombre FROM superficies WHERE id LIKE '.$registro['superficie_id']);
        while ($registro2 = $resultado2->fetch()){
        echo "<td>".$registro2['nombre']."</td>";
        }
        //echo "<td>".$registro['superficie']."</td>";
        echo "<td><a href='modificar_torneo.php?r=" . $registro["id"] . "'>&#9998;</a>";
        echo "</tr>";
            }

            echo "</table>";
            echo "<br><br><br>";
            echo "<a href='nuevo.php'>Añadir un nuevo torneo</a><br><br>";
            echo "<a href='../index.html'>Volver al menú de selección</a>";

            $conexion = null;

?>