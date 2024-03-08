<?php
// Verificar si se ha enviado un ID válido para eliminar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID del registro a eliminar
    $id = $_GET['id'];

    require_once "../../conexion.php";

    // Preparar la consulta SQL para eliminar el registro
    $sql = "DELETE FROM area_interes WHERE id = ?";

    // Preparar la sentencia
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("i", $id);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo "Registro eliminado correctamente.";
        header('Location: ../formularios.php');
    } else {
        echo "Error al eliminar registro: " . $conn->error;
        header('Location: ../formularios.php');
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "ID de registro no válido.";
}
