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
        $condicion_medica = $_POST['condicion_medica'];
        $fecha = $_POST['fecha'];

        $sql = "INSERT INTO Diagnosticos (ID_Paciente, CondicionMedica, Fecha) VALUES ('$paciente_id', '$condicion_medica', '$fecha')";
        
        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Diagnóstico agregado exitosamente.";
        } else {
            $mensaje = "Error al agregar el diagnóstico: " . $conexion->error;
        }

        
        header("Location: diagnostico_agregar.php?mensaje=" . urlencode($mensaje));
        exit(); 
    }
    if (isset($_POST['submit']) && $_POST['submit'] == "edit") {
        $idDiagnostico = $_POST['idDiagnostico'];
        $idPaciente = $_POST['idPaciente'];
        $condicionMedica = $_POST['condicionMedica'];
        
        // Asegurémonos de que la fecha esté en el formato correcto
        $fechaDiagnostico = date('Y-m-d', strtotime($_POST['fechaDiagnostico']));
    
        $sql = "UPDATE Diagnosticos SET ID_Paciente=$idPaciente, CondicionMedica='$condicionMedica', Fecha='$fechaDiagnostico' WHERE ID_Diagnostico=$idDiagnostico";
    
        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Diagnóstico modificado exitosamente.";
        } else {
            $mensaje = "Error al modificar el diagnóstico: " . $conexion->error;
        }
    
        // Redireccionar de vuelta a diagnosticos_modificar.php con el mensaje en la URL
        header("Location: diagnostico_modificar.php?mensaje=" . urlencode($mensaje));
        exit(); // Asegurarse de que el script se detiene aquí
    }

   
}


$conexion->close();
?>
