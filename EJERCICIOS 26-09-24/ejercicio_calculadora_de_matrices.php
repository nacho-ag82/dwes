<h1>CAlCULADORA DE DESCUENTOS CON MATRICES</h1>

<?php
//Declaracion de vriables

$matrizProducto =[["nombre"=> "FURBY MORADO LIMPIASUELOS", "cantidad"=>51,"precioU"=>3],["nombre"=> "FURBY MORADO LIMPIASUELOS", "cantidad"=>51,"precioU"=>3],["nombre"=> "FURBY MORADO LIMPIASUELOS", "cantidad"=>51,"precioU"=>3]];
define("DESCUENTO_PEQUENO",0);
define("LIMITE_DESCUENTO",50);
define("LIMITE_COMPRA_GRANDE",100);
$mensaje;
$totalConDescuento;
$descuento;
//Operacion calculo de precio
$totalSinDescuento = $matrizProducto["cantidad"]*$matrizProducto['precioU'];

$totalSinDescuento =floatval($totalSinDescuento);

//Condicional para cantidad de descuento
if($matrizProducto["cantidad"]>LIMITE_DESCUENTO){
    $descuento = $totalSinDescuento*10/100;
}else{
    $descuento = DESCUENTO_PEQUENO;
}
//calculo de precio con descuento
$totalConDescuento = $totalSinDescuento-$descuento;

//condicional tamaño de compra
if ($totalConDescuento>LIMITE_COMPRA_GRANDE){
    $mensaje = "Compra grande";
}else{
    $mensaje = "Compra normal";
}
//impresion de resultados
$pantalla = "<p>Resumen de compara:\n\nNombre de Producto:". $matrizProducto["nombre"]."\nCantidad:".$matrizProducto["cantidad"]."\nPrecio Unitario:".(string)number_format($matrizProducto['precioU'],2)." €\nTotal sin descuento:". number_format($totalSinDescuento,2)." €\nTotal con Descuento:". number_format($totalConDescuento,2)." €\n$mensaje</p>";
echo nl2br($pantalla);
?>