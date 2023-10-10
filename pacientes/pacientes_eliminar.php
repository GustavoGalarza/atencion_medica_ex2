<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Paciente</title>
</head>
<body>

    <form method="post" action="eliminar_paciente.php">
        <label for="Nombre">Nombre del Paciente:</label>
        <select name="Nombre" id="Nombre">
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
        <input type="submit" value="Eliminar">
    </form>
    <?php
    if (isset($_GET['eliminar'])) {
        echo "<p>{$_GET['eliminar']}</p>";
    }
    ?>

   

</body>
</html>