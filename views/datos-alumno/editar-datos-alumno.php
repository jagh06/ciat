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
    // $f_perfil = file_get_contents($_FILES['f-perfil']["tmp_name"]);
    $num_imss = $_POST["num-imss"];
    $f_nacimiento = $_POST["f-nacimiento"];
    $periodo = $_POST["periodo"];
    $area = $_POST["area"];
    // $cv = file_get_contents($_FILES['cv']["tmp_name"]);

    $sql = "UPDATE alumnos SET matricula = '$matricula', correo = '$correo', 
    nombre = '$nombre', apellidos = '$apellidos',
    carrera = '$carrera', num_telefono = '$telefono', num_imss = '$num_imss',
    f_nacimiento = '$f_nacimiento', periodo_estadia = '$periodo', 
    area_interes = '$area' WHERE id = $id";

if (mysqli_query($conn, $sql)) {
    echo "Datos de usuario actualizados correctamente.";
    header("Location: ./edit-alumno.php?id=$id");
} else {
    echo "ERROR: No se pudo ejecutar la consulta: $sql. " . mysqli_error($conexion);
    header("Location: ./edit-alumno.php?id=$id");
}


}

?>