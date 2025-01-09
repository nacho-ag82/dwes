<?php
try {
    $mysql = "mysql:host=localhost;dbname=lol;charset=UTF8";
    $user = "root";
    $conexion = new PDO($mysql, $user);
    $conexion->exec('UPDATE campeon SET nombre="'.$_REQUEST['nombre'].'",rol="'.$_REQUEST['rol'].'",dificultad="'.$_REQUEST['dificultad'].'",descripcion="'.$_REQUEST['descripcion'].'" WHERE id ='.$_GET['id']);
    header("Location: campeones3.php");
}catch(PDOException $e) {
    echo "<p>" .$e->getMessage()."</p>";
}
?>