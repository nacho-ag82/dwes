<?php
include "Controllers/UsuarioController.php";


if (isset($_REQUEST['usuario'])){
    if($_GET['f']='lo'){
        $user = new UsuarioController();
        $user->logout($data);
    }else{
    $data=[$_REQUEST['usuario'], $_REQUEST['contrasena']];
    $user = new UsuarioController();
    $user->login($data);
    }
}else{
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión - Gimnasio Iron Forge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main>
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <form method="post" action="index.php">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <br>
            <input type="submit" value="Iniciar sesión">
        </form>
    </main>
    <footer>
        <p>Página web creada en 2024</p>
    </footer>
</body>
</html>
<?php 
}

?>