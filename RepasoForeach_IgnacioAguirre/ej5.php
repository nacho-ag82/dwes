<table>
    <thead>
<?php 
include 'matriz.php';
//Calcular la población total de cada comunidad y mostrarla en una tabla HTML:
$suma =0;
foreach($comunidades as $c){
    foreach($c['capital'] as $ca){
        $suma+= $ca['poblacion'];

    }
    
}
echo "la suma de las poblaciones de todas las capitales de comunidad autonoma es: $suma";
?>
</tr>
 </thead>
 </table>