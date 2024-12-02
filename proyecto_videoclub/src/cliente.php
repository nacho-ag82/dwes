<?php 
class Cliente
{
    public $nombre;
    private $numero;
    private $soporteAlquilados=[];
    private $numSoportesAlquilados;
    private $maxAlquilerConcurrente;
    public function __construct($n,$nu,array $s = null,$num,$max) {
        $this->nombre = $n;
        $this->numero = $nu;
        $this->soporteAlquilados = $s;
        $this->numSoportesAlquilados = $num;
        $this->maxAlquilerConcurrente = $max;
    }
    public function alquilar(Soporte $soporte){
        array_push($this->soporteAlquilados, $soporte);
        
    }
    public function tieneAlquilado(Soporte $soporte): bool {
        foreach ($this->soporteAlquilados as $s) {
            if($s==$soporte){
                return true;
            }
        }
        return false;
    }

    public function devolver(int $numSoporte):bool{
        foreach ($this->soporteAlquilados as $s) {
            if($s->numero==$numSoporte){
                array_udiff($this->soporteAlquilados, $s);
                $this->numSoportesAlquilados--;
                return true;
                
            }
        }
        return false;
    }
    public function listaAlquileres(){
        foreach ($this->soporteAlquilados as $s) {
            $s->muestraResumen;
        }
    }
    public function muestraResumen(){
        
    }
}   

?>