<?php 

echo "Jugador 1:<br>";
$dado = rand(1,6);
echo "<img src='$dado.svg'>";
echo "<br>Jugador 2:<br>";
$dado2 = rand(1,6);
echo "<img src='$dado2.svg'>";

echo "<br>Ha ganado... ";
if($dado>$dado2){
    echo "el jugador 1.";
}else if($dado<$dado2){
    echo "el jugador 2.";
}else{
    echo "nadie. Empate";
}

?>