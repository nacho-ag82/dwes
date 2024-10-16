<?php

$inventarioActual=["teclado"=>["precio"=>20,"categoria"=>"electronica","cantidad"=>50],
                    "raton"=>["precio"=>15,"categoria"=>"electronica","cantidad"=>50],
                    "monitor"=>["precio"=>100,"categoria"=>"electronica","cantidad"=>50],
                    "silla"=>["precio"=>80,"categoria"=>"muebles","cantidad"=>50]];


$inventarioProvedorA=["lampara"=>["precio"=>25,"categoria"=>"electronica"],
                    "raton"=>["precio"=>10,"categoria"=>"electronica"],
                    "escritorio"=>["precio"=>50,"categoria"=>"muebles"]];


$inventarioProvedorB=["monitor"=>["precio"=>92,"categoria"=>"electronica"],
                    "auriculares"=>["precio"=>30,"categoria"=>"electronica"],
                    "lampara"=>["precio"=>20,"categoria"=>"iluminacion"]];




echo "<pre>";print_r($inventarioActual);"</pre>";
//Comparar inventarios de diferentes proveedores
$comparacioninventarioProvedores= array_diff_key( array_merge($inventarioProvedorA, $inventarioProvedorB) ,$inventarioActual);
echo print_r($comparacioninventarioProvedores);

//Unir y organizar las listas de productos
$todosLosProductos = array_merge($inventarioActual,$inventarioProvedorA, $inventarioProvedorB);

//Eliminar productos duplicados
$todosLosProductos = $todosLosProductos+$todosLosProductos;

//Contar cuántos productos hay de cada categoría
$cantProductosPorCategoria = ["electronica"=>(count(array_keys($inventarioActual,"electronica"))+count(array_keys($inventarioProvedorA,"electronica"))+count(array_keys($inventarioProvedorB,"electronica"))),
    "muebles"=>(count(array_keys($inventarioActual,"muebles"))+count(array_keys($inventarioProvedorA,"muebles"))+count(array_keys($inventarioProvedorB,"muebles"))),
    "iluminacion"=>(count(array_keys($inventarioActual,"iluminacion"))+count(array_keys($inventarioProvedorA,"iluminacion"))+count(array_keys($inventarioProvedorB,"iluminacion")))];

?> 