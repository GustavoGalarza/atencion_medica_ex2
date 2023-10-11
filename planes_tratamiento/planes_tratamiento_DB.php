<?php
$host = "localhost";
$usuario = "root"; 
$contrasena = ""; 
$base_datos = "atencion_medica"; 
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "Guardar") {
        $paciente_id = $_POST['paciente_id']; 
        $diagnostico_id = $_POST['diagnostico_id']; 
        $tratamiento_recomendado = $_POST['tratamiento_recomendado'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $sql = "INSERT INTO PlanesTratamiento (ID_Paciente, ID_Diagnostico, TratamientoRecomendado, FechaInicio) VALUES ('$paciente_id', '$diagnostico_id', '$tratamiento_recomendado', '$fecha_inicio')";
        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Plan de tratamiento agregado exitosamente.";
        } else {
            $mensaje = "Error al agregar el plan de tratamiento: " . $conexion->error;
        }
        header("Location: planes_tratamiento_agregar.php?mensaje=" . urlencode($mensaje));
        exit(); 
    }
    if ($_POST['submit'] == "Modificar") {
        $plan_tratamiento_id = $_POST['plan_tratamiento_id'];
        $idPaciente = $_POST['idPaciente'];
        $idDiagnostico = $_POST['idDiagnostico'];
        $tratamientoRecomendado = $_POST['tratamientoRecomendado'];
        $fechaInicio = date('Y-m-d', strtotime($_POST['fechaInicio']));

        $sql = "UPDATE PlanesTratamiento SET ID_Paciente='$idPaciente', ID_Diagnostico='$idDiagnostico', TratamientoRecomendado='$tratamientoRecomendado', FechaInicio='$fechaInicio' WHERE ID_PlanTratamiento='$plan_tratamiento_id'";

        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Plan de tratamiento modificado exitosamente.";
        } else {
            $mensaje = "Error al modificar el plan de tratamiento: " . $conexion->error;
        }

        header("Location: planes_tratamiento_modificar.php?mensaje=" . urlencode($mensaje));
        exit();
    }
}
$conexion->close();
?>
