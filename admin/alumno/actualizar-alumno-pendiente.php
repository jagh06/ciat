<?php

require_once "../../conexion.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $matricula = $_POST["matricula"];
    $carrera = $_POST["carrera"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $curp = $_POST["curp"];
    $num_imss = $_POST["num-imss"];
    $f_nacimiento = $_POST["f-nacimiento"];
    $periodo = $_POST["periodo"];
    $area = $_POST["area"];
    $disponibilidad = $_POST["disponibilidad"];
    $calificacion = $_POST["calificacion"];
    $universidad = $_POST["universidad"];

    $sql = "UPDATE alumnos SET nombre = '$nombre', apellidos = '$apellidos', 
    matricula = '$matricula', carrera = '$carrera',  num_telefono = '$telefono',
    correo = '$correo', num_imss = '$num_imss', curp = '$curp',
    f_nacimiento = '$f_nacimiento', periodo_estadia = '$periodo', 
    disponibilidad = '$disponibilidad', calificacion = '$calificacion', 
    universidad = '$universidad',
    area_interes = '$area' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Datos de usuario actualizados correctamente.";
        header("Location: ../alumnos.php");
        // header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    } else {
        echo "ERROR: No se pudo ejecutar la consulta: $sql. " . mysqli_error($conexion);
        // header("Location: ./edit-alumno.php?id=$id");
    }
}
