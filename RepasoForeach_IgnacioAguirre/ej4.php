<?php 
include 'matriz.php';
//se debe mostrar por pantalla el resultado de los datos solicitados por el usuario.
print_r($_REQUEST);
print_r($comunidades[$_REQUEST["provincia"]]);
?>