<?php 

try {
    $mysql = "mysql:host=localhost;dbname=dwes_manana_prueba;charset=UTF8";
    $user = "dwes_manana";
    $password = "root";
    $conexion = new PDO($mysql, $user, $password);
    
    $resultado = $conexion->query('SELECT * FROM productos');
    echo "<table border='1'>";
echo
"<tr><th>Nombre</th></tr>";
// tendrás que añadir un foreache o similar


    while ($registro = $resultado->fetch()) {
        echo "<tr>";
        echo "<td>".$registro['id']."</td>";
        echo "<td>Nombre: ".$registro['nombre']."</td>";
        echo "<td> Descripcion: ".$registro['descripcion']."</td>";
        echo "<td> Precio: ".$registro['precio']."</td>";
        echo "<td> Stock: ".$registro['stock']."</td>";
        echo "<td> Categoria: ".$registro['categoria']."</td>";
        echo "</tr>";
        }
        $conexion = null;
} catch (PDOException $e) {
    echo "<p>" .$e->getMessage()."</p>";
}

?>