<?php
// Verificar si se han enviado datos mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos
    require_once "../../conexion.php";

    // Obtener los datos enviados
    $universidad = $_POST["nombreuni"];
    // $carreras = $_POST["carrera"];

    $sql = "INSERT INTO universidades (nombre_uni) 
        VALUES ('$universidad')";
    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente.";
        header('Location: ../formularios.php');
        // $buscaruni = "SELECT id FROM universidades WHERE nombre_uni = '$universidad'";
        // $resultuni = $conn->query($buscaruni);
        // // // Verificar si se encontró el usuario
        // if ($resultuni->num_rows > 0) {
        //     // Obtener el ID del usuario
        //     $fila = $resultuni->fetch_assoc();
        //     $id_uni = $fila["id"];
        //     echo "$id_uni";

        //     foreach ($carreras as $carrera) {
        //         $insert_carrera = "INSERT INTO carreras (nombre_carrera, id_uni) 
        //              VALUES ('$carrera', $id_uni)";
        //         if ($conn->query($insert_carrera) !== TRUE) {
        //             echo "Error: " . $insert_carrera . "<br>" . $conn->error;
        //         } else {
        //             header('Location: ../formularios.php');
        //             //     exit;
        //         }
        //     }
        // } else {
        //     echo "No se encontró ningún usuario con el nombre especificado.";
        // }
    } else {
        echo "Error al insertar datos: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
