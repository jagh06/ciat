<?php

session_start();
require_once "../../conexion.php";
if (isset($_SESSION["login"])) {
    $usuario_id = $_SESSION["id"];
    $usuario_matricula = $_SESSION["matricula"];
    $usuario_correo = $_SESSION["correo"];

    //$id = $_GET['id'];

    $sql = "SELECT *FROM alumnos where id = $usuario_id ";

    $resultado = mysqli_query($conn, $sql);
    if ($resultado) {
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $nombre = $fila["nombre"];
                $apellidos = $fila["apellidos"];
              
                $matricula = $fila["matricula"];
                $curp = $fila["curp"];
                $carrera = $fila["carrera"];
                $universidad = $fila["universidad"];
                $telefono = $fila["num_telefono"];
                $correo = $fila["correo"];
                $imagen = $fila["imagen"];
                $num_imss = $fila["num_imss"];
                $f_nacimiento = $fila["f_nacimiento"];
                $periodo = $fila["periodo_estadia"];
                $area = $fila["area_interes"];
                $disponibilidad = $fila["disponibilidad"];
                $cv = $fila["cv"];
                $plan = $fila["plan_estudios"];
                // $cv = file_get_contents($_FILES['cv']["tmp_name"]);

            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/navbar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/modificarPerfil.css">
    <link rel="stylesheet" href="css/index.css">



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
                        <a id="estiloLetra" class="nav-link mx-2" href="perfil.html">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href="../../destruir-sesion.php">Cerrar Sesión</a>
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
                
            </div>
        </div>
    </nav>



    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $imagen ?>" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <?php echo "<h4> $nombre $apellidos</h4>" ?>
                                    <a class="btn btn-info " href="<?php echo $cv ?>" target="_blank" id="pdfLink">Curriculum</a>
                                    <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                                    <button class="btn btn-primary">Actualizar Curriculum</button>
                                </div>
                                <div class="mt-3">
                                    
                                    <a class="btn btn-info " href="<?php echo $plan ?>" target="_blank" id="pdfLink">Plan</a>
                                    <!-- <p class="text-secondary mb-1">Full Stack Developer</p>
                                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p> -->
                                    <button class="btn btn-primary">Actualizar Plan de Estudios</button>
                                </div>
                            </div>
                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                        </svg>Website</h6>
                                    <span class="text-secondary">https://bootdey.com</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline">
                                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                                        </svg>Github</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info">
                                            <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                                        </svg>Twitter</h6>
                                    <span class="text-secondary">@bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>Instagram</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary">
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                        </svg>Facebook</h6>
                                    <span class="text-secondary">bootdey</span>
                                </li>
                            </ul>

                            <hr class="my-4">
                            <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h4>Estatus</h4>
                                <p>Pendiente</p>
                                   
                                </li>
                               
                               
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="card">
                        <form class="card-body" action="./editar-datos-alumno.php" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo $usuario_id; ?>">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nombre</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo "$nombre" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Apellidos</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="apellidos" name="apellidos" type="text" class="form-control" value="<?php echo "$apellidos" ?>">
                                </div>
                            </div>
                         
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="correo" name="correo" type="text" class="form-control" value="<?php echo "$correo" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Teléfono</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="telefono" name="telefono" type="text" class="form-control" value="<?php echo "$telefono" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">CURP</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="curp" name="curp" type="text" class="form-control" value="<?php echo "$curp" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Matrícula</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="matricula" name="matricula" type="text" class="form-control" value="<?php echo "$matricula" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Carrera</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="carrera" name="carrera" type="text" class="form-control" value="<?php echo "$carrera" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Universidad</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="universidad" name="universidad" type="text" class="form-control" value="<?php echo "$universidad " ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">IMSS</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="num-imss" name="num-imss" type="text" class="form-control" value="<?php echo "$num_imss" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Fecha de Nacimiento</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="f-nacimiento" name="f-nacimiento" type="text" class="form-control" value="<?php echo "$f_nacimiento" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Periodo de Estadía</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="periodo" name="periodo" type="text" class="form-control" value="<?php echo "$periodo" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Disponibilidad</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="disponibilidad" name="disponibilidad" type="text" class="form-control" value="<?php echo "$disponibilidad" ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Área de Interés</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input id="area" name="area" type="text" class="form-control" value="<?php echo "$area" ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Actualizar">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>