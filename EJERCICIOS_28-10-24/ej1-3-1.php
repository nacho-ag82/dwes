<?php

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
/*$format = $_REQUEST["select"];

//Ruta de cada formato
switch ($format) {
    case '1':
        $imagePath = 'imagen.jpeg';
        break;

    case '2':
        $imagePath = 'imagen.png';
        break;

    case '3':
        $imagePath = 'imagen.gif';
        break;

    default:
        die('Formato no soportado. Selecciona JPEG, PNG o GIF.');
}

//Verifica si existe
if (!file_exists($imagePath)) {
    die('El archivo no existe en la ruta especificada.');
}

//Configurar encabezados y descargar archivo selecionado
switch ($format) {
    case '1':
        header('Content-Type: image/jpeg');
        header('Content-Disposition: attachment; filename="imagen.jpeg"');
        readfile($imagePath);
        break;

    case '2':
        header('Content-Type: image/png');
        header('Content-Disposition: attachment; filename="imagen.png"');
        readfile($imagePath);
        break;

    case '3':
        header('Content-Type: image/gif');
        header('Content-Disposition: attachment; filename="imagen.gif"');
        readfile($imagePath);
        break;
}
exit;*/
?>