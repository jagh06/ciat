<?php

require_once "../../conexion.php";

$id = $_GET['id'];
$sql = "SELECT * FROM alumnos WHERE id = $id";
$resultado = $conn->query($sql);

$carr = "SELECT * FROM carreras";
$result_carreras = mysqli_query($conn, $carr);

$area_interes = "SELECT * FROM area_interes";
$result_area = mysqli_query($conn, $area_interes);

$universidad_proc = "SELECT * FROM universidades";
$result_universidad = mysqli_query($conn, $universidad_proc);

if ($resultado->num_rows > 0) {
    // Si se encontraron resultados, mostrar los detalles del alumno
    $fila = $resultado->fetch_assoc();
    $id = $fila["id"];
    $nombre = $fila["nombre"];
    $apellidos = $fila["apellidos"];
    $matricula = $fila["matricula"];
    $carrera = $fila["carrera"];
    $telefono = $fila["num_telefono"];
    $correo = $fila["correo"];
    $num_imss = $fila["num_imss"];
    $f_nacimiento = $fila["f_nacimiento"];
    $periodo = $fila["periodo_estadia"];
    $area = $fila["area_interes"];
    $curp = $fila["curp"];
    $disponibilidad = $fila["disponibilidad"];
    $calificacion =  $fila["calificacion"];
    $universidad = $fila["universidad"];
    $cv = $fila["cv"];
    $imagen = $fila["imagen"];
    $plan_estudios = $fila["plan_estudios"];
} else {
    // Si no se encontraron resultados, mostrar un mensaje de error
    echo "No se encontraron detalles para el alumno con ID: $id";
}

// Cerrar la conexión
$conn->close();

?>

<form action="./alumno/actualizar-alumno-pendiente.php" method="POST" class="w-100 d-block">
    <div class="col">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

        <div class="row row-cols-1 row-cols-md-4">
            <?php
            $ruta_relativa_imagen = $imagen;

            // Eliminar el punto inicial de la ruta
            $ruta_relativa_sin_punto_imagen = substr($ruta_relativa_imagen, 1);
            ?>

            <button type="button" class="btn btn-link col-md-3 w-20 h-50" data-bs-toggle="modal" data-bs-target="#imagenModal">
                <img src="../../cluster-seguro/views/datos-alumno<?php echo $ruta_relativa_sin_punto_imagen ?>" alt="Imagen" style="width: 80px; height: 80px; border-radius: 10%;">
            </button>

            <!-- Modal de imagen -->
            <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content w-auto">
                    <!-- <div class="modal-body bg-primary text-center"> -->
                        <div class="bg-primary text-center">
                            <img src="../../cluster-seguro/views/datos-alumno<?php echo $ruta_relativa_sin_punto_imagen ?>" alt="Imagen" width="300" height="300">
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-md-3 w-20 h-50">
                <img src="../../cluster-seguro/views/datos-alumno<?php echo $ruta_relativa_sin_punto_imagen ?>" alt="Admin" style="width: 80px; height: 80px; border-radius: 10%;">
            </div> -->
            <div class="col-md-3 px-1">
                <label class="form-label" style="font-size: 13px;">Nombre</label>
                <input oninput="permitirSoloLetras(event)" style="font-size: 13px;" type="text" value="<?php echo $nombre ?>" id="nombre" name="nombre" class="form-control" placeholder="Nombres" aria-label="First name" required>
            </div>
            <div class="col-md-4 px-1">
                <label class="form-label" style="font-size: 13px;">Apellido(s)</label>
                <input oninput="permitirSoloLetras(event)" style="font-size: 13px;" type="text" value="<?php echo $apellidos ?>" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos" aria-label="Last name">
            </div>
            <div class="col-md-5 px-1">
                <label class="form-label" style="font-size: 13px;">CURP</label>
                <input oninput="validarCurp(this)" pattern="[A-Za-z]{4}[0-9]{6}[A-Za-z]{6}[A-Za-z0-9]{2}" style="font-size: 13px;" type="text" value="<?php echo $curp ?>" maxlength="18" id="curp" name="curp" class="form-control" placeholder="(18 digitos)" aria-label="Last name" required>
                <div id="error-curp" class="mensaje-error-curp"></div>
            </div>
            <div class="col-md-3 px-1">
                <label class="form-label" style="font-size: 13px;">Num de IMSS</label>
                <input oninput="validarInputIMSS(this)" pattern="[0-9]{11}" style="font-size: 13px;" type="text" value="<?php echo $num_imss ?>" pattern="[0-9]{11}" id="num-imss" name="num-imss" class="form-control" placeholder="NSS" aria-label="Last name" required>
                <div id="error-nss" class="mensaje-error-nss"></div>
            </div>
            <div class="col-md-4 px-1">
                <label class="form-label" style="font-size: 13px;">F. nacimiento</label>
                <input style="font-size: 13px;" type="date" value="<?php echo $f_nacimiento ?>" id="f-nacimiento" name="f-nacimiento" class="form-control" aria-label="Last name" required>
            </div>
        </div>
        <!-- Divisor horizontal -->
        <hr class="divider">

        <div class="row row-cols-1 row-cols-md-4">
            <div class="col-md-3 px-1">
                <label class="form-label" style="font-size: 13px;">No. de teléfono</label>
                <input oninput="validarTelefono(this)" pattern="[0-9]{10}" style="font-size: 13px;" type="tel" value="<?php echo $telefono ?>" pattern="[0-9]{10}" id="telefono" name="telefono" class="form-control" placeholder="(10 dígitos)" aria-label="Last name" required minlength="10" maxlength="10" required>
                <div id="mensaje" class="mensaje-error-tel"></div>
            </div>
            <div class="col-md-7 px-1">
                <label class="form-label" style="font-size: 13px;">Correo electronico</label>
                <input style="font-size: 13px;" type="email" value="<?php echo $correo ?>" id="correo" name="correo" class="form-control" placeholder="Ejemplo@gmail.com" aria-label="Last name" required>
            </div>
        </div>
        <!-- Divisor horizontal -->
        <hr class="divider">
        <div class="row row-cols-1 row-cols-md-4">
            <div class="col-md-6 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Universidad de procedencia</label>
                <select style="font-size: 13px;" id="universidad" name="universidad" class="form-select" aria-label="Default select example" required>
                    <option value='<?php echo $universidad ?>' default><?php echo $universidad; ?></option>
                    <?php
                    if ($result_universidad && mysqli_num_rows($result_universidad) > 0) {
                        while ($fila_uni = $result_universidad->fetch_assoc()) {
                            $nombre_universidad = $fila_uni["nombre_uni"];
                            if ($nombre_universidad == $universidad) {
                                continue;
                            }
                    ?>
                            <option value='<?php echo $nombre_universidad ?>'><?php echo $nombre_universidad; ?></option>
                    <?php
                        };
                    }
                    ?>

                </select>
            </div>
            <div class="col-md-6 px-1" style="font-size: 13px;">
                <label class="form-label">Carrera</label>
                <select style="font-size: 13px;" id="carrera" name="carrera" class="form-select" aria-label="Default select example" required>
                    <option value='<?php echo $carrera ?>' default><?php echo $carrera; ?></option>
                    <?php
                    if ($result_carreras && mysqli_num_rows($result_carreras) > 0) {
                        while ($fila_carr = $result_carreras->fetch_assoc()) {
                            $iduni = $fila2["id"];
                            $nombre_carrera = $fila_carr["nombre_carrera"];
                            if ($nombre_carrera == $carrera) {
                                continue;
                            }
                    ?>
                            <option value='<?php echo $nombre_carrera ?>'><?php echo $nombre_carrera; ?></option>
                    <?php
                        };
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-3 px-1 py-2" style="font-size: 13px;">
                <label class="form-label" style="font-size: 13px;">Matricula</label>
                <input style="font-size: 13px;" type="text" value="<?php echo $matricula ?>" id="matricula" name="matricula" class="form-control" placeholder="Matricula" aria-label="Last name">
            </div>
            <div class="col-md-2 px-1" style="font-size: 13px;">
                <label class="form-label">Calif.</label>
                <input style="font-size: 13px;" oninput="validarCalif(this)" pattern="\d*" type="text" value="<?php echo $calificacion ?>" id="calificacion" name="calificacion" class="form-control" placeholder="Calificación anterior" aria-label="Last name">
            </div>
            <div class="col-md-4 px-1" style="font-size: 13px;">
                <label class="form-label">Perido de estadia</label>
                <input style="font-size: 13px;" type="text" value="<?php echo $periodo ?>" id="periodo" name="periodo" class="form-control" placeholder="(Paterno)" aria-label="Last name">
            </div>
            <div class="col-md-6 px-1" style="font-size: 13px;">
                <label class="form-label">Área de interés:</label>
                <select style="font-size: 13px;" id="area" name="area" class="form-select" aria-label="Default select example" required>
                    <option value='<?php echo $area ?>' default><?php echo $area; ?></option>
                    <?php

                    if ($result_area && mysqli_num_rows($result_area) > 0) {
                        while ($fila_area = $result_area->fetch_assoc()) {
                            $nombre_areainteres = $fila_area["nombre_area"];
                            if ($nombre_areainteres == $area) {
                                continue;
                            }
                    ?>
                            <option value="<?php echo $nombre_areainteres ?>"><?php echo $nombre_areainteres ?></option>
                    <?php
                        };
                    }
                    ?>
                </select>
            </div>
            <?php
            // Ruta relativa almacenada en la base de datos
            $ruta_relativa_cv = $cv;
            $ruta_relativa_plan = $plan_estudios;

            // Eliminar el punto inicial de la ruta
            $ruta_relativa_sin_punto_cv = substr($ruta_relativa_cv, 1);
            $ruta_relativa_sin_punto_plan = substr($ruta_relativa_plan, 1);
            ?>
            <div class="col-md-2 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Curriculum</label>
                <div class="input-form d-flex justify-content-center align-items-center">
                    <a title="Curriculum del alumno" class="btn btn-info text-white" href="../../cluster-seguro/views/datos-alumno<?php echo $ruta_relativa_sin_punto_cv; ?>" target="_blank" id="pdfLink">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                            <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-3 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Plan de estudios</label>
                <div class="input-form d-flex justify-content-center align-items-center">
                    <a class="btn btn-info text-white " href="../../cluster-seguro/views/datos-alumno<?php echo $ruta_relativa_sin_punto_plan; ?>" target="_blank" id="pdfLink">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                            <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <hr class="divider">
    </div>
    <!-- Divisor horizontal -->




    <div class="d-flex justify-content-between">
        <div class="mt-2 col-md-1 wrap-login100-form-btn aling-self-end ">
            <div class="login100-form-bgbtn"></div>
            <button title="Guardar cambios" class="btn btn-outline-transparent login100-form-btn1 " type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                    <path d="M11 2H9v3h2z" />
                    <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                </svg>
            </button>
        </div>
        <div class="mt-2 col-md-1 wrap-login100-form-btn aling-self-end ">
            <div class="login100-form-bgbtn"></div>
            <button title="Aceptar solicitud del alumno" class="btn btn-outline-transparent login100-form-btn2" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
            </button>
        </div>
        <div class="mt-2 col-md-1 wrap-login100-form-btn aling-self-end ">
            <div class="login100-form-bgbtn"></div>
            <button title="Rechazar solicitud del alumno" class="btn btn-outline-transparent login100-form-btn3" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708" />
                </svg>
            </button>
        </div>
        <div class="mt-2 col-md-6 wrap-login100-form-btn aling-self-end ">
            <div class="login100-form-bgbtn"></div>
            <button onclick="confirmarEliminacion( <?php echo $id ?>)" title="Eliminar alumno" class="btn btn-outline-transparent login100-form-btn4" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                </svg>
            </button>
        </div>

    </div>
</form>