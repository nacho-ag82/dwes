<?php 
include 'Usuario.php';
 $u = new Usuario("nacho", "nacho@gmail.com","contraseña");
 print $u->__GET("nombre");
 echo "<br>";
 print_r($u);
 $u->setnewpass("minabo");
 echo "<br>";
 print_r($u);
?>