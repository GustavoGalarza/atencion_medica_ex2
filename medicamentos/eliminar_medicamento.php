

<?php
if(isset($_POST['NombreMedicamento'])) {
    $ID_Diagnostico = $_POST['NombreMedicamento'];

    $mysqli_link = mysqli_connect("localhost", "root", "", "atencion_medica");
    if (mysqli_connect_errno()) {
        printf("MySQL connection failed with the error: %s", mysqli_connect_error());
        exit;
    }
    $delete_query = "DELETE FROM medicamentos WHERE `NombreMedicamento` = '$ID_Diagnostico'";

    if (mysqli_query($mysqli_link, $delete_query)) {
        $eliminar= 'Eliminado correctamente';
    } else {
        $eliminar= 'Error al eliminar el registro: ' . mysqli_error($mysqli_link);
    }
    header("Location: medicamentos_eliminar.php?eliminar=" . urlencode($eliminar));
    

    mysqli_close($mysqli_link);
}
?>