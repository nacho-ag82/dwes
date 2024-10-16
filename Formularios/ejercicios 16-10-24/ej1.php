<?php 
$ndados = rand(1,10);
$pares=0;
$impares=0;
echo "$ndados dados<br>";
for ($i=0; $i <$ndados; $i++) { 
    $dado = rand(1,6);
    echo "<img src='$dado.svg'>";
    if($dado%2==0){
        $pares++;
    }else{
        $impares++;
    }

}
echo "<br>Han salido $pares numeros pares y $impares numeros impares";
?>