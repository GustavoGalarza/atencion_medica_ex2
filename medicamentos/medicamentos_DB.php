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
        $nombre_medicamento = $_POST['nombre_medicamento'];
        $dosis = $_POST['dosis'];
        $instrucciones = $_POST['instrucciones'];
        $sql = "INSERT INTO Medicamentos (ID_Paciente, NombreMedicamento, Dosis, InstruccionesAdministracion) VALUES ('$paciente_id', '$nombre_medicamento', '$dosis', '$instrucciones')";      
        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Medicamento agregado exitosamente.";
        } else {
            $mensaje = "Error al agregar el medicamento: " . $conexion->error;
        }  
        header("Location: medicamentos_agregar.php?mensaje=" . urlencode($mensaje));
        exit(); 
    }
    if ($_POST['submit'] == "Modificar") {
        $medicamento_id = $_POST['medicamento_id']; // Asegúrate de tener este campo en tu formulario
        $paciente_id = $_POST['paciente_id']; 
        $nombre_medicamento = $_POST['nombre_medicamento'];
        $dosis = $_POST['dosis'];
        $instrucciones = $_POST['instrucciones'];
        
        // Actualiza el medicamento utilizando el ID proporcionado
        $sql = "UPDATE Medicamentos SET ID_Paciente='$paciente_id', NombreMedicamento='$nombre_medicamento', Dosis='$dosis', InstruccionesAdministracion='$instrucciones' WHERE ID_Medicamento='$medicamento_id'";
        
        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Medicamento modificado exitosamente.";
        } else {
            $mensaje = "Error al modificar el medicamento: " . $conexion->error;
        }  

        header("Location: medicamentos_modificar.php?mensaje=" . urlencode($mensaje));
        exit(); 
    }
}
$conexion->close();
?>
