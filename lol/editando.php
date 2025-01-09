<?php 

try {
    $mysql = "mysql:host=localhost;dbname=lol;charset=UTF8";
    $user = "root";
    $conexion = new PDO($mysql, $user);
    
    $resultado = $conexion->query('SELECT * FROM campeon WHERE id='.$_REQUEST['id']);

    echo "<form action='confirmar.php?id=".$_REQUEST['id']."' method='POST'>";
    foreach ($registro = $resultado->fetchAll(pdo::FETCH_ASSOC) as $registro) {
        echo "ID: ".$registro['id'];
        echo "<br>NOMBRE: <input type='text' name='nombre' value='".$registro['nombre']."'><br>";
        echo "ROL: <input type='text' name='rol'value='".$registro['rol']."'><br>";
        echo "DIFICULTAD (f,m,d): <input type='text' name='dificultad' value='".$registro['dificultad']."'><br>";
        echo "DESCRIPCION: <input type='text' name='descripcion' value='".$registro['descripcion']."'><br>";
        echo "<button type='submit'>Enviar</button>";
        }
    echo "</form>";
}catch(PDOException $e) {
    echo "<p>" .$e->getMessage()."</p>";
}
?>