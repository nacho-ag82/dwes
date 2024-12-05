<?php 


class Dvd extends Soporte{
    public $idiomas;
    private $formatPantalla;
    public function __construct($t,$n,$p,$i,$f) {
        parent::__construct($t,$n,$p);
        $this->idiomas = $i;
        $this->formatPantalla =$f;
    }

    public function muestraResumen(){
        echo "<br>Pelicula en DVD:";
        parent::muestraResumen();
        
        echo "<br>Idiomas: ". $this->idiomas;
        echo "<br>Formato Pantalla: ". $this->formatPantalla;
    }
}
?>