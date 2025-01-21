<?php
    require_once("../utiles/config.php");
    require_once("../utiles/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de torneos del tenista</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h1>Listado de torneos ganados por un tenista</h1>

    <!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO
        Recuerda:
        - Comprobar si en la URL tenemos un parámetro que identifique al tenista.
        - Realiza la conexion a la base de datos a través de una función.
        - Realiza la consulta a ejecutar en la base de datos.
        - Ejecuta la consulta y, si no se obtiene resultado, vuelve al listado original. En caso contrario, habrá 1 resultado, con nombre y apellido.
        - Prepara la consulta a ejecutar para obtener todos los torneos y los años en los que se ha ganado.
        - Puedes hacerlo como quieras, pero una opción es guardarlo en una estructura clave valor en la que la clave es el nombre del torneo y el valor es un array con los distintos años en los que se ha ganado.
    -->
        <?php 
            include_once "../utiles/config.php";
            include_once "../utiles/funciones.php";
            if (!isset($_GET['tenista'])){
                header("Location: listado_tenistas.php");
            }
            $conexion = conectarPDO($database);
            $resultado = $conexion->query('SELECT COUNT(anno) FROM titulos WHERE tenista_id LIKE '.$_GET['tenista']);
            while ($registro = $resultado->fetch()){
                if ($registro==0){
                    header("Location: listado_tenistas.php");
                }else{
                    $resultado = $conexion->query('SELECT nombre, apellidos FROM tenistas WHERE id LIKE '.$_GET['tenista']);
                    while ($registro = $resultado->fetch()){
                        echo "Trofeos ganados por el tenista: ".$registro['nombre']." ".$registro['apellidos']."<br>";
                    }
                    $resultado = $conexion->query('SELECT tor.nombre, COUNT(tit.anno)  as suma, tit.torneo_id FROM titulos tit LEFT JOIN torneos tor on tit.torneo_id = tor.id WHERE tit.tenista_id = '.$_GET['tenista'].' GROUP BY tit.torneo_id');
                    while ($registro = $resultado->fetch()){
                        echo $registro['nombre']." (".$registro['suma'].") ";
                        $resultado2=$conexion->query('SELECT anno FROM titulos WHERE tenista_id='.$_GET['tenista'].' AND torneo_id='.$registro['torneo_id']);
                        while ($registro2 = $resultado2->fetch()){
                            echo $registro2['anno']." ";
                        }
                        echo "<br>";
                    }

                }
            }
        ?>

   
    <h2> <!-- ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO PARA PINTAR EL NOMBRE Y APELLIDO DEL TENISTA--></h2>
    
    <!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
    -->
    <div>
    <!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO
        - Si lo has guardado en una estructura clave valor, recorrerla para mostrar los datos solicitados.
    -->
       
    </div>
    <div class="contenedor">
        <div class="enlaces">
            <a href="listado_tenistas.php">Volver al listado de tenistas</a>
        </div>
    </div>

    <!--  
        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
    -->
</body>
</html>