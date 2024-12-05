<?php 
include_once "src/Videoclub.php";
if($_SESSION['usuario']=='admin'){
    $miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
    $miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
    $miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
    $c1=new Cliente("Amancio Ortega",1);
    $c2 =new Cliente("Pablo Picasso", 2,2);
    $cliente1 = new Cliente("Bruce Wayne", 23);
    $cliente2 = new Cliente("Clark Kent", 33);
    $s=[$miCinta,$miDvd,$miJuego];
    $c=[$c1,$c2,$cliente1,$cliente2];

    $_SESSION['soportes']=$s;
    $_SESSION['socios']=$c;
    echo "<h2>Bienvenido</h2> <a href='index.php?f=lo'>cerrar sesion</a>";
    echo "<br><h3>Listado soportes</h3></br>";
    foreach ($s as $so) {
        $so->muestraResumen();
    }
    echo "<br><h3>Listado socios</h3></br>";
    foreach ($c as $so) {
        $so->muestraResumen();
    }


}
?>