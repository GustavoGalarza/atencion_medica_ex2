<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Diagnósticos</title>
</head>
<body>
    <h1>Formulario de Diagnósticos</h1>
    <form action="diagnostico_DB.php" method="POST">
        <label for="paciente_id">ID del Paciente:</label>
        <select id="paciente_id" name="paciente_id" required>
            <option value="">Selecciona un ID de paciente</option>
            <?php
            $host = "localhost";
            $usuario = "root"; 
            $contrasena = ""; 
            $base_datos = "atencion_medica"; 
            $conexion = new mysqli($host, $usuario, $contrasena, $base_datos);
            if ($conexion->connect_error) {
                die("Error de conexión a la base de datos: " . $conexion->connect_error);
            }
            $sql = "SELECT ID_Paciente, Nombre FROM Pacientes";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['ID_Paciente'] . "'>" . $row['ID_Paciente'] . " - " . $row['Nombre'] . "</option>";
                }
            }
            $conexion->close();
            ?>
        </select><br><br>

        <label for="condicion_medica">Condición Médica:</label>
        <input type="text" id="condicion_medica" name="condicion_medica" required><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <input type="submit" name="submit" value="Guardar">
    </form>

    <?php
    if (isset($_GET['mensaje'])) {
        echo "<p>{$_GET['mensaje']}</p>";
    }
    ?>
</body>
</html>
