<?php


header("Content-type: text/plain");
header('Content-Disposition: attachment; filename="descargable.txt"');
readfile("descargable.txt")
?>