<?php 
class Videoclub{
    private $nombre;
    private $productos=[];
    private $numProductos;
    private $socios=[];
    private $numSocios;

    public function __construct($nombre,array $productos=null, array $socios = null) {
        $this->nombre = $nombre;
        $this->productos = $productos;
        $this->numProductos = sizeof($productos);
        $this->socios = $socios;
        $this->numSocios = sizeof($socios);
    }
    private function incluirProducto(Soporte $producto){
        $this->productos[] = $producto;
        $this->numProductos++;
    }
    public function incluirCintaVideo($titulo, $precio, $duracion){

    }
    public function incluirDvd($titulo, $precio, $idiomas, $pantalla){

    }
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ){
        
    }
    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3){
        
    }
    public function listarProductos(){
        foreach ($this->productos as $s) {
            $s->muestraResumen();
            echo "\n";
        }
    }
    public function listarSocios(){
        foreach ($this->socios as $s) {
            $s->muestraResumen();
            echo "\n";
        }
    }
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte): bool{
        foreach ($this->socios as $s) {
            if ($s->numero == $numeroCliente){
                foreach ($this->productos as $p) {
                    if ($p->getNumero() == $numeroSoporte){
                        $s->alquilar($p);
                        return true;
                    }
                }
                return false;
            }
        }
        return false;
    }
}
?>