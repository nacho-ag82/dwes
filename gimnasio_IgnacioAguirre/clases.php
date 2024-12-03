<?php session_start()?>

<!DOCTYPE html>
<html>
<head>
    <title>Gimnasio Iron Forge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logo de Iron Forge">
        <h1>Donde se forjan las leyendas</h1>
    </header>
    <nav>
    <a href="catalogo.html">Ver catálogo de ofertas</a>
    </nav>

<nav><?php 
include 'horario.php';
if (isset($_SESSION['usuario'])){
    $clase=$_GET['clase'];
    echo "<form method='POST' action='procesar_formulario.php?clase=$clase'>";
    echo "<select type='select' name='select' id='select'>";
    foreach (array_keys($_SESSION['clasesh'][$clase]) as $horario) {    
        echo "<option value='$horario'>".$horario."</option>";
    }
    echo "</select>";
    echo "<select type='select' name='action' id='action'><option value='1'>reservar</option><option value='2'>liberar</option></select><button type='submit' value='reservar'>enviar</button></form>";
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