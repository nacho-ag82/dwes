<?php

if (is_int( intval($_REQUEST["valor"]))){
    echo "valor 0 es numerico<br>";
}
if (is_float(floatval($_REQUEST["valor1"]))){
    echo "valor 1 es decimal<br>";
}
if (is_bool(boolval($_REQUEST["valor2"]))){
    echo "valor 2 es booleano<br>";
}
if (is_string($_REQUEST["valor3"])){
    echo "valor 3 es cadena<br>";
}

?>