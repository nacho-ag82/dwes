<?php

if (is_int($_REQUEST["valor"])){
    echo "es numerico<br>";
}
if (ctype_digit($_REQUEST["valor"])){
    echo "ctype_digit tambien dice que es numerico";
}
?>