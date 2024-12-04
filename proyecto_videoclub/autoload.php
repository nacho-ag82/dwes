<?php
spl_autoload_register(function ($class) {
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
    $file = $baseDir . $class . '.php';

    echo "Buscando archivo: $file<br>";  // Esto te ayudará a depurar

    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("No se pudo cargar la clase: $class. Archivo esperado: $file");
    }
});
