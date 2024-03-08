<?php
session_start();
if (isset($_SESSION["login"])) {
    $usuario_id = $_SESSION["id"];
    $usuario_matricula = $_SESSION["matricula"];
    $usuario_correo = $_SESSION["correo"];

    require_once "../../conexion.php";

    $consulta = $conn->prepare("SELECT * FROM alumnos WHERE id = ?");
    $consulta->bind_param("s", $usuario_id);
    $consulta->execute();

    $resultado = $consulta->get_result();
    if ($resultado->num_rows > 0) {
        // Obtener la fila del resultado
        $fila = $resultado->fetch_assoc();
        $nombre = $fila["nombre"];
        $ap_paterno = $fila["ap_paterno"];
        $ap_materno = $fila["ap_materno"];
        $carrera = $fila["carrera"];
        $num_telefono = $fila["num_telefono"];
        $correo = $fila["correo"];
        $imagen = $fila["imagen"];
        $num_imss = $fila["num_imss"];
        $f_nacimiento = $fila["f_nacimiento"];
        $periodo_estadia = $fila["periodo_estadia"];
        $area_interes = $fila["area_interes"];
        $cv = $fila["cv"];
    } else {
        echo "No se encontraron resultados para el usuario con ID $usuario_matricula.";
    }
} else {
    header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Perfil Alumno</title>
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {

            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        .verpdf {
            background-color: rgb(7, 96, 155);
            text-decoration: none;
            border-radius: 4px;
            padding: 10px;
            color: white;
        }

        .verpdf:hover {
            background-color: rgb(4, 87, 190);
            cursor: pointer;
            color: white;
            text-decoration: none;
        }
    </style>

</head>

<body>
    <br>
    <br><br>
    <nav class="navbar navbar-expand-md fixed-top">
        <div class="container">
            <!-- Logo visible en todos los tamaños de dispositivo -->
            <a class="navbar-brand" href="#">
                <img src="img/logoclus.png" height="60" alt="Company Logo">
            </a>

            <!-- Collapsable Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href="registrate.html">Registrate</a>
                    </li>
                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href="perfil.html">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href="#">Acerca</a>
                    </li>
                </ul>
                <!-- Íconos y foto de perfil a la derecha -->
                <a href="#" id="iconosvg" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalMensajes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                    </svg>
                </a>
                <div class="rounded-circle" style="overflow: hidden; width: 40px; height: 40px; margin-left: 10px;">
                    <img src="img/xd.jpeg" class="img-fluid" alt="Perfil">
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $imagen ?>" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <?php echo "<h4> $nombre $ap_paterno $ap_materno</h4>" ?>
                                    <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                                    <a class="btn btn-info " href="<?php echo $cv ?>" target="_blank" id="pdfLink">Ver Curriculum</a>

                                    <!-- <button class="btn btn-primary" onclick="verCurriculum('<?php echo $cv ?>')">Ver Curriculum</button>
                                     -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>Website</h6>
                                <span class="text-secondary">https://bootdey.com</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                    </svg>Github</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                        <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                    </svg>Twitter</h6>
                                <span class="text-secondary">@bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                    </svg>Instagram</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                    </svg>Facebook</h6>
                                <span class="text-secondary">bootdey</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nombre</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $nombre ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Apellido paterno</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $ap_paterno ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Apellido materno</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $ap_materno ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $correo ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Teléfono</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $num_telefono ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Matricula</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $usuario_matricula ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Carrera</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $carrera ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">IMSS</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $num_imss ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Fecha de nacimiento</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $f_nacimiento ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Periodo de estadía</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $periodo_estadia ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Área de interés</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $area_interes ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    echo "<a class='btn btn-info ' href='./edit-alumno.php?id=" . $usuario_id . "'>Editar Usuario</a>";
                                    ?>
                                    <!-- <a class="btn btn-info " href="./edit-alumno.php">Editar</a> -->
                                </div>
                            </div>
                        </div>
                    </div>



                </div>



            </div>
        </div>

    </div>
    </div>
    <!-- <script>
        function verCurriculum(ruta) {
            // Redirigir a la página de vista del PDF
            window.location.href = './vista-cv.php?ruta=' + encodeURIComponent(ruta);
        }
    </script> -->

    <!-- <script>
        function verCurriculum(ruta) {
            // Abrir una ventana emergente flotante con la extensión de Adobe Acrobat
            window.open('chrome-extension://efaidnbmnnnibpcajpcglclefindmkaj/http://localhost/cluster/views/datos-alumno/alumnopdf/1010101065c575dea1ddb_ANEXO.pdf', 'Adobe Acrobat', 'width=800,height=600,scrollbars=yes,resizable=yes');
        }
    </script> -->


</body>

</html>