<?php
ob_start(); // Start output buffering
echo print_r($_REQUEST);

if ($_REQUEST["select"] == "1") {
    header("Content-type: image/jpeg");
    header('Content-Disposition: attachment; filename="image.jpeg"');
       readfile("imagen.jpeg");
} elseif ($_REQUEST["select"] == "2") {
    header("Content-type: image/png");
    header("Content-Disposition: attachment; filename=image.png");
     readfile("imagen.png");
    //readfile("image.png");
} elseif ($_REQUEST["select"] == "3") {
    header("Content-type: image/gif");
    header("Content-Disposition: attachment; filename=image.gif");
    readfile("imagen.gif");
}

ob_end_flush(); // Flush the buffer and send output