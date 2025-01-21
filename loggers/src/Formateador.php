<?php 
namespace Loggers\Src;
require_once '../vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\HtmlFormatter;


// Crear el Logger
$log = new Logger("MiLogger");

// Configurar el manejador de archivos rotativos (logs)
$rfh = new RotatingFileHandler("logs/milog.log", Logger::DEBUG);

// Asignar el formateador JSON al manejador
$rfh->setFormatter(new HtmlFormatter());

// Añadir el manejador al logger
$log->pushHandler($rfh);

// Probar el logger
$log->info("Mensaje de prueba", ['usuario' => 'Juan', 'accion' => 'iniciar_sesion']);