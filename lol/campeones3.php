<?php 

try {
    $mysql = "mysql:host=localhost;dbname=lol;charset=UTF8";
    $user = "root";
    $conexion = new PDO($mysql, $user);
    if(isset($_GET['c'])&&isset($_GET['dir'])){
        $filtro = " ORDER BY ".$_GET['c']." ".$_GET['dir'];
    }else{
        $filtro=null;
    }
    $resultado = $conexion->query('SELECT * FROM campeon'.$filtro);
    echo "<table border='1'>";
echo"
<tr>
    <th>ID <a href='campeones3.php?c=id&dir=asc'>˄</a><a href='campeones3.php?c=id&dir=desc'>˅</a></th>
    <th>Nombre <a href='campeones3.php?c=nombre&dir=asc'>˄</a><a href='campeones3.php?c=nombre&dir=desc'>˅</a></th>
    <th>Rol <a href='campeones3.php?c=rol&dir=asc'>˄</a><a href='campeones3.php?c=rol&dir=desc'>˅</a></th>
    <th>Dificultad  <a href='campeones3.php?c=dificultad&dir=asc'>˄</a><a href='campeones3.php?c=dificultad&dir=desc'>˅</a></th>
    <th>Descripcion  <a href='campeones3.php?c=descripcion&dir=asc'>˄</a><a href='campeones3.php?c=descripcion&dir=desc'>˅</a></th>
    <th>Editar</th>
    <th>Borrar</th>
</tr>
";
// tendrás que añadir un foreache o similar


    foreach ($registro = $resultado->fetchAll(pdo::FETCH_ASSOC) as $registro) {
        echo "<tr>";
        echo "<td>".$registro['id']."</td>";
        echo "<td>".$registro['nombre']."</td>";
        echo "<td> ".$registro['rol']."</td>";
        echo "<td>".$registro['dificultad']."</td>";
        echo "<td>".$registro['descripcion']."</td>";
        echo "<td><a href='editando.php?id=".$registro['id']."'>E</a></td>";
        echo "<td><a href='borrar.php?id=".$registro['id']."&c=f'>X</button></td>";
        echo "</tr>";
    }
        $conexion = null;
} catch (PDOException $e) {
    echo "<p>" .$e->getMessage()."</p>";
}

?>