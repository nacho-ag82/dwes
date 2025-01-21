<?php
namespace Dwes\Ejemplos\Model;
use Loggers\Src\LogFactory;
use Monolog\Logger;

class Cliente {
    private $codigo; 
    private Logger $log;
    function __construct($codigo){ 
        $this->codigo=$codigo; 
        $this->log = LogFactory::getLogger();
    }
    /// ... resto del código
}