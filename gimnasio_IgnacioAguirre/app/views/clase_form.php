<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Clase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="img/logo.png" alt="Logo de Iron Forge">
        <h1>Donde se forjan las leyendas</h1>
    </header>
    <main>
        <h2>Formulario de Clase: <?php echo htmlspecialchars($clase->getNombre()); ?></h2>
        <form method="POST" action="procesar_formulario.php">
            <label for="dia">Seleccione un día:</label>
            <select name="dia" id="dia">
                <?php foreach ($clase->getHorarios() as $dia => $horario): ?>
                    <option value="<?php echo htmlspecialchars($dia); ?>">
                        <?php echo htmlspecialchars($dia . ' (' . $horario['hora'] . ')'); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <label for="action">Acción:</label>
            <select name="action" id="action">
                <option value="reservar">Reservar</option>
                <option value="liberar">Liberar</option>
            </select>
            <input type="hidden" name="clase" value="<?php echo htmlspecialchars($clase->getNombre()); ?>">
            <button type="submit">Enviar</button>
        </form>
    </main>
</body>
</html>
