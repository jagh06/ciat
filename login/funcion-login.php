<?php

session_start();
$alert = " ";

if (!empty($_POST)) {
    if (empty($_POST['correo']) || empty($_POST['contrasenia'])) {
        $alert = "Ingrese usuario y contraseña";
    } else {
        require_once '../conexion.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $correo = $_POST['correo'];
            $matricula = $_POST['contrasenia'];

            // $sql = "SELECT * FROM alumnos WHERE correo = ? AND matricula = ?";
            // $stmt = $conn->prepare($sql);
            // $stmt->bind_param("ss", $correo, $matricula);
            // $stmt->execute();
            // $result = $stmt->get_result();

            $query = mysqli_query($conn, "SELECT * FROM alumnos WHERE correo='$correo' 
                AND matricula = '$matricula' ");
            $result = mysqli_num_rows($query);
            $datos = mysqli_fetch_array($query);

            // Verificar si se encontraron coincidencias
            // $result->num_rows == 1
            if ($result == 1) {
                // Iniciar sesión y redirigir al usuario a una página de inicio de sesión exitoso
                session_start();
                $_SESSION['login'] = true;
                $_SESSION["id"] = $datos["id"];
                $_SESSION['correo'] = $correo;
                $_SESSION['matricula'] = $matricula;
                header("Location: ../views/datos-alumno/edit-alumno.php");
                // header("Location: ../views/subir-datos-alumno.php");
                exit;
            } else {
                $_SESSION['errordos'] = 'Usuario o contraseña incorrectos';
                // Mostrar un mensaje de error si no se encontraron coincidencias
                echo "Correo electrónico o matrícula incorrectos.";
                header("Location: ./login-estudiante.php");
            }

            // $query = mysqli_query($conn, "SELECT * FROM alumnos WHERE correo='$correo'");
            // $result = mysqli_num_rows($query);
            // $datos = mysqli_fetch_array($query);

            // if (!$datos) {
            //     $_SESSION['erroruno'] = 'El usuario no existe';
            //     header("Location: ./login-estudiante.php");
            //     echo "el Usuario no existe";
            // } else {
            //     $passbd = $datos['contrasenia'];
            //     $buscarpass = password_verify($contrasenia, $passbd);
            //     if ($result > 0) {
            //         if ($buscarpass) {
            //             session_start();
            //             $_SESSION['login'] = true;
            //             $_SESSION["id"] = $datos["id"];
            //             $_SESSION["matricula"] = $datos["matricula"];
            //             $_SESSION["correo"] = $datos["correo"];
            //             header("Location: ../views/subir-datos-alumno.php");
            //         } else {
            //             $_SESSION['errordos'] = 'Usuario o contraseña incorrectos';
            //             header("Location: ./login-estudiante.php");
            //             echo "Contraseña incorrecta";
            //         }
            //     } else {
            //         $_SESSION['erroruno'] = 'El usuario no existe';
            //         header("Location: ./login-estudiante.php");
            //         echo "el Usuario no existe";
            //     }
            // }
        }
        $conn->close();
    }
}
