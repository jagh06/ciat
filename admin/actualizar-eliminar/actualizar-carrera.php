<?php
require_once "../../conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n_carrera = $_POST["n-carrera"];
    $id_carrera = $_POST["id-carrera"];

    $sql = "UPDATE carreras SET nombre_carrera='$n_carrera' WHERE id = $id_carrera";
    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
        header("Location: ../formularios.php");
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
        header("Location: ../formularios.php");
    }

    $conn->close();
}
