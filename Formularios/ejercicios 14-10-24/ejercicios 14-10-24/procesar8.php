<?php

if (filter_var($_REQUEST["email"],FILTER_VALIDATE_EMAIL)){
    echo "valor es un email<br>";
}
if (filter_var($_REQUEST["url"],FILTER_VALIDATE_URL)){
    echo "valor es una url<br>";
}
?>