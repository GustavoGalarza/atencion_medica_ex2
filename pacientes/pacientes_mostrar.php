<?php

$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "atencion_medica";

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}


$datos_paciente = "";
$tabla_pacientes = "";


if (isset($_POST['paciente_id']) && !empty($_POST['paciente_id'])) {
    $paciente_id = $_POST['paciente_id'];


    $sql = "SELECT * FROM Pacientes WHERE ID_Paciente = $paciente_id";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $datos_paciente = "Nombre: " . $row['Nombre'] . "<br>";
        $datos_paciente .= "Fecha de Nacimiento: " . $row['FechaNacimiento'] . "<br>";
        $datos_paciente .= "Dirección: " . $row['Direccion'] . "<br>";
        $datos_paciente .= "Teléfono: " . $row['Telefono'] . "<br>";
    } else {
        $datos_paciente = "Paciente no encontrado.";
    }
}


if (isset($_POST['mostrar_todos_pacientes'])) {

    $sql = "SELECT * FROM Pacientes";

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $tabla_pacientes = "<table border='1'>";
        $tabla_pacientes .= "<tr><th>ID</th><th>Nombre</th><th>Fecha de Nacimiento</th><th>Dirección</th><th>Teléfono</th></tr>";
        while ($row = $resultado->fetch_assoc()) {
            $tabla_pacientes .= "<tr>";
            $tabla_pacientes .= "<td>" . $row['ID_Paciente'] . "</td>";
            $tabla_pacientes .= "<td>" . $row['Nombre'] . "</td>";
            $tabla_pacientes .= "<td>" . $row['FechaNacimiento'] . "</td>";
            $tabla_pacientes .= "<td>" . $row['Direccion'] . "</td>";
            $tabla_pacientes .= "<td>" . $row['Telefono'] . "</td>";
            $tabla_pacientes .= "</tr>";
        }
        $tabla_pacientes .= "</table>";
    } else {
        $tabla_pacientes = "No hay pacientes registrados.";
    }
}


$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de pacientes</title>
    <link rel="stylesheet" type="text/css" href="/styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <nav>
        <ul class="menu">
            <li><a href="/index.html"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="pacientes.html"><i class="fas fa-user"></i> Gestion Pacientes</a>
                <ul class="submenu">
                    <li><a href="pacientes_insertar.php"><i class="fas fa-plus"></i> Agregar</a></li>
                    <li><a href="pacientes_modificar.php"><i class="fas fa-edit"></i> Modificar</a></li>
                    <li><a href="pacientes_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="pacientes_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
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
            <li><a href="/resultados_laboratorio/resultados_laboratorio.html"><i class="fas fa-notes-medical"></i>
                    Resultados de LAB</a>
                <ul class="submenu">
                    <li><a href="/resultados_laboratorio/resultados_laboratorio_agregar.php"><i class="fas fa-plus"></i>
                            Agregar</a></li>
                    <li><a href="/resultados_laboratorio/resultados_laboratorio_modificar.php"><i
                                class="fas fa-edit"></i> Modificar</a> </li>
                    <li><a href="/resultados_laboratorio/resultados_eliminar.php"><i class="fas fa-trash"></i>
                            Eliminar</a></li>
                    <li><a href="/resultados_laboratorio/resultados_mostrar.php"><i class="fas fa-list"></i> Mostrar</a>
                    </li>
                </ul>
            </li>
            <li><a href="/medicamentos/medicamentos.html"><i class="fas fa-pills"></i> Medicamentos recetados</a>
                <ul class="submenu">
                    <li><a href="/medicamentos/medicamentos_agregar.php"><i class="fas fa-plus"></i> Agregar</a></li>
                    <li><a href="/medicamentos/medicamentos_modificar.php"><i class="fas fa-edit"></i> Modificar</a>
                    </li>
                    <li><a href="/medicamentos/medicamentos_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="/medicamentos/medicamentos_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
                </ul>
            </li>
            <li><a href="/planes_tratamiento/planes_tratamiento.html"><i class="fas fa-clipboard-list"></i> Planes de
                    Tratamiento</a>
                <ul class="submenu">
                    <li><a href="/planes_tratamiento/planes_tratamiento_agregar.php"><i class="fas fa-plus"></i>
                            Agregar</a></li>
                    <li><a href="/planes_tratamiento/planes_tratamiento_modificar.php"><i class="fas fa-edit"></i>
                            Modificar</a></li>
                    <li><a href="/planes_tratamiento/planes_eliminar.php"><i class="fas fa-trash"></i> Eliminar</a></li>
                    <li><a href="/planes_tratamiento/planes_mostrar.php"><i class="fas fa-list"></i> Mostrar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="background-image"></div>
    <div class="contenido">



        <form action="pacientes_mostrar.php" method="POST">
            <h2>Mostrar Pacientes Registrados</h2>
            <label for="paciente_id">ID del Paciente:</label>
            <input type="text" id="paciente_id" name="paciente_id">
            <input type="submit" value="Mostrar Paciente">
                <?php
            echo $datos_paciente;
            ?>
            </form>
<br>

        <form action="pacientes_mostrar.php" method="POST">
            <h2>Mostrar Todos los Pacientes:</h2>
            <input type="submit" name="mostrar_todos_pacientes" value="Mostrar Todos los Pacientes">
            <?php
            echo $tabla_pacientes;
            ?>
        </form>
        
    </div>
    <div class="footer">
        <p>&copy; 2023 Sistema de gestion de la Clínica Médica</p>
    </div>
</body>

</html>