<div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <!-- Solicitudes -->
                    <div class="col-6 col-md-3">
                        <button class="btn btn-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-plus"></i>
                            <span class="ms-2">Solicitudes (1)</span>
                        </button>
                    </div>
                    <!-- Aceptados -->
                    <div class="col-6 col-md-3">
                        <button class="btn btn-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-check"></i>
                            <span class="ms-2">Aceptados (4)</span>
                        </button>
                    </div>
                    <!-- Activos -->
                    <div class="col-6 col-md-3">
                        <button class="btn btn-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-users"></i>
                            <span class="ms-2">Activos (3)</span>
                        </button>
                    </div>
                    <!-- Rechazado -->
                    <div class="col-6 col-md-3">
                        <button class="btn btn-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-times"></i>
                            <span class="ms-2">Rechazado (5)</span>
                        </button>
                    </div>
                </div>
            </div>


            <div class="container py-4 text-center">
                <div class="row g-4">

                    <div class="col-auto">
                        <label for="num_registros" class="col-form-label">Mostrar: </label>
                    </div>

                    <div class="col-auto">
                        <select name="num_registros" id="num_registros" class="form-select">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                    <div class="col-auto">
                        <label for="num_registros" class="col-form-label">registros </label>
                    </div>

                    <div class="col-5"></div>

                    <div class="col-auto">
                        <label for="campo" class="col-form-label">Buscar: </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="campo" id="campo" class="form-control">
                    </div>
                </div>

                <div class="row py-4">
                    <div class="col">
                        <table class="table table-sm table-bordered table-striped">
                            <thead>
                                <th class="sort asc">Num. empleado</th>
                                <th class="sort asc">Nombre</th>
                                <th class="sort asc">Apellido</th>
                                <th class="sort asc">Fecha nacimiento</th>
                                <th class="sort asc">Fecha ingreso</th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody id="content">

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label id="lbl-total"></label>
                    </div>

                    <div class="col-6" id="nav-paginacion"></div>

                    <input type="hidden" id="pagina" value="1">
                    <input type="hidden" id="orderCol" value="0">
                    <input type="hidden" id="orderType" value="asc">
                </div>
            </div>
        </div>
    </div>