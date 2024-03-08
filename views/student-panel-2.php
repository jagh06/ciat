<?php

session_start();
require_once "../conexion.php";
if (isset($_SESSION["login"])) {
    $usuario_id = $_SESSION["id"];
    $usuario_matricula = $_SESSION["matricula"];
    $usuario_correo = $_SESSION["correo"];

    $datos_agregados = "SELECT datos_agregados FROM alumnos WHERE id = $usuario_id";
    $result = mysqli_query($conn, $datos_agregados);

    if ($result && mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $datos_agregados = $row['datos_agregados'];
        $mensaje = $datos_agregados ? '1' : '0';
        if ($mensaje == '1') {
            header("Location: ./en-espera-de-respuesta.php");
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}

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


        <!-- FORMULARIO DE ALUMNO -->
        <div class="container">
            <form action="./datos-alumno/agregar-datos-alumno.php" method="POST" enctype="multipart/form-data">
                <div class="row g-3">

                    <div class="py-5 text-center">
                        <h2>Datos del alumno</h2>
                        <p class="lead">Ingrese detalladamente sus datos para ser candidato en realizar estadia con la empresa cluster.</p>
                    </div>

                    <input type="hidden" name="id_alumno" id="id_alumno" value="<?php echo $usuario_id ?>">

                    <div class="col-4">
                        <label for="idNombre" class="form-label">Nombre del alumno</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Escribe tu nombre " aria-label="First name" required>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Apellido paterno</label>
                        <input type="text" id="ap-paterno" name="ap-paterno" class="form-control" placeholder="Apellidos" aria-label="Last name" required>
                    </div>
                    <div class="col-4">
                        <label class="form-label">Apellido Materno</label>
                        <input type="text" id="ap-materno" name="ap-materno" class="form-control" placeholder="Apellidos" aria-label="Last name" required>
                    </div>
                    <div class="col-5">
                        <label class="form-label">Matricula</label>
                        <input type="text" id="matricula" name="matricula" class="form-control" placeholder="Matricula del alumno" aria-label="Last name" value="<?php echo isset($_POST['matricula']) ? $_POST['matricula'] : $usuario_matricula ?>" required>
                    </div>
                    <div class="col-7">
                        <label class="form-label">Carrera</label>
                        <input type="text" id="carrera" name="carrera" class="form-control" placeholder="Ingenieria o licenciatura" aria-label="Last name" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Numero telefonico</label>
                        <input type="tel" id="telefono" name="telefono" oninput="validarInput(this)" pattern="\d*" class="form-control" placeholder="Ingrese su número de telefono (10 dígitos)" aria-label="Last name" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Correo electronico</label>
                        <input type="email" id="correo" name="correo" class="form-control" placeholder="Ejemplo@gmail.com" aria-label="Last name" value="<?php echo isset($_POST['correo']) ? $_POST['correo'] : $usuario_correo ?>" required>
                    </div>
                    <div class="col-5 g-3">
                        <label class="form-label">Elige una foto de perfil</label>
                        <input type="file" id="f-perfil" name="f-perfil" class="form-control" placeholder="Escribe tu nombre " aria-label="First name" accept="image/*" required>
                    </div>
                    <div class="col-8">
                        <label class="form-label">Número de Seguro Social </label>
                        <input type="text" id="num-imss" name="num-imss" class="form-control" oninput="validarInputIMSS(this)" pattern="\d*" placeholder="Numero de Seguro Social (11 dígitos)" aria-label="Last name" required>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input type="date" id="f-nacimiento" name="f-nacimiento" class="form-control" aria-label="Last name" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Selecciona el pedriodo de estadia a realizar:</label>
                        <select id="periodo" name="periodo" class="form-select" aria-label="Default select example" required>
                            <option value="24-1 (ene-abr)">24-1 (ene-abr)</option>
                            <option value="24-2 (may-ago)">24-2 (may-ago)</option>
                            <option value="24-3 (sep-Dic)">24-3 (sep-Dic)</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label class="form-label">Selecciona tu área de interes</label>
                        <select id="area" name="area" class="form-control">
                            <option>Área de desarrollo de software</option>
                            <option>Área de mantenimiento preventivo y correctivo</option>
                            <option>Área de administracion</option>
                        </select>
                    </div>

                    <div class="col-5 g-3">
                        <label class="form-label">Subir un archivo en formato pdf de CV.</label>
                        <input type="file" id="cv" name="cv" class="form-control" placeholder="Selecciona tu curriculum " aria-label="First name" required>
                    </div>



                    <!-- <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" required>
                                    Seleciona tu area de interes
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">

                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Interes para area de desarrollo de software
                                        </label>
                                    </div>
                                </div>
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Para area de administracion
                                        </label>
                                    </div>
                                </div>
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Area de mantenimiento preventivo y correctivo
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> -->

                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Subir datos</button>
                    </div>
            </form>
        </div>
        <br><br>


    </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>