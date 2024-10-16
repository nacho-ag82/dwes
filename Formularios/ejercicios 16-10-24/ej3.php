<?php 
$j1=[];
$j2=[];
$gj1=0;
$gj2=0;
$e=0;
$ndados=4;
echo "Jugador 1:<br>";
for ($i=0; $i < $ndados; $i++) { 

    $dado = rand(1,6);
    echo "<img src='$dado.svg'>";
    array_push($j1,$dado);
    $dado2 = rand(1,6);
    array_push($j2,$dado2);
    if($dado>$dado2){
        $gj1++;
    }else if($dado<$dado2){
        $gj2++;
    }else{
        $e++;
    }
}
echo "<br>Jugador 2:<br>";
for ($i=0; $i < $ndados; $i++) { 
    echo "<img src='".$j2[$i].".svg'>";
}
if ($e==$ndados){
    echo "<br>Han empatado siempre.";
}else{
    echo "<br>El jugador 1 ha ganado $gj1 veces, el jugador 2 ha ganado $gj2 veces y los jugadores han empatado $e veces.";
}
?>