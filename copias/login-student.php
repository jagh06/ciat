<?php

$alert = " ";
if (!empty($_POST)) {
    if (empty($_POST['matricula']) || empty($_POST['contrasenia'])) {
        $alert = "Ingrese usuario y contraseña";
    } else {
        require_once '../conexion.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $matricula = $_POST['matricula'];
            $contrasenia = $_POST['contrasenia'];

            $query = mysqli_query($conn, "SELECT * FROM alumnos WHERE matricula='$matricula'");
            $result = mysqli_num_rows($query);
            $datos = mysqli_fetch_array($query);

            if (!$datos) {
                echo 'El Usuario no existe';
            } else {
                $passbd = $datos['contrasenia'];
                $buscarpass = password_verify($contrasenia, $passbd);
                if ($result > 0) {
                    if ($buscarpass) {
                        session_start();
                        $_SESSION['login'] = true;
                        $_SESSION["id"] = $datos["id"];
                        $_SESSION["matricula"] = $datos["matricula"];
                        $_SESSION["correo"] = $datos["correo"];
                        header("Location: ../views/subir-datos-alumno.php");
                    }else {
                        echo "Contraseña incorrecta";
                    }
                } else {
                    echo "el Usuario no existe";
                }
            }
        }
        $conn->close();
    }
}
