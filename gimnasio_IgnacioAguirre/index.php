<?php 
session_start();

?>
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

<nav>
<?php include "app/views/login_form.php" ?>
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