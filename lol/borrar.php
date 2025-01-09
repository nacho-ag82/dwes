<?php 
if ($_GET['c']=='v'){
    try {
        $mysql = "mysql:host=localhost;dbname=lol;charset=UTF8";
        $user = "root";
        $conexion = new PDO($mysql, $user);$conexion->exec('DELETE FROM campeon WHERE id='.$_GET['id']);
        header('Location: campeones2.php');
    }catch(PDOException $e) {
        echo "<p>" .$e->getMessage()."</p>";
    }
}else{
    echo "¿desea borrar el registro ".$_GET['id']."?";
    echo "<a href=borrar.php?id='".$_GET['id']."?c=v'>CONFIRMAR</a>";
    echo "<a href=campeones3.php>CANCELAR</a>";
}
?>