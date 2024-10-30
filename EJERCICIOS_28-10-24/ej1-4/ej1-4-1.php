<?php
    require __DIR__ . '../vendor/autoload.php';
    use Nalexa\zip;

    header("Content-type: application/zip");
    header('Content-Disposition: attachment; filename="decargable.zip"');
    readfile("descargable.zip");
ob_end_flush(); // Flush the buffer and send output