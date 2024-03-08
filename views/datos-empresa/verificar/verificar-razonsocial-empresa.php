<?php
// Datos de conexión a la base de datos
require_once "../../../conexion.php";
// Verificar si se ha enviado la matrícula desde la solicitud AJAX
if(isset($_POST['razonsocial'])) {
    // Obtener la matrícula enviada desde la solicitud AJAX
    $razonsocial = $_POST['razonsocial'];

    // Consulta SQL para verificar si la matrícula está en uso
    $sql = "SELECT * FROM empresas WHERE razon_social = '$razonsocial'";
    $resultado = $conn->query($sql);

    // Verificar si se encontró algún resultado
    if ($resultado->num_rows > 0) {
        echo 'repetida'; // La matrícula se repite
    } else {
        echo 'ok'; // La matrícula no se repite
    }
} else {
    echo 'No se proporcionó ninguna empresa';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
