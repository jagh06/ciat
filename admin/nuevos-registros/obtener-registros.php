<?php
// Conexión a la base de datos
require_once "../../conexion.php";
// Obtener el ID del registro
$id = $_POST['id'];

// Consulta SQL para obtener los detalles del registro
$sql = "SELECT * FROM universidades WHERE id = $id";
$result = $conexion->query($sql);

// Mostrar los detalles del registro
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<p>ID: " . $row['id'] . "</p>";
    echo "<p>Nombre: " . $row['nombre_uni'] . "</p>";
    // Agrega aquí más campos según sea necesario
} else {
    echo "No se encontró el registro";
}
$conexion->close();
?>
