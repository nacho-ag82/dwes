<?php session_start()?>

<!DOCTYPE html>
<html>
<head>
    <title>Gimnasio Iron Forge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo de Iron Forge">
        <h1>Donde se forjan las leyendas</h1>
    </header>
    <nav>
    <a href="catalogo.html">Ver catálogo de ofertas</a>
    </nav>

<nav>


<?php 
include 'horario.php';



if (isset($_SESSION['usuario'])){
$clase = $_GET['clase'];
$dia = $_REQUEST['select'];
$action = $_REQUEST['action'];
if (isset($_REQUEST['action'])&&isset($_REQUEST['select'])){
    
    echo $clase."<br>";
    echo print_r($_SESSION['clasesh'][$clase][$_REQUEST['select']]);
}
?>
<h3>para confirmar la reserva o la liberacion de la clase pulse en descargar</h3>
<?php 
echo "<p><a href='descarga.php?clase=$clase&dia=$dia&action=$action'>Descargar info</a></p>";
echo "<a href='main.php?cancel=1'>Cancelar</a>";
}else{
    header('Location: index.php');

}
?>
</nav>
    <main>
        <section>
            <h3>Sobre Nosotros</h3>
            <p>Nuestra misión...</p>
            <p>Nuestros valores...</p>
        </section>
        <section>
            <h3>Contacto</h3>
            <p>Teléfono: ...</p>
            <p>Dirección: Calle Falsa 123</p>
            <p>Localización: Ciudad, País</p>
        </section>
        <section>
            <h3>El Gimnasio en las redes</h3>
            <p>Síguenos en: <a href="https://www.facebook.com/">Facebook</a>, <a href="https://www.instagram.com/">Instagram</a></p>
        </section>
    </main>

    <footer>
        <p>Página web creada en 2024</p>
    </footer>
</body>
</html>