<!-- carrersa -->
<!-- <div class="col-md-6 border-1 rounded border border-secondary mb-3"> -->
<div class="col-md-6 mb-3">
    <div class="d-flex justify-content-between py-2">
        <h3 class="fs-5 mb-3">Lista de Carreras</h3>

        <div class="modal fade" id="exampleModalCarrera" tabindex="-1" aria-labelledby="exampleModalLabelCarrera" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabelCarrera">Agregar Carrera</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./nuevos-registros/agregar-carrera.php" method="POST">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Carrera:</label>
                                <input onchange="verificarNombreCarrera(this.value)" oninput="permitirLetrasNumerosAcentos(this)" type="text" class="form-control" name="nombrecarrera" id="nombrecarrera" required>
                                <div id="mensaje-nombre-car"></div>
                            </div>

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
            <button type="button" class="button-add-modal" data-bs-toggle="modal" data-bs-target="#exampleModalCarrera" data-bs-whatever="@getbootstrap">
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
                <label for="num_registrosCarreras" class="col-form-label">Mostrar:</label>
            </div>
            <div class="col-auto">
                <select name="num_registrosCarreras" id="num_registrosCarreras" class="form-select">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <div class="col-2"></div>
            <div class="col-2">
                <label for="campoCarrera" class="col-form-label">Buscar:</label>
            </div>
            <div class="col-4">
                <input type="text" name="campoCarrera" id="campoCarrera" class="form-control bus">
            </div>
        </div>

        <div class="row py-4">
            <div class="col">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <th scope="col" class="sortcarrera" data-sort="nombre">
                            id
                            <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col" class="sortcarrera" data-sort="nombre">
                            Nombre
                            <i class="fas fa-sort"></i>
                        </th>
                        <th class="sort">Action</th>
                    </thead>
                    <tbody id="content-carreras">
                        <!-- Contenido de la tabla aquí -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <label id="lbl-totalCarrera"></label>
            </div>
            <div class="col-6 " id="nav-paginacionCarrera"></div>
            <input type="hidden" id="paginacarrera" value="1">
            <input type="hidden" id="orderColcarrera" value="0">
            <input type="hidden" id="orderTypecarrera" value="asc">
        </div>
    </div>
</div>

<script>
    /* Llamando a la función getData() */
    getDataCarrera()

    /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
    document.getElementById("campoCarrera").addEventListener("keyup", function() {
        getDataCarrera()
    }, false)
    document.getElementById("num_registrosCarreras").addEventListener("change", function() {
        getDataCarrera()
    }, false)


    /* Peticion AJAX */
    function getDataCarrera() {
        let inputCarrera = document.getElementById("campoCarrera").value
        let num_registroscarrera = document.getElementById("num_registrosCarreras").value
        let contentcarrera = document.getElementById("content-carreras")
        let paginacarrera = document.getElementById("paginacarrera").value
        let orderColcarrera = document.getElementById("orderColcarrera").value
        let orderTypecarrera = document.getElementById("orderTypecarrera").value

        if (pagina == null) {
            pagina = 1
        }

        let urlcarrera = "./formularios/loadcarreras.php"
        let formaDatacarrera = new FormData()
        formaDatacarrera.append('campoCarrera', inputCarrera)
        formaDatacarrera.append('registroscarrera', num_registroscarrera)
        formaDatacarrera.append('paginacarrera', paginacarrera)
        formaDatacarrera.append('orderColcarrera', orderColcarrera)
        formaDatacarrera.append('orderTypecarrera', orderTypecarrera)

        fetch(urlcarrera, {
                method: "POST",
                body: formaDatacarrera
            }).then(response => response.json())
            .then(data => {
                contentcarrera.innerHTML = data.data
                document.getElementById("lbl-totalCarrera").innerHTML = 'Mostrando ' + data.totalFiltro +
                    ' de ' + data.totalRegistros + ' registros'
                document.getElementById("nav-paginacionCarrera").innerHTML = data.paginacion
            }).catch(err => console.log(err))
    }

    function nextPage(paginacarrera) {
        document.getElementById('pagina').value = paginacarrera
        getDataCarrera()
    }

    let columnsCarrera = document.getElementsByClassName("sortcarrera")
    let tamanioCarrera = columnsCarrera.length
    for (let i = 0; i < tamanioCarrera; i++) {
        columnsCarrera[i].addEventListener("click", ordenarcarrera)
    }

    function ordenarcarrera(e) {
        let elementocarrera = e.target

        document.getElementById('orderColcarrera').value = elementocarrera.cellIndex

        if (elementocarrera.classList.contains("asc")) {
            document.getElementById("orderTypecarrera").value = "asc"
            elementocarrera.classList.remove("asc")
            elementocarrera.classList.add("desc")
        } else {
            document.getElementById("orderTypecarrera").value = "desc"
            elementocarrera.classList.remove("desc")
            elementocarrera.classList.add("asc")
        }

        getDataCarrera()
    }
</script>