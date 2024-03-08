<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../../conexion.php";
    $carrera = $_POST["nombrecarrera"];

    $nueva_carrera = "INSERT INTO carreras (nombre_carrera) 
        VALUES ('$carrera')";
        if ($conn->query($nueva_carrera) === TRUE) {
            echo "Datos insertados correctamente.";
            header('Location: ../formularios.php');
        } else {
            echo "Error al insertar datos: " . $conn->error;
            header('Location: ../formularios.php');
        }
}

?>
