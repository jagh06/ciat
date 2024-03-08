<?php
require_once "../../conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n_universidad = $_POST["n-universidad"];
    $id_uni = $_POST["id-uni"];

    $sql = "UPDATE universidades SET nombre_uni='$n_universidad' WHERE id = $id_uni";
    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
        header("Location: ../formularios.php");
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
        header("Location: ../formularios.php");
    }

    $conn->close();
}
