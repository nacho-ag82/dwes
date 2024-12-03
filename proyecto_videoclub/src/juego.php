<?php 
class Juego extends Soporte{
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

     public function __construct($t, $n,$p,$c, $mi, $ma) {
        parent::__construct($t, $n,$p);
        $this->consola = $c;
        $this->minNumJugadores = $mi;
        $this->maxNumJugadores = $ma;

    }
    public function muestraJugadoresPosibles():string{
        $texto="";
        if($this->minNumJugadores==$this->maxNumJugadores && $this->maxNumJugadores==1){
            $texto = "Para un jugador";
        }else if ($this->minNumJugadores==$this->maxNumJugadores){
            $texto = "Para ".$this->maxNumJugadores." jugador";
        }else{
            $texto = "de ".$this->minNumJugadores." a ".$this->maxNumJugadores ." jugador";
        }
        return $texto;
    }
    public function muestraResumen(){
        echo "<br>Juego para: ".$this->consola;
        parent::muestraResumen();
        echo "<br>".$this->muestraJugadoresPosibles();
    }
}
?>