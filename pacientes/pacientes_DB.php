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
        $nombre = $_POST['nombre'];
        $fechaNacimiento = $_POST['fecha_nacimiento'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $sql = "INSERT INTO Pacientes (Nombre, FechaNacimiento, Direccion, Telefono) VALUES ('$nombre', '$fechaNacimiento', '$direccion', '$telefono')";
        
        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Paciente agregado exitosamente.";
        } else {
            $mensaje = "Error al agregar el paciente: " . $conexion->error;
        }

        
        header("Location: pacientes_insertar.php?mensaje=" . urlencode($mensaje));
        exit(); 
    }
    if (isset($_POST['submit']) && $_POST['submit'] == "edit") {
        $idPaciente = $_POST['idPaciente'];
        $nombre = $_POST['nombre'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
    
        
        $select_query = "SELECT ID_Paciente FROM pacientes WHERE Nombre='$idPaciente'";
        $result = mysqli_query($conexion, $select_query);
    
        if ($result && $row = mysqli_fetch_assoc($result)) {
            $idPaciente = $row['ID_Paciente'];
    
            $sql = "UPDATE Pacientes SET Nombre='$nombre', FechaNacimiento='$fechaNacimiento', Direccion='$direccion', Telefono='$telefono' WHERE ID_Paciente=$idPaciente";
    
            if ($conexion->query($sql) === TRUE) {
                $mensaje = "Paciente modificado exitosamente.";
            } else {
                $mensaje = "Error al modificar el paciente: " . $conexion->error;
            }
        } else {
            $mensaje = "Error al obtener el ID del paciente.";
        }
    
        
        header("Location: pacientes_modificar.php?mensaje=" . urlencode($mensaje));
        exit(); 
    }
}
$conexion->close();
?>
