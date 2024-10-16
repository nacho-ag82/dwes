<?php
    echo "Tus datos originales son<br>";
    foreach ($_REQUEST as $key) {
        echo $key;
    }
    echo "<br>";
    $_REQUEST = array_reverse($_REQUEST, true);
    echo "Tus datos al reves son<br>";
    foreach ($_REQUEST as $key) {
        echo $key;
    }

?>
<br>
<a href='../html/ej1.html'>Volver al inicio.</a>