<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Resultados de Laboratorio</title>
    <link rel="stylesheet" type="text/css" href="/styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <nav>
        <ul class="menu">
            <li><a href="/index.html"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="/pacientes/pacientes.html"><i class="fas fa-user"></i> Gestion Pacientes</a>
                <ul class="submenu">
                    <li><a href="/pacientes/pacientes_insertar.php"><i class="fas fa-plus"></i> Agregar</a></li>
                    <li><a href="/pacientes/pacientes_modificar.php"><i class="fas fa-edit"></i> Modificar</a></li>
                    <li><a href="/pacientes/pacientes_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="/pacientes/pacientes_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
                </ul>
            </li>
            <li><a href="/diagnostico/diagnosticos.html"><i class="fas fa-stethoscope"></i> Estados y diagnósticos</a>
                <ul class="submenu">
                    <li><a href="/diagnostico/diagnostico_agregar.php"><i class="fas fa-plus"></i> Agregar</a></li>
                    <li><a href="/diagnostico/diagnostico_modificar.php"><i class="fas fa-edit"></i> Modificar</a></li>
                    <li><a href="/diagnostico/diagnosticos_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="/diagnostico/diagnosticos_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
                </ul>
            </li>
            <li><a href="resultados_laboratorio.html"><i class="fas fa-notes-medical"></i> Resultados de LAB</a>
                <ul class="submenu">
                    <li><a href="resultados_laboratorio_agregar.php"><i class="fas fa-plus"></i> Agregar</a></li>
                    <li><a href="resultados_laboratorio_modificar.php"><i class="fas fa-edit"></i> Modificar</a></li>
                    <li><a href="resultados_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="resultados_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
                </ul>
            </li>
            <li><a href="/medicamentos/medicamentos.html"><i class="fas fa-pills"></i> Medicamentos recetados</a>
                <ul class="submenu"> 
                    <li><a href="/medicamentos/medicamentos_agregar.php"><i class="fas fa-plus"></i> Agregar</a></li>
                    <li><a href="/medicamentos/medicamentos_modificar.php"><i class="fas fa-edit"></i> Modificar</a></li>
                    <li><a href="/medicamentos/medicamentos_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="/medicamentos/medicamentos_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
                </ul>
            </li>
            <li><a href="/planes_tratamiento/planes_tratamiento.html"><i class="fas fa-clipboard-list"></i> Planes de Tratamiento</a>
                <ul class="submenu">
                    <li><a href="/planes_tratamiento/planes_tratamiento_agregar.php"><i class="fas fa-plus"></i> Agregar</a></li>
                    <li><a href="/planes_tratamiento/planes_tratamiento_modificar.php"><i class="fas fa-edit"></i> Modificar</a></li>
                    <li><a href="/planes_tratamiento/planes_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="/planes_tratamiento/planes_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="background-image"></div>
    <br>
    <div class="contenido">
    <br>
    <form action="resultados_laboratorio_DB.php" method="POST">
        <h2>Formulario de Resultados de Laboratorio</h2>
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

        <label for="prueba">Prueba:</label>
        <input type="text" id="prueba" name="prueba" required><br><br>

        <label for="valor">Valor:</label>
        <input type="text" id="valor" name="valor" required><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <input type="submit" name="submit" value="Guardar">
    </form>

    <?php
    if (isset($_GET['mensaje'])) {
        echo "<p>{$_GET['mensaje']}</p>";
    }
    ?>
<div class="footer">
        <p>&copy; 2023 Sistema de Gestión de la Clínica Médica</p>
    </div>
</body>

</html>
