<?php 
class Producto{
    public int $id;
    public string $nombre;
    public float $precio;
    public int $stock;

    public function __construct(int $i, string $n, float $p, int $s = 0){
        $this->id = $i;
        $this->nombre = $n;
        $this->precio = $p;
        $this->stock = $s;
    }

    public function disminuirStock(int $n): bool{
        if ($n>$this->stock){
            return false;
        }else{
            $this->stock=- $n;
            return true;
        }
    }

    
}
?>