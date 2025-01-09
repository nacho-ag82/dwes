<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Usuario</title>
    </head>
    <body>
        <h2>Registro Usuario</h2>
        <form action="nuevoUsuario.php" method="POST">
            <label for="nombre">Nombre </label><input type="text" name="nombre"><br>
            <label for="usuario">Usuario </label><input type="text" name="usuario"><br>
            <label for="password">password </label><input type="password" name="password"><br>
            <label for="email">Email </label><input type="text" name="email"><br>
            <button type="submit">Registrar </button>
        </form>
    </body>
</html>