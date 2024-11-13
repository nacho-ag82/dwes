<?php 
include 'Coche.php';

$c = new Coche("Volvo", "s60 d5 2004");
print_r($c);
echo "<br>";
$c->acelerar(12.5);
print_r($c);
echo "<br>";
$c->frenar(3);
print_r($c);
echo "<br>";
$c->acelerar(50);
print_r($c);
echo "<br>";
$c->acelerar(20.5);
print_r($c);
echo "<br>";
$c->frenar(200);
print_r($c);

?>