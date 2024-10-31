<?php
session_start();
// Establecer tiempo de vida de la sesión en segundos
$inactividad = 60;
if(isset($_SESSION["timeout"])){
    $sessionTTL = time() - $_SESSION["timeout"];
if($sessionTTL > $inactividad){
    session_destroy();
    exit();
}
}

$_SESSION["timeout"] = time();
// Inicializamos el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Productos disponibles
$productos = array("patatas" => 1.50, "melones" => 2.00, "manzanas" => 0.75, "kiwis" => 1.25);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    if (isset($productos[$producto])) {
        if (isset($_SESSION['carrito'][$producto])) {
            $_SESSION['carrito'][$producto] += $cantidad;
        } else {
            $_SESSION['carrito'][$producto] = $cantidad;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
</head>
<body>
    <h1>TIENDA</h1>
    <form action="index.php" method="POST">
        <label for="producto">Seleccionar producto:</label>
        <select name="producto" id="producto">
            <?php foreach ($productos as $producto => $precio) { ?>
                <option value="<?php echo $producto; ?>"><?php echo ucfirst($producto); ?> - €<?php echo number_format($precio, 2); ?></option>
            <?php } ?>
        </select>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required>
        <button type="submit">Agregar al carrito</button>
    </form>
    <a href="carrito.php">Ver carrito</a>
</body>
</html>
