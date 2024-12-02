<?php 
class Soporte{
    public $titulo;
    protected $numero;
    private $precio;

    public function __construct( $t = null, $n,$p) {
        $this->titulo = $t;
        $this->numero = $n;
        $this->precio = $p;
    }
    public function getPrecio(): float{
        return $this->precio;
    }
    public function getPrecioConIva(): float{
        return $this->precio*1.21;
    }
    public function getNumero(): int{
        return  $this->numero;
    }
    public function muestraResumen(){
        echo "\n";
        echo $this->titulo;
        echo "\nPrecio: ";
        echo $this->precio;
        echo "\nPrecio con Iva: ";
        echo $this->getPrecioConIva();
        echo "€\n";
        echo $this->titulo;
        echo "\n".$this->getPrecio()."€ (IVA NO INCLUIDO)";
    }

}
?>