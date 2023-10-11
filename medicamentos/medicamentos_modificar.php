<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Medicamentos Recetados</title>
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
            <li><a href="/resultados_laboratorio/resultados_laboratorio.html"><i class="fas fa-notes-medical"></i> Resultados de LAB</a>
                <ul class="submenu">
                    <li><a href="/resultados_laboratorio/resultados_laboratorio_agregar.php"><i class="fas fa-plus"></i> Agregar</a></li>
                    <li><a href="/resultados_laboratorio/resultados_laboratorio_modificar.php"><i class="fas fa-edit"></i> Modificar</a></li>
                    <li><a href="/resultados_laboratorio/resultados_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="/resultados_laboratorio/resultados_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
                </ul>
            </li>
            <li><a href="medicamentos.html"><i class="fas fa-pills"></i> Medicamentos recetados</a>
                <ul class="submenu">
                    <li><a href="medicamentos_agregar.php"><i class="fas fa-plus"></i> Agregar</a></li>
                    <li><a href="medicamentos_modificar.php"><i class="fas fa-edit"></i> Modificar</a></li>
                    <li><a href="medicamentos_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="medicamentos_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
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
    <div class="contenido">
    
<br><br>
    <form action="medicamentos_DB.php" method="POST">
        <h2>Modificar Medicamento</h2>
        <label for="medicamento_id">Seleccionar el Id Medicamento a modificar:</label>
        <select id="medicamento_id" name="medicamento_id" required>
            <?php
            $mysqli_link = mysqli_connect("localhost", "root", "", "atencion_medica");
            if (mysqli_connect_errno()) {
                printf("MySQL connection failed with the error: %s", mysqli_connect_error());
                exit;
            }

            $select_query = "SELECT ID_Medicamento, NombreMedicamento FROM Medicamentos";
            $result = mysqli_query($mysqli_link, $select_query);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<option value="' . $row['ID_Medicamento'] . '">' . $row['ID_Medicamento'] . ' - ' . $row['NombreMedicamento'] . '</option>';
            }

            mysqli_close($mysqli_link);
            ?>
        </select><br><br>

        <label for="paciente_id">Nuevo ID del Paciente:</label>
        <select id="paciente_id" name="paciente_id" required>
            <?php
            $mysqli_link = mysqli_connect("localhost", "root", "", "atencion_medica");
            if (mysqli_connect_errno()) {
                printf("MySQL connection failed with the error: %s", mysqli_connect_error());
                exit;
            }

            $select_query = "SELECT ID_Paciente, Nombre FROM Pacientes";
            $result = mysqli_query($mysqli_link, $select_query);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo '<option value="' . $row['ID_Paciente'] . '">' . $row['ID_Paciente'] . ' - ' . $row['Nombre'] . '</option>';
            }

            mysqli_close($mysqli_link);
            ?>
        </select><br><br>

        <label for="nombre_medicamento">Nuevo Nombre del Medicamento:</label>
        <input type="text" id="nombre_medicamento" name="nombre_medicamento" required><br><br>

        <label for="dosis">Dosis:</label>
        <input type="text" id="dosis" name="dosis" required><br><br>

        <label for="instrucciones">Instrucciones de Administración:</label>
        <textarea id="instrucciones" name="instrucciones" rows="4" required></textarea><br><br>

        <button type="submit" name="submit" value="Modificar">Modificar Medicamento</button>
    </form>

    <?php
    if (isset($_GET['mensaje'])) {
        echo "<p>{$_GET['mensaje']}</p>";
    }
    ?>
    </div>
    <div class="footer">
        <p>&copy; 2023 Sistema de Gestión de la Clínica Médica</p>
    </div>
</body>

</html>
