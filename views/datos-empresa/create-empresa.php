<?php
require_once "../../conexion.php";
if ($_SERVER["REQUEST_METHOD"] && isset($_FILES["csf"]) && $_FILES["csf"]["error"] == UPLOAD_ERR_OK) {

    $nombrecomercial = $_POST["nombrecomercial"];
    $razonsocial = $_POST["razonsocial"];
    $rfc = $_POST["rfc"];
    $csf = file_get_contents($_FILES['csf']["tmp_name"]);


    $estado = $_POST["estado"];
    $ciudad = $_POST["ciudad"];
    $colonia = $_POST["colonia"];
    $calle = $_POST["calle"];
    $num_ext = $_POST["num_ext"];
    $num_int =  $_POST["num_int"];
    $cp = $_POST["cp"];

    $nombre_director = $_POST["nombre-director"];
    $apellidos_director = $_POST["apellidos-director"];
    $tel_director = $_POST["tel-director"];
    $email_director = $_POST["email-director"];

    $nombre_admin = $_POST["nombre-admin"];
    $apellidos_admin = $_POST["apellidos-admin"];
    $tel_admin = $_POST["tel-admin"];
    $email_admin = $_POST["email-admin"];

    // crear ruta de constancia de situacion fiscal
    $directorio_csf = "./empresa-csf/$rfc"; 
    $ruta_csf = $directorio_csf . uniqid() . '_' . basename($_FILES["csf"]["name"]);
    move_uploaded_file($_FILES["csf"]["tmp_name"], $ruta_csf);


    // $nombre_responsable = $_POST["nombre-responsable"];
    // $appaterno_responsable = $_POST["ap-paterno-responsable"];
    // $apmaterno_responsable = $_POST["ap-materno-responsable"];
    // $tel_responsable = $_POST["tel-responsable"];
    // $email_responsable = $_POST["email-responsable"];

    $sql = "INSERT INTO empresas (nombre_comercial, razon_social, rfc, csf, estado, ciudad,
        colonia, calle, num_exterior, num_interior, cp,
     	nombre_director, apellidos_direc, telefono_direc, email_direc,
     	nombre_admin, apellidos_admin, telefono_admin, email_admin) 
        VALUES ('$nombrecomercial','$razonsocial','$rfc', '$ruta_csf', 
        '$estado', '$ciudad', '$colonia', '$calle', '$num_ext', '$num_int', '$cp',
        '$nombre_director', '$apellidos_director', '$tel_director', '$email_director',
        '$nombre_admin', '$apellidos_admin', '$tel_admin', '$email_admin' )";

    if ($conn->query($sql) === TRUE) {
        echo "Empresa registrada exitosamente";
        header("Location: ./en-espera.php");
        exit();
    } else {
        echo "Error al registrar empresa: " . $conn->error;
        header("Location: ./subir-datos-empresa.php");
        exit();
    }
}

$conn->close();
