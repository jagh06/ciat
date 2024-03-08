<?php

require_once '../conexion.php';

// Procesar datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];
    $email = $_POST["correo"];
    $contrasenia = $_POST["contrasenia"];

    $passencrypt = password_hash($contrasenia, PASSWORD_DEFAULT);

    // Insertar datos en la tabla de usuarios
    $sql = "INSERT INTO alumnos (matricula, correo, contrasenia) VALUES ('$matricula', '$email', '$passencrypt')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario registrado exitosamente";
        header("Location: ../login/login-estudiante.php");
        exit();
    } else {
        echo "Error al registrar usuario: " . $conn->error;
        header("Location: ./registro-estudiante.php");
        exit();
    }
}

$conn->close();
