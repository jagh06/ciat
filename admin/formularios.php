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
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/modal.css">

    <!-- Asegúrate de que jQuery se esté cargando antes de Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-u3jTj+6QqF7B3pP6jwe9zD/CZQIm2LMpFF1oPp3jJY/AHRbTBxb6b9s5K7su1Fy6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eQPhU/1i7OYMTYoVDD7/TIDj4WzIxyPBO1pP5fFii/w7/l1W4l8O6QqjoM0C+2Sb" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


    <title>Cluster</title>

    <script>
        function confirmarEliminacionUniversidad(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                // Si el usuario confirma la eliminación, redirecciona al mismo script con el parámetro id del registro a eliminar
                window.location.href = "./formularios/eliminar-universidad.php?id=" + id;
            }
        }

        function confirmarEliminacionCarreras(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                // Si el usuario confirma la eliminación, redirecciona al mismo script con el parámetro id del registro a eliminar
                window.location.href = "./formularios/eliminar-carrera.php?id=" + id;
            }
        }

        function confirmarEliminacionAreas(id) {
            if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
                // Si el usuario confirma la eliminación, redirecciona al mismo script con el parámetro id del registro a eliminar
                window.location.href = "./formularios/eliminar-area.php?id=" + id;
            }
        }

        function verificarNombreUni(nombreuni) {
            // Realizar una solicitud AJAX para verificar si la matrícula ya existe
            $.ajax({
                url: './verificar/verificar-nombreuni.php',
                type: 'post',
                data: {
                    nombreuni: nombreuni
                },
                success: function(response) {
                    if (response === 'repetida') {
                        // Si la matrícula se repite, marcar el campo de entrada como inválido
                        document.getElementById('nombreuni').setCustomValidity('Esta universidad ya está registrada.');
                        $('#mensaje-nombre-uni').html('<span style="color: rgb(245, 26, 26); font-size: 12px; position: absolute; margin-top: 5px;">Esta universidad ya está registrada.</span>');
                    } else {
                        // Si la matrícula no se repite, limpiar cualquier mensaje de error
                        $('#mensaje-nombre-uni').empty();
                        document.getElementById('nombreuni').setCustomValidity('');
                    }
                    // Actualizar la visualización de la validación del campo de entrada
                    document.getElementById('nombreuni').reportValidity();
                }
            });
        }

        function verificarNombreCarrera(nombrecarrera) {
            // Realizar una solicitud AJAX para verificar si la matrícula ya existe
            $.ajax({
                url: './verificar/verificar-nombrecarrera.php',
                type: 'post',
                data: {
                    nombrecarrera: nombrecarrera
                },
                success: function(response) {
                    if (response === 'repetida') {
                        // Si la matrícula se repite, marcar el campo de entrada como inválido
                        document.getElementById('nombrecarrera').setCustomValidity('Esta carrera ya está registrada.');
                        $('#mensaje-nombre-car').html('<span style="color: rgb(245, 26, 26); font-size: 12px; position: absolute; margin-top: 5px;">Esta carrera ya está registrada.</span>');
                    } else {
                        // Si la matrícula no se repite, limpiar cualquier mensaje de error
                        $('#mensaje-nombre-car').empty();
                        document.getElementById('nombrecarrera').setCustomValidity('');
                    }
                    // Actualizar la visualización de la validación del campo de entrada
                    document.getElementById('nombrecarrera').reportValidity();
                }
            });
        }

        function verificarNombreArea(nombrearea) {
            // Realizar una solicitud AJAX para verificar si la matrícula ya existe
            $.ajax({
                url: './verificar/verificar-nombrearea.php',
                type: 'post',
                data: {
                    nombrearea: nombrearea
                },
                success: function(response) {
                    if (response === 'repetida') {
                        // Si la matrícula se repite, marcar el campo de entrada como inválido
                        document.getElementById('nombrearea').setCustomValidity('Esta carrera ya está registrada.');
                        $('#mensaje-nombre-area').html('<span style="color: rgb(245, 26, 26); font-size: 12px; position: absolute; margin-top: 5px;">Esta carrera ya está registrada.</span>');
                    } else {
                        // Si la matrícula no se repite, limpiar cualquier mensaje de error
                        $('#mensaje-nombre-area').empty();
                        document.getElementById('nombrearea').setCustomValidity('');
                    }
                    // Actualizar la visualización de la validación del campo de entrada
                    document.getElementById('nombrearea').reportValidity();
                }
            });
        }
    </script>


</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i><img width="150px" height="70px" src="../requisitos/images/logocluster.png" alt=""></i></div>
            <div class="list-group list-group-flush my-3">
                <a href="panel.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="alumnos.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-user me-2"></i>Alumnos</a>
                <a href="empresas.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-building me-2"></i>Empresas</a>
                <a href="formularios.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-paperclip me-2"></i>Formularios</a>

                <!-- <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Chat</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Outlet</a>  -->

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Formularios</h2>
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

            <div class="row paddi">
                <div class="col-md-6 mb-3">
                    <div class="d-flex justify-content-between py-2">
                        <h3 class="fs-5 mb-3">Lista de Universidades</h3>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Universidad</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="./nuevos-registros/agregar-universidad.php" method="POST">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Nombre de la Universidad:</label>
                                                <input onchange="verificarNombreUni(this.value)" oninput="permitirLetrasNumerosAcentos(this)" type="text" class="form-control" name="nombreuni" id="nombreuni" required>
                                                <div id="mensaje-nombre-uni"></div>
                                            </div>
                                            <!-- <div id="inputsContainer" class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Agregar Carrera:</label>
                                                <div class="inputRow d-flex">
                                                    <input type="text" name="carrera[]" id="carrera" class="form-control" placeholder="Carrera" required>
                                                    <button type="button" class="removeButton text-danger" onclick="removeInput(this)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <button type="button" id="addButton" class="text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                </svg>
                                            </button> -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Agregar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cls-button-add-modal">
                            <div class="cls1-button-add-modal"></div>
                            <button type="button" class="button-add-modal" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>
                            </button>
                            <!-- <button type="button" class="button-add-modal btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Nuevo Registro</button> -->
                        </div>
                    </div>

                    <div class="py-4 text-center caja">
                        <div class="row g-4">
                            <div class="col-1">
                                <label for="num_registros" class="col-form-label">Mostrar:</label>
                            </div>
                            <div class="col-auto">
                                <select name="num_registros" id="num_registros" class="form-select">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                            <div class="col-2"></div>
                            <div class="col-2">
                                <label for="campo" class="col-form-label">Buscar:</label>
                            </div>
                            <div class="col-4">
                                <input type="text" name="campo" id="campo" class="form-control bus">
                            </div>
                        </div>

                        <div class="row py-4">
                            <div class="col">
                                <table class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <th scope="col" class="sortuni" data-sort="nombre">
                                            id
                                            <i class="fas fa-sort"></i>
                                        </th>
                                        <th scope="col" class="sortuni" data-sort="nombre">
                                            Nombre
                                            <i class="fas fa-sort"></i>
                                        </th>
                                        <th class="sort ">Action</th>
                                    </thead>
                                    <tbody id="content-universidad">
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

                <!--  CARRERAS Y AREAS DE INTERÉS -->
                <?php include "./listacarreras.php"; ?>

                <?php include "./lista-area-interes.php"; ?>


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
                let content = document.getElementById("content-universidad")
                let pagina = document.getElementById("pagina").value
                let orderCol = document.getElementById("orderCol").value
                let orderType = document.getElementById("orderType").value

                if (pagina == null) {
                    pagina = 1
                }

                let url = "./formularios/loaduniversidades.php"
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

            let columns = document.getElementsByClassName("sortuni")
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
            document.getElementById('addButton').addEventListener('click', function() {
                var inputsContainer = document.getElementById('inputsContainer');
                var newInputRow = document.createElement('div');
                newInputRow.classList.add('inputRow', 'd-flex');
                newInputRow.innerHTML = '<input type="text" name="carrera[]" id="carrera" placeholder="Carrera" class="form-control" required> <button type="button" class="removeButton text-danger" onclick="removeInput(this)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" /></svg></button>';
                inputsContainer.appendChild(newInputRow);
            });

            function removeInput(button) {
                button.parentNode.remove();
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            var el = document.getElementById("wrapper");
            var toggleButton = document.getElementById("menu-toggle");

            toggleButton.onclick = function() {
                el.classList.toggle("toggled");
            };
        </script>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>