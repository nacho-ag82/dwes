<h1>CAlCULADORA DE DESCUENTOS CON MATRICES</h1>

<?php
//Declaracion de vriables

$matrizProducto =[["nombre"=> "FURBY MORADO LIMPIASUELOS", "cantidad"=>51,"precioU"=>3],["nombre"=> "FURBY ROSA INUTIL", "cantidad"=>20,"precioU"=>110],["nombre"=> "FURBY VIOLETA", "cantidad"=>100,"precioU"=>0.5]];
define("DESCUENTO_PEQUENO",5);
define("LIMITE_DESCUENTO",50);
define("LIMITE_COMPRA_GRANDE",100);
define("LIMITE_CANTIDAD_ADICIONAL",40);
$mensaje;
$totalConDescuento;
$descuento = 0;
$totalFinal = 0;
$totalCProductos = 0;
echo "Resumen de compara:";
$par=0;
foreach($matrizProducto as $index =>$producto){
    //Operacion calculo de precio
    $totalSinDescuento = $producto["cantidad"]*$producto['precioU'];

    $totalSinDescuento =floatval($totalSinDescuento);

    //Condicional para cantidad de descuento
    if($producto["cantidad"]>LIMITE_DESCUENTO){
        $descuento += $totalSinDescuento*10/100;
    }
    if($producto["cantidad"]>LIMITE_CANTIDAD_ADICIONAL){
        $descuento += ($totalSinDescuento-$descuento)*DESCUENTO_PEQUENO/100;
    }
    //calculo de precio con descuento + iva
    $totalConDescuento = ($totalSinDescuento-$descuento)*1.15;

    //condicional tamaño de compra
    if ($totalConDescuento>LIMITE_COMPRA_GRANDE){
        $mensaje = "Compra grande";
    }else{
        $mensaje = "Compra normal";
    }
    //comprobamos si el producto es par
    if ($producto['cantidad']%2==0){
        $par = "par";
    }else{
        $par = "impar";
    }
    //impresion de resultados
    $pantalla = "<p>\n\nNombre de Producto:". $producto["nombre"]."\nCantidad:".$producto["cantidad"]."\nPrecio Unitario:".(string)number_format($producto['precioU'],2)." €\nTotal sin descuento:". number_format($totalSinDescuento,2)." €\nTotal con Descuento:". number_format($totalConDescuento,2)." €\n$mensaje\nTipo de compra: $par</p>";
    echo nl2br($pantalla);
    $totalFinal += $totalConDescuento;
    $totalCProductos += $producto['cantidad'];
}
    //aplicamos las condiciones para un producto adicional
    if ($totalFinal>500 && $totalCProductos>150){
        echo nl2br("\nNombre de Producto: BOLAS SHINAS"."\nCantidad:1\nPrecio Unitario:150€\nTotal sin descuento:150€\nTotal con Descuento:0€\nCompra normal \nTipo de compra: Impar");
    }
    //comprobamos si el producto es par
    if ($totalCProductos%2==0){
        $par = "par";
    }else{
        $par = "impar";
    }
echo nl2br("<p>Total compra: ".number_format($totalFinal,2,",",".")."€\nPromedio Unitario: ".number_format($totalFinal/$totalCProductos,2,",",".")."€\nTipo de compra: $par");
?>