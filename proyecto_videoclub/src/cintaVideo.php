<?php

namespace src;
class CintaVideo extends Soporte implements Mostrable{
    private $duracion;
    public function __construct($t,$n,$p,$d) {
        parent::__construct($t,$n,$p);
        $this->duracion = $d;
    }
    function muestraResumen(){
        parent::muestraResumen();
        echo "<br>Duracion: ".$this->duracion;

    }
}
?>