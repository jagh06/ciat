<?php
// Verificar si se ha enviado un ID válido para eliminar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID del registro a eliminar
    $id = $_GET['id'];

    require_once "../../conexion.php";

    // Preparar la consulta SQL para eliminar el registro
    $sql = "DELETE FROM alumnos WHERE id = ?";

    // Preparar la sentencia
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("i", $id);

    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo "Registro eliminado correctamente.";
        header('Location: ../alumnos.php');
    } else {
        echo "Error al eliminar registro: " . $conexion->error;
        header('Location: ../alumnos.php');
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conexion->close();
} else {
    echo "ID de registro no válido.";
}
