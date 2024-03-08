<?php

require_once "../../conexion.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $nombrecomercial = $_POST["nombre-comercial"];
    $razonsocial = $_POST["razon-social"];
    $rfc = $_POST["rfc"];

    $calle = $_POST["calle"];
    $colonia= $_POST["colonia"];
    $ciudad = $_POST["ciudad"];
    $estado = $_POST["estado"];
    $num_exterior = $_POST["num-ext"];
    $num_interior = $_POST["num-int"];
    $cp = $_POST["cp"];

    $nombre_director= $_POST["nombre-director"];
    $ap_director= $_POST["apellidos-director"];
    $tel_director= $_POST["tel-director"];
    $email_director = $_POST["email-director"];

    $nombre_admin= $_POST["nombre-admin"];
    $ap_admin = $_POST["apellidos-admin"];
    $tel_admin = $_POST["tel-admin"];
    $email_admin  = $_POST["email-admin"];

    $sql = "UPDATE empresas SET nombre_comercial = '$nombrecomercial', 
    razon_social = '$razonsocial', rfc= '$rfc', calle= '$calle', 
    colonia = '$colonia', ciudad = '$ciudad', estado = '$estado', 
    num_exterior = '$num_exterior', num_interior = '$num_interior', cp = '$cp',
    nombre_director = '$nombre_director', 
    apellidos_direc = '$ap_director', telefono_direc = '$tel_director', email_direc = '$email_director',
    nombre_admin = '$nombre_admin', 
    apellidos_admin = '$ap_admin', telefono_admin = '$tel_admin', email_admin = '$email_admin' 
    WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        echo "Datos de la empresa actualizados correctamente.";
        header("Location: ../empresas.php");
        // header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    } else {
        echo "ERROR: No se pudo ejecutar la consulta: $sql. " . mysqli_error($conexion);
        // header("Location: ./edit-alumno.php?id=$id");
    }
}
