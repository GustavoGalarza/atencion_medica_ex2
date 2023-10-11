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
        $prueba = $_POST['prueba'];
        $valor = $_POST['valor'];
        $fecha = $_POST['fecha'];

        $sql = "INSERT INTO ResultadosLaboratorio (ID_Paciente, Prueba, Valor, Fecha) VALUES ('$paciente_id', '$prueba', '$valor', '$fecha')";

        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Resultado de laboratorio agregado exitosamente.";
        } else {
            $mensaje = "Error al agregar el resultado de laboratorio: " . $conexion->error;
        }
        header("Location: resultados_laboratorio_agregar.php?mensaje=" . urlencode($mensaje));
        exit();
    }
    // Formulario para modificar un resultado
    if (isset($_POST['submit']) && $_POST['submit'] == "Modificar") {
        $resultado_id = $_POST['resultado_id'];
        $paciente_id = $_POST['paciente_id'];
        $prueba = $_POST['prueba'];
        $valor = $_POST['valor'];
        $fecha = date('Y-m-d', strtotime($_POST['fecha']));

        $sql = "UPDATE ResultadosLaboratorio SET ID_Paciente='$paciente_id', Prueba='$prueba', Valor='$valor', Fecha='$fecha' WHERE ID_Resultado='$resultado_id'";

        if ($conexion->query($sql) === TRUE) {
            $mensaje = "Resultado de laboratorio modificado exitosamente.";
        } else {
            $mensaje = "Error al modificar el resultado de laboratorio: " . $conexion->error;
        }

        header("Location: resultados_laboratorio_modificar.php?mensaje=" . urlencode($mensaje));
        exit();
    }
}
$conexion->close();
?>