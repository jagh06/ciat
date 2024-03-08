<?php
require_once "../../../conexion.php";

if(isset($_POST['correo'])) {
    // Obtener la matrícula enviada desde la solicitud AJAX
    $correo = $_POST['correo'];

    // Consulta SQL para verificar si la matrícula está en uso
    $sql = "SELECT * FROM alumnos WHERE correo = '$correo'";
    $resultado = $conn->query($sql);

    // Verificar si se encontró algún resultado
    if ($resultado->num_rows > 0) {
        echo 'repetida'; // La matrícula se repite
    } else {
        echo 'ok'; // La matrícula no se repite
    }
} else {
    echo 'No se proporcionó ningun  correo.';
}

// Cerrar la conexión a la base de datos
$conn->close();
// Verificar si se ha enviado el correo electrónico desde la solicitud AJAX
// if (isset($_POST['correo'])) {
//     // Obtener el correo electrónico enviado desde la solicitud AJAX
//     $correo = $_POST['correo'];

//     // Consultar la base de datos para verificar si el correo electrónico ya está en uso
//     $sql = "SELECT * FROM alumnos WHERE correo = ?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("s", $correo);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     // Verificar si se encontró algún registro con el correo electrónico proporcionado
//     if ($result->num_rows > 0) {
//         echo "<span style='color: rgb(245, 26, 26);
//         font-size: 12px;
//         position: absolute;
//         margin-top: 5px;' >El correo electrónico ya está en uso.</span>";
//     } else {
//         // echo "<span style='color: green;'>El correo electrónico está disponible.</span>";
//     }

//     // Cerrar la conexión
//     $stmt->close();
//     $conn->close();
// } else {
//     echo "No se proporcionó ningún correo electrónico.";
// }
