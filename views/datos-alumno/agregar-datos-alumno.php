<?php

require_once '../../conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["f-perfil"]) && $_FILES["f-perfil"]["error"] == UPLOAD_ERR_OK) {
    $id_alumno = $_POST["id_alumno"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $matricula = $_POST["matricula"];
    $carrera = $_POST["carrera"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $f_perfil = file_get_contents($_FILES['f-perfil']["tmp_name"]);
    $num_imss = $_POST["num-imss"];
    $f_nacimiento = $_POST["f-nacimiento"];
    $periodo = $_POST["periodo"];
    $area = $_POST["a-interes"];
    $cv = file_get_contents($_FILES['cv']["tmp_name"]);

    $curp = $_POST["curp"];
    $curp_upper = strtoupper($curp);

    $plan_estudios = file_get_contents($_FILES['plan']["tmp_name"]);
    $disponibilidad = $_POST["disponibilidad"];
    $calificacion =  $_POST["calificacion"];
    $universidad = $_POST["universidad"];


    // Para guardar imagenes y archivos pdf
    $directorio_images = "./alumnoimages/$matricula";
    $directorio_pdf = "./alumnocv/$matricula";
    $directorio_plan = "./alumnoplan/$matricula";

    $ruta_image = $directorio_images . uniqid() . '_' . basename($_FILES["f-perfil"]["name"]);
    move_uploaded_file($_FILES["f-perfil"]["tmp_name"], $ruta_image);

    $ruta_cv = $directorio_pdf . uniqid() . '_' . basename($_FILES["cv"]["name"]);
    move_uploaded_file($_FILES["cv"]["tmp_name"], $ruta_cv);

    $ruta_plan = $directorio_plan . uniqid() . '_' . basename($_FILES["plan"]["name"]);
    move_uploaded_file($_FILES["plan"]["tmp_name"], $ruta_plan);

    $nombre_uni = "";
    $select_uni = "SELECT nombre_uni FROM universidades WHERE id = $universidad LIMIT 1";
    $resultado = $conn->query($select_uni);
    if ($resultado) {
        while ($row = $resultado->fetch_assoc()) {
            $nombre_uni = $row["nombre_uni"];
        }
    } else {
        echo "Error al ejecutar la consulta: " . $conn->error;
    }

    $sql = "INSERT INTO alumnos ( matricula, correo, nombre,
    apellidos, carrera, num_telefono, imagen, num_imss, f_nacimiento, curp, disponibilidad,
    calificacion, universidad, plan_estudios,
    periodo_estadia, area_interes, cv, estatus) VALUES ('$matricula', '$correo', 
    '$nombre', '$apellidos', '$carrera', '$telefono',
    '$ruta_image', '$num_imss','$f_nacimiento', '$curp_upper', '$disponibilidad', 
    '$calificacion', '$nombre_uni', '$ruta_plan', '$periodo', '$area', '$ruta_cv', 1)";

    // Ejecutar la sentencia SQL
    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente";
        header("Location: ../en-espera-de-respuesta.php");
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    // $sql = "UPDATE alumnos SET nombre = '$nombre', apellidos = '$apellidos',
    // carrera = '$carrera', num_telefono = '$telefono', 
    // imagen = '$ruta_image', num_imss = '$num_imss', f_nacimiento = '$f_nacimiento', 
    // periodo_estadia = '$periodo', area_interes = '$area', cv = '$ruta_pdf', 
    // plan_estudios = '$ruta_plan', disponibilidad = '$disponibilidad', 
    // calificacion = '$calificacion', univ = '$nombre_uni', curp = '$curp_upper' 
    // WHERE matricula = '$matricula'";

    // if (mysqli_query($conn, $sql)) {
    //     $estado_actualizado = "UPDATE alumnos SET datos_agregados = TRUE WHERE id = $id_alumno";
    //     if ($conn->query($estado_actualizado) === TRUE) {
    //         header("Location: ../en-espera-de-respuesta.php");
    //         echo "Datos de usuario actualizados correctamente.";
    //     }
    // } else {
    //     echo "ERROR: No se pudo ejecutar la consulta: $sql. " . mysqli_error($conexion);
    // }

    $conn->close();
}
