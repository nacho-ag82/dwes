<?php
session_start();

// Productos disponibles
$productos = array("patatas" => 1.50, "melones" => 2.00, "manzanas" => 0.75, "kiwis" => 1.25);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['comprar'])) {
        // Realizar la compra, reseteamos el carrito
        $_SESSION['carrito'] = array();
        echo "<p>Compra realizada con éxito!</p>";
    } elseif (isset($_POST['vaciar'])) {
        // Vaciar el carrito
        $_SESSION['carrito'] = array();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <?php if (empty($_SESSION['carrito'])) { ?>
        <p>El carrito está vacío.</p>
    <?php } else { ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['carrito'] as $producto => $cantidad) {
                    $precio = $productos[$producto];
                    $subtotal = $precio * $cantidad;
                    $total += $subtotal;
                    echo "<tr>
                            <td>".ucfirst($producto)."</td>
                            <td>$cantidad</td>
                            <td>€".number_format($subtotal, 2)."</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <p>Total: €<?php echo number_format($total, 2); ?></p>
        <form action="carrito.php" method="POST">
            <button type="submit" name="comprar">Realizar Compra</button>
            <button type="submit" name="vaciar">Vaciar Carrito</button>
        </form>
    <?php } ?>
    <a href="index.php">Volver a la tienda</a>
</body>
</html>
