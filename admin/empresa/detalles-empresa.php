<?php

require_once "../../conexion.php";

$id = $_GET['id'];
$sql = "SELECT * FROM empresas WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Si se encontraron resultados, mostrar los detalles del alumno
    $fila = $resultado->fetch_assoc();
    $idempresa = $fila["id"];
    $nombre_comercial = $fila["nombre_comercial"];
    $razon_social = $fila["razon_social"];
    $rfc = $fila["rfc"];
    $csf = $fila["csf"];
    $estado = $fila["estado"];
    $ciudad = $fila["ciudad"];
    $colonia = $fila["colonia"];
    $calle = $fila["calle"];
    $numext = $fila["num_exterior"];
    $numint = $fila["num_interior"];
    $cp = $fila["cp"];
    $nombre_director = $fila["nombre_director"];
    $apellidos_direc = $fila["apellidos_direc"];
    $telefono_direc = $fila["telefono_direc"];
    $email_direc = $fila["email_direc"];
    $nombre_admin = $fila["nombre_admin"];
    $apellidos_admin = $fila["apellidos_admin"];
    $telefono_admin = $fila["telefono_admin"];
    $email_admin = $fila["email_admin"];
} else {
    // Si no se encontraron resultados, mostrar un mensaje de error
    echo "No se encontraron detalles para el alumno con ID: $id";
}

// Cerrar la conexión
$conn->close();

?>

<form action="./empresa/actualizar-empresa-pendiente.php" method="POST" class="w-100 d-block">
    <div class="col">
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

        <div class="row row-cols-1 row-cols-md-4">
            <div class="col-md-4 input-form px-1">
                <label class="form-label" style="font-size: 13px;">Nombre Comercial</label>
                <input style="font-size: 13px;" type="text" value="<?php echo $nombre_comercial ?>" id="nombre-comercial" name="nombre-comercial" class="form-control px-2" placeholder="Nombre comercial" aria-label="First name" required>
            </div>
            <div class="col-md-7 input-form px-1">
                <label class="form-label" style="font-size: 13px;">Razon Social</label>
                <input style="font-size: 13px;" type="text" value="<?php echo $razon_social ?>" id="razon-social" name="razon-social" class="form-control px-2" placeholder="Razón social" aria-label="Last name">
            </div>
            <div class="col-md-4 input-form px-1">
                <label class="form-label" style="font-size: 13px;">RFC</label>
                <input pattern="[A-Za-z]{3,4}[0-9]{6}[A-Za-z0-9]{3}" oninput="validarRFC(this)" maxlength="13" style="font-size: 13px;" type="text" value="<?php echo $rfc ?>" id="rfc" name="rfc" class="form-control px-2" placeholder="RFC" aria-label="Last name">
                <div id="error-rfc" class="mensaje-error-rfc col-md-5"></div>
            </div>

            <?php
            // Ruta relativa almacenada en la base de datos
            $ruta_relativa_csf = $csf;

            // Eliminar el punto inicial de la ruta
            $ruta_relativa_sin_punto_csf = substr($ruta_relativa_csf, 1);
            ?>

            <div class="col-md-5 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Constancia de Situación Fiscal</label>
                <div class="col-md-3 input-form d-flex justify-content-center align-items-center">
                    <a title="Constancia de Situación Fiscal" class="btn btn-info text-white" href="../../cluster-seguro/views/datos-empresa<?php echo $ruta_relativa_sin_punto_csf; ?>" target="_blank" id="pdfLink">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-file-earmark-pdf" viewBox="0 0 16 16">
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                            <path d="M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z" />
                        </svg>
                    </a>

                </div>
            </div>

        </div>
        <hr class="divider">

        <div class="row row-cols-1 row-cols-md-4">
            <div class="col-md-5 px-1">
                <label class="form-label" style="font-size: 13px;">Calle</label>
                <input style="font-size: 13px;" type="text" value="<?php echo $calle ?>" id="calle" name="calle" class="form-control px-2" placeholder="Calle" aria-label="Last name" required>

            </div>
            <div class="col-md-5 px-1">
                <label class="form-label" style="font-size: 13px;">Colonia</label>
                <input style="font-size: 13px;" type="text" value="<?php echo $colonia ?>" id="colonia" name="colonia" class="form-control px-2" placeholder="Colonia" aria-label="Last name" required>
            </div>
            <div class="col-md-3 input-form px-1">
                <label class="form-label" style="font-size: 13px;">Ciudad</label>
                <input style="font-size: 13px;" type="text" value="<?php echo $ciudad ?>" id="ciudad" name="ciudad" class="form-control px-2" placeholder="Ciudad" aria-label="Last name" required minlength="10" maxlength="10" required>
            </div>
            <div class="col-md-3 input-form px-1">
                <label class="form-label" style="font-size: 13px;">Estado</label>
                <input style="font-size: 13px;" type="text" value="<?php echo $estado ?>" id="estado" name="estado" class="form-control px-2" placeholder="Estado" aria-label="Last name">
            </div>
            <div class="col-md-2 px-1">
                <label class="form-label" style="font-size: 13px;">No. Ext</label>
                <input maxlength="5" style="font-size: 13px;" type="text" value="<?php echo $numext ?>" id="num-ext" name="num-ext" class="form-control px-2" placeholder="Número exterior" aria-label="Last name">
            </div>
            <div class="col-md-2 px-1">
                <label class="form-label" style="font-size: 13px;">No. Int</label>
                <input maxlength="5" style="font-size: 13px;" type="text" value="<?php echo $numint ?>" id="num-int" name="num-int" class="form-control px-2" placeholder="Número interior" aria-label="Last name">
            </div>

            <div class="col-md-2 px-1">
                <label class="form-label" style="font-size: 13px;">CP</label>
                <input oninput="permitirSoloNumeros(this)" maxlength="5" style="font-size: 13px;" type="text" value="<?php echo $cp ?>" id="cp" name="cp" class="form-control px-2" placeholder="CP" aria-label="Last name">
            </div>
        </div>
        <hr class="divider">

        <div class="row row-cols-1 row-cols-md-4">
            <div class="col-md-4 input-form px-1">
                <label class="form-label" style="font-size: 13px;">Nombre Director</label>
                <input oninput="permitirLetrasAcentos(this)" style="font-size: 13px;" type="text" value="<?php echo $nombre_director ?>" id="nombre-director" name="nombre-director" class="form-control px-2" placeholder="Nombre de director" aria-label="Last name" required>
            </div>
            <div class="col-md-4 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Apellido(s)</label>
                <input oninput="permitirLetrasAcentos(this)" style="font-size: 13px;" type="text" value="<?php echo $apellidos_direc ?>" id="apellidos-director" name="apellidos-director" class="form-control px-2" placeholder="Apellidos de director" aria-label="Last name">
            </div>
            <div class="col-md-3 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Tel. Director</label>
                <input oninput="permitirSoloNumeros(this)" maxlength="10" style="font-size: 13px;" type="text" value="<?php echo $telefono_direc ?>" id="tel-director" name="tel-director" class="form-control px-2" placeholder="Telefono de director" aria-label="Last name">
            </div>
            <div class="col-md-6 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Correo Director</label>
                <input style="font-size: 13px;" type="email" value="<?php echo $email_direc ?>" id="email-director" name="email-director" class="form-control px-2" placeholder="Correo de director" aria-label="Last name">
            </div>
        </div>
        <hr class="divider">

        <div class="row row-cols-1 row-cols-md-4">
            <div class="col-md-4 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Nombre Administrador</label>
                <input oninput="permitirLetrasAcentos(this)" style="font-size: 13px;" type="text" value="<?php echo $nombre_admin ?>" id="nombre-admin" name="nombre-admin" class="form-control" placeholder="Nombre de administrador" aria-label="Last name">
            </div>
            <div class="col-md-4 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Apellido(s)</label>
                <input oninput="permitirLetrasAcentos(this)" style="font-size: 13px;" type="text" value="<?php echo $apellidos_admin ?>" id="apellidos-admin" name="apellidos-admin" class="form-control" placeholder="Apellidos de administrador" aria-label="Last name">
            </div>
            <div class="col-md-4 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Tel. Administrador</label>
                <input oninput="permitirSoloNumeros(this)" maxlength="10" style="font-size: 13px;" type="text" value="<?php echo $telefono_admin ?>" id="tel-admin" name="tel-admin" class="form-control" placeholder="Telefono de administrador" aria-label="Last name">
            </div>
            <div class="col-md-6 input-form px-1" style="font-size: 13px;">
                <label class="form-label">Correo Admin</label>
                <input style="font-size: 13px;" type="email" value="<?php echo $email_admin ?>" id="email-admin" name="email-admin" class="form-control" placeholder="Correo de administrador" aria-label="Last name">
            </div>
        </div>
        <hr class="divider">
    </div>

    <div class="d-flex justify-content-between">
        <div class="mt-2 col-md-1 wrap-login100-form-btn aling-self-end ">
            <div class="login100-form-bgbtn"></div>
            <button title="Guardar cambios" class="btn btn-outline-transparent login100-form-btn1" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                    <path d="M11 2H9v3h2z" />
                    <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z" />
                </svg>
            </button>
        </div>
        <div class="mt-2 col-md-1 wrap-login100-form-btn aling-self-end ">
            <div class="login100-form-bgbtn"></div>
            <button title="Aceptar empresa" class="btn btn-outline-transparent login100-form-btn2" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-check" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514" />
                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z" />
                    <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                </svg>
            </button>
        </div>
        <div class="mt-2 col-md-1 wrap-login100-form-btn aling-self-end ">
            <div class="login100-form-bgbtn"></div>
            <button title="Rechazar empresa" class="btn btn-outline-transparent login100-form-btn3" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill-x" viewBox="0 0 16 16">
                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.5 4.5 0 0 0 12.5 8a4.5 4.5 0 0 0-3.59 1.787A.5.5 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.5 4.5 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708" />
                </svg>
            </button>
        </div>
        <div class="mt-2 col-md-6 wrap-login100-form-btn aling-self-end ">
            <div class="login100-form-bgbtn"></div>
            <button onclick="confirmarEliminacionEmpresa( <?php echo $id  ?>)" title="Eliminar empresa" class="btn btn-outline-transparent login100-form-btn4" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                </svg>
            </button>
        </div>
    </div>
</form>