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

   
}


$conexion->close();
?>
