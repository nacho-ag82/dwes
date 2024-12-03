<?php 
class Cliente
{
    public $nombre;
    private $numero;
    private $soporteAlquilados=[];
    private $numSoportesAlquilados;
    private $maxAlquilerConcurrente;
    public function __construct($n,$nu,$max=3) {
        $this->nombre = $n;
        $this->numero = $nu;
        $this->maxAlquilerConcurrente = $max;
    }

    public function getNumero():int{
        return $this->numero;
    }

    public function setNumero(int $n){
        $this->numero = $n;
    }

    public function getNumSoportesAlquilados(): int{
        return $this->numSoportesAlquilados;
    }

    public function alquilar(Soporte $soporte):bool{
        if ($this->numSoportesAlquilados<$this->maxAlquilerConcurrente&&!array_search($soporte, $this->soporteAlquilados)){
            array_push($this->soporteAlquilados, $soporte);
            $this->numSoportesAlquilados++;
            echo "<p>alquiler realizado con exito";
            $soporte->muestraResumen();
            echo "</p>";
            return true;
        }else{
            echo "<br>alquiler fallido";
            return false;
        }
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
            if($s->getNumero()==$numSoporte){
                array_udiff($this->soporteAlquilados, $s);
                $this->numSoportesAlquilados--;
                echo "<br>devolucion realizada con exito";
                return true;           
            }
        }
        echo "<br>devolucion fallida";
        return false;
    }
    public function listaAlquileres(){
        echo "<br>Hay ".$this->numSoportesAlquilados." soportes alquilados";
        foreach ($this->soporteAlquilados as $s) {
            $s->muestraResumen();
        }
    }
    public function muestraResumen(){
        echo "<br>Alquilado soporte a :" .$this->nombre;
        echo "<br>numero de soportes alquilados es: ".$this->numSoportesAlquilados;
    }
}   

?>