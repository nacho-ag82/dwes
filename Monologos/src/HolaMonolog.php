<?php
namespace DawM\Src;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class HolaMonolog {
    private Logger $miLog;
    private int $hora;
function __construct(int $h){
    $this->hora = $h;
    $this->miLog = new Logger("miloguer");
    $l = new RotatingFileHandler("logs/milog.log",10,300);
    $this->miLog->pushHandler($l);
    if ($this->hora>24 || $this->hora<0){
        $this->miLog->warning('esto no es una hora perra');
    }else if($this->hora>6||$this->hora<12){
        $this->miLog->warning('wenos dia');
    }  else if($this->hora<21){
        $this->miLog->warning('wenas tarde');
    } else{
        $this->miLog->warning('wenas noche');
    }   
}

function saludar(){
    $m = "Hola";
    $this->miLog->warning($m);
}
function despedir(){
    $m = "Adios";
    $this->miLog->info($m);
}
}
?>