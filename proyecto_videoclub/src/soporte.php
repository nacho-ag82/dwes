<?php 
namespace src;
class Soporte implements Mostrable{
    public $titulo;
    protected $numero;
    private $precio;
    private $IVA = 1.21;
     

    public function __construct($t, $n,$p) {
        $this->titulo = $t;
        $this->numero = $n;
        $this->precio = $p;
        
    }
    public function getPrecio(): float{
        return $this->precio;
    }
    public function getPrecioConIva(): float{
        return $this->precio*$this->IVA;
    }
    public function getNumero(): int{
        return  $this->numero;
    }
    public function muestraResumen(){
        echo "<br>";
        echo $this->titulo;
        echo "<br>".$this->getPrecio()."€ (IVA NO INCLUIDO)";
    }

}
?>