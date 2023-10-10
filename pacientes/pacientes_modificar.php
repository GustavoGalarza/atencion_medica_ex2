<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Paciente</title>
    <style>
        label {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>

<h2>Modificar Paciente</h2>

<form action="pacientes_DB.php" method="post">
    <label for="idPaciente">Seleccionar Paciente:</label>
    <select id="idPaciente" name="idPaciente" required>
    <?php
            $mysqli_link = mysqli_connect("localhost", "root", "", "atencion_medica");
            if (mysqli_connect_errno()) {
                printf("MySQL connection failed with the error: %s", mysqli_connect_error());
                exit;
            }

            $select_query = "SELECT Nombre FROM pacientes";
            $result = mysqli_query($mysqli_link, $select_query);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<option value="' . $row['Nombre'] . '">' . $row['Nombre'] . '</option>';
            }

            mysqli_close($mysqli_link);
            ?>
    </select>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="fechaNacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fechaNacimiento" name="fechaNacimiento">

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion">

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono">
    <button type="submit" name="submit" value="edit">Modificar Paciente</button>
</form>
<?php
    if (isset($_GET['mensaje'])) {
        echo "<p>{$_GET['mensaje']}</p>";
    }
    ?>
</body>
</html>