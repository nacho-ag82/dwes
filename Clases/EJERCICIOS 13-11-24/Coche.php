<?php 
class Coche{
    public string $marca;
    public string $modelo;
    public float $velocidad;

    public function __construct(string $mc,string $md){
        $this->marca = $mc;
        $this->modelo = $md;
        $this->velocidad = 0;
    }
    public function acelerar(float $v){
        $this->velocidad+=$v;
    }
    public function frenar(float $v){
        $this->velocidad-=$v;
        if($this->velocidad<0){
            $this->velocidad=0;
        }
    }

}
?>