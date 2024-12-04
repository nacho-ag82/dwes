<?php 

namespace src;
class Videoclub{
    private $nombre;
    private $productos=[];
    private $numProductos;
    private $socios=[];
    private $numSocios;

    public function __construct($nombre,array $productos=null, array $socios = null) {
        $this->nombre = $nombre;
        $this->productos = $productos;
        $this->socios = $socios;
    }
    private function incluirProducto(Soporte $producto){
        $this->productos[] = $producto;
        $this->numProductos++;
        echo "<br>Incluido soporte ". $producto->getNumero();
    }
    public function incluirCintaVideo($titulo,$numero ,$precio, $duracion){
        $this->incluirProducto(new CintaVideo($titulo, $numero,$precio, $duracion));
    }
    public function incluirDvd($titulo,$numero ,$precio, $idiomas, $pantalla){
        $this->incluirProducto(new Dvd($titulo, $numero,$precio, $idiomas, $pantalla));
    }
    public function incluirJuego($titulo,$numero, $precio, $consola, $minJ, $maxJ){
        $this->incluirProducto(new Juego($titulo, $numero,$precio, $consola,$minJ,$maxJ));
    }
    public function incluirSocio($nombre, $numero,$maxAlquileresConcurrentes = 3){
        $this->socios[]=new Cliente($nombre,$numero,$maxAlquileresConcurrentes);
        echo "<br>Incluido socio ". $numero;
    }
    public function listarProductos(){
        echo "<br>Listado de ". $this->numProductos ." productos disponibles";
        foreach ($this->productos as $s) {
           
            $s->muestraResumen();
        }
    }
    public function listarSocios(){
        foreach ($this->socios as $s) {
            $s->muestraResumen();
        }
    }
    public function alquilarSocioProducto($numeroCliente, $numeroSoporte): bool{
        foreach ($this->socios as $s) {
            if ($s->getNumero() == $numeroCliente){
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