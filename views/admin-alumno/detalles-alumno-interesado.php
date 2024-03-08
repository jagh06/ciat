<?php
require_once "../../conexion.php";
if (isset($_GET["alumno"])) {
    $matricula = $_GET["alumno"];
    $consulta = $conn->prepare("SELECT * FROM alumnos WHERE matricula = ?");
    $consulta->bind_param("s", $matricula);
    $consulta->execute();

    $resultado = $consulta->get_result();
    if ($resultado->num_rows > 0) {
        // Obtener la fila del resultado
        $fila = $resultado->fetch_assoc();
        $id = $fila["id"];
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../../css//administrador//dash.css" />
    <title>Cluster</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i><img width="150px" height="70px" src="../../requisitos//images/logocluster.png" alt=""></i></div>
            <div class="list-group list-group-flush my-3">
                <a href="panel.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="alumnos.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>Alumnos</a>
                <a href="empresas.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-building me-2"></i>Empresas</a>
                <a href="formulario.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i>Formulario</a>
                <!-- <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Store Mng</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Products</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Chat</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Outlet</a> -->

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Alumnos</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Carlos Damian
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Configuaracion</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid px-4">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h2>Detalles alumno</h2>
        <div class="container">
            <div class="main-body">
                <div class="d-block row gutters-sm">
                    <div class="col-md-4 mb-3 w-100">
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
                    </div>
                    <div class="col-md-8 w-100">
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
                                        <?php echo $matricula ?>
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
                                        echo "<a class='btn btn-aceptado' href='./edit-alumno.php?id=" . $id . "'>Aceptar Alumno</a>";
                                        echo "<a class='btn btn-rechazo' href='./edit-alumno.php?id=" . $id . "'>Rechazar Alumno</a>";
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
    </main>
    <div>
        </div>

    </div>
    
    <!-- /#page-content-wrapper -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>