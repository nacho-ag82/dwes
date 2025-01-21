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
    <title>Listado de tenistas</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <h1>Listado de tenistas con número de torneos ganados</h1>

      <!--  

        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 
        Recuerda:
        - Realiza la conexion a la base de datos a través de una función.
        - Realiza la consulta a ejecutar en la base de datos en una variable
        - Obten el resultado de ejecutar la consulta para poder recorrerlo.
      -->
    

    <table border="1" cellpadding="10">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Altura (cm)</th>
            <th>Año de nacimiento</th>
            <th>Mano</th>
            <th>Número de torneos ganados</th>
        </thead>
        <tbody>
        
        <!--  
            
            ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

        --><?php 
        
            $conexion = conectarPDO($database);
            $resultado = $conexion->query('SELECT t.id, t.nombre, t.apellidos, t.altura, t.anno_nacimiento, t.mano, COUNT(tit.anno) as titulo FROM tenistas t LEFT JOIN titulos tit on t.id=tit.tenista_id GROUP BY t.id ORDER BY titulo DESC');


            while ($registro = $resultado->fetch()) {
                echo "<tr>";
                echo "<td>".$registro['nombre']."</td>";
                echo "<td>".$registro['apellidos']."</td>";
                echo "<td>".$registro['altura']."</td>";
                echo "<td>".$registro['anno_nacimiento']."</td>";
                echo "<td>".$registro['mano']."</td>";
                echo "<td><a href='listado_torneos_ganados.php?tenista=".$registro['id']."'>".$registro['titulo']."</a></td>";
                }
                echo "</tr>";
            
        
        ?>
        </tbody>
    </table>

    <!--  

        ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO 

    -->
    
</body>
</html>