<?php
require __DIR__ . '../vendor/autoload.php';
    
use PhpZip\ZipFile;
   
    
// Crear un nuevo archivo ZIP
$zipFile = new ZipFile();

try {
    // Añadir archivos al ZIP
    $zipFile
        ->addFile("../imagen.gif", 'firstfile.gif')
        ->addFile("../imagen.jpeg", 'secondfile.jpeg');

    // Guardar el archivo ZIP temporalmente
    $zipFilePath = tempnam(sys_get_temp_dir(), 'zip');
    $zipFile->saveAsFile($zipFilePath);
    $zipFile->close();

    // Enviar el archivo ZIP para descarga
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="archivo.zip"');
    header('Content-Length: ' . filesize($zipFilePath));
    readfile($zipFilePath);

    // Eliminar el archivo temporal
    unlink($zipFilePath);

} catch (\PhpZip\Exception\ZipException $e) {
    // Manejar errores
    echo 'Error al crear el archivo ZIP: ' . $e->getMessage();
} finally {
    // Asegurarse de cerrar el archivo ZIP
    $zipFile->close();
}

?>