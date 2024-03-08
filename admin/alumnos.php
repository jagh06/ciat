<?php
require_once "../conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../css/administrador/dash.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Cluster</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function mostrarDetalles(id) {
            // Realizar una solicitud AJAX para obtener los detalles del alumno
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Cuando se complete la solicitud, mostrar los detalles del alumno
                    document.getElementById("detallesPersona").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "./alumno/detalles-alumno.php?id=" + id, true);
            xhttp.send();
        }

        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                // Si el usuario confirma la eliminación, redirecciona al mismo script con el parámetro id del registro a eliminar
                window.location.href = "./alumno/eliminar-alumno.php?id=" + id;
            }
        }

        // para formulario detalles-alumno

        function permitirSoloLetras(event) {
            const input = event.target;
            const valorInput = input.value;
            const letrasValidas = /^[A-Za-záéíóúÁÉÍÓÚüÜ\s]+$/;

            if (!letrasValidas.test(valorInput)) {
                // Eliminar el último caracter ingresado si no es una letra, acento o espacio
                input.value = valorInput.slice(0, -1);
            }
        }

        function validarTelefono(input) {
            input.value = input.value.replace(/\D/g, '');
            var telefono = input.value.trim();
            var telInput = document.getElementById('telefono');

            // Verificar si el valor es un número y si tiene 10 dígitos
            if (!/^\d{10}$/.test(telefono)) {
                telInput.style.borderColor = 'red';
            } else {
                telInput.style.borderColor = '';
            }
        }

        function validarCurp(input) {
            var valor = input.value.trim();
            var curpInput = document.getElementById('curp');
            var patron = /^[A-Za-z]{4}[0-9]{6}[A-Za-z]{6}[A-Za-z0-9]{2}$/;

            if (!patron.test(valor)) {
                curpInput.style.borderColor = 'red';
            } else {
                curpInput.style.borderColor = '';
            }
            // Convertir a mayúsculas
            input.value = valor.toUpperCase();
        }

        function validarInputIMSS(input) {
            input.value = input.value.replace(/\D/g, '');
            var numImssInput = document.getElementById('num-imss');

            if (input.value.length >= 11) {
                input.value = input.value.slice(0, 11);
                numImssInput.style.borderColor = '';
            } else {
                numImssInput.style.borderColor = 'red';

            }
        }

        function validarCalif(input) {
            // Eliminar caracteres que no sean números
            input.value = input.value.replace(/\D/g, '');

            // Limitar la longitud del valor a 10 dígitos
            if (input.value.length > 2) {
                input.value = input.value.slice(0, 2);
            }
        }
        
    </script>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i><img width="150px" height="70px" src="../requisitos//images/logocluster.png" alt=""></i></div>
            <div class="list-group list-group-flush my-3">
                <a href="panel.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="alumnos.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>Alumnos</a>
                <a href="empresas.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-building me-2"></i>Empresas</a>
                <a href="formularios.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i>Formulario</a>
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
                <div class="row">
                    <div class="col-6 col-md-3">
                        <a class="btn btn-icon d-flex align-items-center justify-content-center btnSolicitudes" data-file="./prueba.php">
                            <i class="fas fa-user-plus"></i>
                            <span class="text-hover"> Solicitudes (1)</span>
                        </a>
                    </div>
                    <!-- Aceptados -->
                    <div class="col-6 col-md-3">
                        <button class="btn btn-icon d-flex align-items-center justify-content-center btnAceptados" data-file="aceptados.html">
                            <i class="fas fa-user-check colorr"></i>
                            <span class="text-hover">Aceptados (4)</span>
                        </button>
                    </div>

                    <!-- Rechazado -->
                    <div class="col-6 col-md-3">
                        <button class="btn btn-icon d-flex align-items-center justify-content-center btnRechazado" data-file="rechazado.html">
                            <i class="fas fa-user-times"></i>
                            <span class="text-hover">Rechazado (5)</span>
                        </button>
                    </div>
                </div>

                <!-- <div id="contenido" class="mt-4">
                    
                </div> -->
            </div>


            <div class="container-fluid">
                <div class="row">

                    <!-- Contenedor de la Tabla de Empleados -->
                    <div class="col-md-6">
                        <div class="py-3 text-center caja">
                            <h4 class="fs-5 mb-3">Lista de alumnos en proceso de aceptación</h4>
                            <div class="row g-4">
                                <div class="col-auto">
                                    <label for="num_registros" class="col-form-label">Mostrar:</label>
                                </div>
                                <div class="col-auto">
                                    <select name="num_registros" id="num_registros" class="form-select">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>

                                <div class="col-1"></div>
                                <div class="col-auto">
                                    <label for="campo" class="col-form-label">Buscar:</label>
                                </div>
                                <div class="col-5">
                                    <input type="text" name="campo" id="campo" class="form-control bus">
                                </div>
                            </div>

                            <div class="row py-4">
                                <div class="col">
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead>
                                            <th scope="col" class="sort asc" data-sort="nombre">
                                                Matricula
                                                <i class="fas fa-sort"></i>
                                            </th>
                                            <th scope="col" class="sort asc" data-sort="nombre">
                                                Nombre(s)
                                                <i class="fas fa-sort"></i>
                                            </th>
                                            <th scope="col" class="sort asc" data-sort="nombre">
                                                Apellido(s)
                                                <i class="fas fa-sort"></i>
                                            </th>
                                            <th class="sort asc">Estatus</th>


                                        </thead>
                                        <tbody id="content">
                                            <!-- Contenido de la tabla aquí -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label id="lbl-total"></label>
                                </div>
                                <div class="col-6 " id="nav-paginacion"></div>
                                <input type="hidden" id="pagina" value="1">
                                <input type="hidden" id="orderCol" value="0">
                                <input type="hidden" id="orderType" value="asc">
                            </div>
                        </div>
                    </div>
                    <!-- Contenedor de Detalles del Alumno -->
                    <div class="col-md-6">
                        <div class="my-2 bg-white rounded shadow-sm table-hover">

                            <div class="Diseño" id="detallesPersona" class="rounded shadow-sm table-hover">

                                <p>Selecciona para ver los datos de alumno en las casillas</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>





    <script>
        /* Llamando a la función getData() */
        getData()

        /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
        document.getElementById("campo").addEventListener("keyup", function() {
            getData()
        }, false)
        document.getElementById("num_registros").addEventListener("change", function() {
            getData()
        }, false)


        /* Peticion AJAX */
        function getData() {
            let input = document.getElementById("campo").value
            let num_registros = document.getElementById("num_registros").value
            let content = document.getElementById("content")
            let pagina = document.getElementById("pagina").value
            let orderCol = document.getElementById("orderCol").value
            let orderType = document.getElementById("orderType").value

            if (pagina == null) {
                pagina = 1
            }

            let url = "./alumno/load-alumno.php"
            let formaData = new FormData()
            formaData.append('campo', input)
            formaData.append('registros', num_registros)
            formaData.append('pagina', pagina)
            formaData.append('orderCol', orderCol)
            formaData.append('orderType', orderType)

            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data.data
                    document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
                        ' de ' + data.totalRegistros + ' registros'
                    document.getElementById("nav-paginacion").innerHTML = data.paginacion
                }).catch(err => console.log(err))
        }

        function nextPage(pagina) {
            document.getElementById('pagina').value = pagina
            getData()
        }

        let columns = document.getElementsByClassName("sort")
        let tamanio = columns.length
        for (let i = 0; i < tamanio; i++) {
            columns[i].addEventListener("click", ordenar)
        }

        function ordenar(e) {
            let elemento = e.target

            document.getElementById('orderCol').value = elemento.cellIndex

            if (elemento.classList.contains("asc")) {
                document.getElementById("orderType").value = "asc"
                elemento.classList.remove("asc")
                elemento.classList.add("desc")
            } else {
                document.getElementById("orderType").value = "desc"
                elemento.classList.remove("desc")
                elemento.classList.add("asc")
            }

            getData()
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".btn-icon").click(function() {
                // Oculta todas las vistas y quita la clase btn-active de todos los botones
                $(".vista").hide();
                $(".btn-icon").removeClass("btn-active");

                // Obtiene la URL del archivo desde el atributo data del botón clicado
                var fileUrl = $(this).data('file');

                // Carga y muestra el contenido del archivo en la div #contenido
                $("#contenido").load(fileUrl);

                // Agrega la clase btn-active al botón clicado
                $(this).addClass("btn-active");
            });
        });
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>