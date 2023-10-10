<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Pacientes</title>
</head>
<body>
    <h1>Formulario de Pacientes</h1>
    <form action="pacientes_DB.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br><br>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion"><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono"><br><br>

        <input type="submit" name="submit" value="Guardar">
    </form>

    <?php
    if (isset($_GET['mensaje'])) {
        echo "<p>{$_GET['mensaje']}</p>";
    }
    ?>
</body>
</html>
