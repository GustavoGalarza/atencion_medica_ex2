<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pacientes</title>
    <style>
        .pacientes-container {
            border: 1px solid #ccc;
            margin: 10px;
            padding: 10px;
        }

        .pacientes {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_datos = "atencion_medica";
    $conexion = new mysqli($host, $usuario, $contrasena, $base_datos);
    
    
    if ($conexion->connect_error) {
        die("Error de conexión a la base de datos: " . $conexion->connect_error);
    }
    
    $select_query = "SELECT * FROM pacientes LIMIT 10";
    $result = $conexion->query($select_query); 

    echo '<div class="pacientes-container">';

    while ($row = $result->fetch_assoc()) { 
        echo '<div class="pacientes">';
        echo '<h2>Pacientes</h2>';
        echo '<p>ID_paciente: ' . $row['ID_Paciente'] . '</p>';
        echo '<p>Nombre: ' . $row['Nombre'] . '</p>';
        echo '<p>FechaNacimiento: ' . $row['FechaNacimiento'] . '</p>';
        echo '<p>Direccion: ' . $row['Direccion'] . '</p>';
        echo '<p>Telefono: ' . $row['Telefono'] . '</p>';
       
        echo '</div>';
    }

    echo '</div>'; 

    $conexion->close(); 
?>
</body>
</html>