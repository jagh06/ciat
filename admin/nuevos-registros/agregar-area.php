<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../../conexion.php";
    $area = $_POST["nombrearea"];

    $nueva_area = "INSERT INTO area_interes (nombre_area) 
        VALUES ('$area')";
        if ($conn->query($nueva_area) === TRUE) {
            echo "Datos insertados correctamente.";
            header('Location: ../formularios.php');
        } else {
            echo "Error al insertar datos: " . $conn->error;
            header('Location: ../formularios.php');
        }
}

?>
