<!DOCTYPE html>
<html>
<head>
    <title>Gimnasio Iron Forge</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <h2>Bienvenido, <?= htmlspecialchars(App\Helpers\Session::get('usuario')); ?></h2>
        <nav>
            <h3>Clases Disponibles</h3>
            <ul>
                <?php foreach (App\Models\Clase::getClases() as $clase): ?>
                    <li><a href="clases.php?clase=<?= urlencode($clase->getNombre()); ?>">
                        <?= htmlspecialchars($clase->getNombre()); ?>
                    </a></li>
                <?php endforeach; ?>
            </ul>
            <a href="logout.php">Cerrar Sesión</a>
        </nav>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
