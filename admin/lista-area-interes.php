<!-- carrersa -->
<div class="col-md-6">
    <div class="d-flex justify-content-between py-2">
        <h3 class="fs-5 mb-3">Areas de interés</h3>

        <div class="modal fade" id="exampleModalArea" tabindex="-1" aria-labelledby="exampleModalLabelArea" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabelArea">Agregar Área de Interés</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./nuevos-registros/agregar-area.php" method="POST">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Área de interés:</label>
                                <input onchange="verificarNombreArea(this.value)" oninput="permitirLetrasNumerosAcentos(this)" type="text" class="form-control" name="nombrearea" id="nombrearea" required>
                                <div id="mensaje-nombre-area"></div>
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
            <button type="button" class="button-add-modal" data-bs-toggle="modal" data-bs-target="#exampleModalArea" data-bs-whatever="@getbootstrap">
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
                <label for="num_registrosArea" class="col-form-label">Mostrar:</label>
            </div>
            <div class="col-auto">
                <select name="num_registrosArea" id="num_registrosArea" class="form-select">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>

            <div class="col-2"></div>
            <div class="col-2">
                <label for="campoAreas" class="col-form-label">Buscar:</label>
            </div>
            <div class="col-4">
                <input type="text" name="campoAreas" id="campoAreas" class="form-control bus">
            </div>
        </div>

        <div class="row py-4">
            <div class="col">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <th scope="col" class="sortarea" data-sort="nombre">
                            id
                            <i class="fas fa-sort"></i>
                        </th>
                        <th scope="col" class="sortarea" data-sort="nombre">
                            Nombre
                            <i class="fas fa-sort"></i>
                        </th>
                        <th class="sort">Action</th>
                    </thead>
                    <tbody id="content-areas">
                        <!-- Contenido de la tabla aquí -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <label id="lbl-totalAreas"></label>
            </div>
            <div class="col-6 " id="nav-paginacionArea"></div>
            <input type="hidden" id="paginaarea" value="1">
            <input type="hidden" id="orderColarea" value="0">
            <input type="hidden" id="orderTypearea" value="asc">
        </div>
    </div>
</div>

<script>
    /* Llamando a la función getData() */
    getDataAreas()

    /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
    document.getElementById("campoAreas").addEventListener("keyup", function() {
        getDataAreas()
    }, false)
    document.getElementById("num_registrosArea").addEventListener("change", function() {
        getDataAreas()
    }, false)


    /* Peticion AJAX */
    function getDataAreas() {
        let inputAreas = document.getElementById("campoAreas").value
        let num_registrosarea = document.getElementById("num_registrosArea").value
        let contentarea = document.getElementById("content-areas")
        let paginaarea = document.getElementById("paginaarea").value
        let orderColarea = document.getElementById("orderColarea").value
        let orderTypearea = document.getElementById("orderTypearea").value

        if (pagina == null) {
            pagina = 1
        }

        let urlarea = "./formularios/loadareainteres.php"
        let formaDataarea = new FormData()
        formaDataarea.append('campoAreas', inputAreas)
        formaDataarea.append('registrosarea', num_registrosarea)
        formaDataarea.append('paginaarea', paginaarea)
        formaDataarea.append('orderColarea', orderColarea)
        formaDataarea.append('orderTypearea', orderTypearea)

        fetch(urlarea, {
                method: "POST",
                body: formaDataarea
            }).then(response => response.json())
            .then(data => {
                contentarea.innerHTML = data.data
                document.getElementById("lbl-totalAreas").innerHTML = 'Mostrando ' + data.totalFiltro +
                    ' de ' + data.totalRegistros + ' registros'
                document.getElementById("nav-paginacionArea").innerHTML = data.paginacion
            }).catch(err => console.log(err))
    }

    function nextPage(paginaarea) {
        document.getElementById('paginaarea').value = paginaarea
        getDataAreas()
    }

    let columnsArea = document.getElementsByClassName("sortarea")
    let tamanioArea = columnsArea.length
    for (let i = 0; i < tamanioArea; i++) {
        columnsArea[i].addEventListener("click", ordenararea)
    }

    function ordenararea(e) {
        let elementoarea = e.target

        document.getElementById('orderColarea').value = elementoarea.cellIndex

        if (elementoarea.classList.contains("asc")) {
            document.getElementById("orderTypearea").value = "asc"
            elementoarea.classList.remove("asc")
            elementoarea.classList.add("desc")
        } else {
            document.getElementById("orderTypearea").value = "desc"
            elementoarea.classList.remove("desc")
            elementoarea.classList.add("asc")
        }

        getDataAreas()
    }
</script>