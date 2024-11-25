<?php
spl_autoload_register(function ($class) {
    // Ajustar la ruta base de acuerdo con tu estructura de carpetas
    $baseDir = __DIR__ . '/app/';

    // Convertir el namespace de la clase a una ruta de archivo
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';

    // Verificar y requerir el archivo si existe
    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("No se pudo cargar la clase: $class. Archivo esperado: $file");
    }
});
