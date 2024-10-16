<?php

if (ctype_alpha($_REQUEST["valor"])){
    echo "valor es alfabetico<br>";
}else if (ctype_digit($_REQUEST["valor"])){
    echo "valor es nummerico<br>";
}else if(ctype_alnum($_REQUEST["valor"])){
    echo "valor es alfanumerico<br>";
}

?>