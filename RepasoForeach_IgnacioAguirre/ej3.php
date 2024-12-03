<?php 
include 'matriz.php';
//Añadir una nueva comunidad y mostrarlos por pantalla
$lacomunidaddemiscojones=[
    'provincias' => ['Un pelo','Otro Pelo','Villa prepucio del condado'],
    'capital' =>['Villa prepucio del condado'=>['poblacion'=>'la que se acerque','informacion_adicional'=>'Capital mundial de la fabricación del padalustro padalustro']]
];
array_push($comunidades,[$lacomunidaddemiscojones]);
print_r($comunidades);
echo "<br>";
foreach ($comunidades as $c) {
    echo "Capital: <br>";
    print_r($c["capital"]);
    echo "<br>Provincias:<br>";
    print_r($c["provincias"]);
    echo "<br>";
}
?>