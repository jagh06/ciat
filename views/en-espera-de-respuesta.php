<?php

session_start();
require_once "../conexion.php";
// if (isset($_SESSION["login"])) {
//     $usuario_id = $_SESSION["id"];
//     $usuario_matricula = $_SESSION["matricula"];
//     $usuario_correo = $_SESSION["correo"];
// } else {
//     header("Location: ../index.php");
//     exit();
// }

?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>CLUSTER - Alumno</title>

    <link rel="stylesheet" href="../css/en-espera-de-respuesta.css">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }

        .form-label {
            color: black
        }

        .form-control {
            color: rgb(91, 94, 94);
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">

    <!--Script para validar campos -->
    <script>
        // Función para validar el campo de entrada
        function validarInput(input) {
            // Eliminar caracteres que no sean números
            input.value = input.value.replace(/\D/g, '');

            // Limitar la longitud del valor a 10 dígitos
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
            }
        }

        function validarInputIMSS(input) {
            input.value = input.value.replace(/\D/g, '');

            if (input.value.length > 11) {
                input.value = input.value.slice(0, 11);
            }
        }
    </script>
</head>

<body>

    <main>
        <header class="p-2 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <nav class="navbar navbar-light bg-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="#">
                                <img src="../requisitos/images/logocluster.png" alt="" width="80" height="30" class="d-inline-block align-text-top">
                                CIAT
                            </a>
                        </div>
                    </nav>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
                        <li><a href="#" class="nav-link px-2 link-body-emphasis">Agregar datos</a></li>
                        <li><a href="#" class="nav-link px-2 link-body-emphasis">Encuestas</a></li>
                        <li><a href="#" class="nav-link px-2 link-body-emphasis">Empresas</a></li>
                    </ul>



                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="#">
                                    <?php
                                    echo "<p>$usuario_correo</p>"
                                    ?>
                                </a></li>
                            <li><a class="dropdown-item" href="#">Actualizar datos</a></li>
                            <li><a class="dropdown-item" href="./datos-alumno/perfil-alumno.php">Perfil</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="../destruir-sesion.php">Cerrar sesion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>


        <!-- felicitaciones -->
        <div class="container-fe">
            <div class="card-fe">
                <div class="mensaje">
                    <h2>¡Gracias por registrarte!</h2>
                    <p>Hemos recibido tu registro exitosamente. Por favor, mantente al pendiente de tu correo electrónico para futuras comunicaciones.</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                </svg>
            </div>
        </div>



    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>