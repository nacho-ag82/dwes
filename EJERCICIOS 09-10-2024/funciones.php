<?php 

//Ejercicio 1---- volumen de un cilindro por parametros
function volCilinder(float $r=1, float $h=1):float{
    return (pi()**2)*($r**2)*$h;
}
//Ejercicio 2.1---- suma 3 3 numerospor parametros
function suma3numeros(float $num1, float $num2, float $num3):float{
    return $num1+$num2+$num3;
}
function producto3numeros(float $num1, float $num2, float $num3):float{
    return $num1*$num2*$num3;
}

//Ejercicio 3---- eliminar un numero de un array no devuelve el array porque hace los cambios sobre la variable de clase
function eliminarNum(array &$ar, int $vals){
    for ($i=0; $i < $vals ; $i++) { 
        array_splice($ar,rand(0, count($ar)-1));
    }
}
?>