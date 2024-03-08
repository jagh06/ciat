<?php
session_start();
require_once "../conexion.php";
// if (isset($_SESSION["login"])) {
// $usuario_id = $_SESSION["id"];
// $usuario_matricula = $_SESSION["matricula"];
// $usuario_correo = $_SESSION["correo"];

// $datos_agregados = "SELECT datos_agregados FROM alumnos WHERE id = $usuario_id";
// $result = mysqli_query($conn, $datos_agregados);

// if ($result && mysqli_num_rows($result) > 0) {

//     $row = mysqli_fetch_assoc($result);
//     $datos_agregados = $row['datos_agregados'];
//     $mensaje = $datos_agregados ? '1' : '0';
//     if ($mensaje == '1') {
//         header("Location: ./en-espera-de-respuesta.php");
//     }
// }
// } else {
//    header("Location: ../index.php");
//    exit();
// }

?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>CLUSTER - Alumno</title>
    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/"> -->
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/footer.css">
    <!-- Asegúrate de que jQuery se esté cargando antes de Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-u3jTj+6QqF7B3pP6jwe9zD/CZQIm2LMpFF1oPp3jJY/AHRbTBxb6b9s5K7su1Fy6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eQPhU/1i7OYMTYoVDD7/TIDj4WzIxyPBO1pP5fFii/w7/l1W4l8O6QqjoM0C+2Sb" crossorigin="anonymous"></script>



    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('#correo').on('input', function() {
                var correo = $(this).val();
                if (correo !== '') {
                    $.ajax({
                        url: './datos-alumno/verificar/verificar-correo-alumno.php',
                        type: 'post',
                        data: {
                            correo: correo
                        },
                        success: function(response) {
                            $('#mensaje-correo').html(response);
                        }
                    });
                } else {
                    $('#mensaje-correo').html('');
                }
            });
        });
    </script> -->

    <script>
        function verificarCorreo(correo) {
            // Realizar una solicitud AJAX para verificar si la matrícula ya existe
            $.ajax({
                url: './datos-alumno/verificar/verificar-correo-alumno.php',
                type: 'post',
                data: {
                    correo: correo
                },
                success: function(response) {
                    if (response === 'repetida') {
                        // Si la matrícula se repite, marcar el campo de entrada como inválido
                        document.getElementById('correo').setCustomValidity('El correo electrónico ya está en uso.');
                        $('#mensaje-correo').html('<span style="color: rgb(245, 26, 26); font-size: 12px; position: absolute; margin-top: 5px;">El correo electrónico ya está en uso.</span>');
                    } else {
                        // Si la matrícula no se repite, limpiar cualquier mensaje de error
                        $('#mensaje-correo').empty();
                        document.getElementById('correo').setCustomValidity('');
                    }
                    // Actualizar la visualización de la validación del campo de entrada
                    document.getElementById('correo').reportValidity();
                }
            });
        }
    </script>


    <script>
        function verificarMatricula(matricula) {
            // Realizar una solicitud AJAX para verificar si la matrícula ya existe
            $.ajax({
                url: './datos-alumno/verificar/verificar-matricula-alumno.php',
                type: 'post',
                data: {
                    matricula: matricula
                },
                success: function(response) {
                    if (response === 'repetida') {
                        // Si la matrícula se repite, marcar el campo de entrada como inválido
                        document.getElementById('matricula').setCustomValidity('La matrícula ya está en uso');
                        $('#mensaje-matricula').html('<span style="color: rgb(245, 26, 26); font-size: 12px; position: absolute; margin-top: 5px;">La matrícula ya está en uso.</span>');
                    } else {
                        // Si la matrícula no se repite, limpiar cualquier mensaje de error
                        $('#mensaje-matricula').empty();
                        document.getElementById('matricula').setCustomValidity('');
                    }
                    // Actualizar la visualización de la validación del campo de entrada
                    document.getElementById('matricula').reportValidity();
                }
            });
        }
    </script>

    <script>
        // Función para validar el campo de entrada
        function validarInput(input) {
            // Eliminar caracteres que no sean números
            input.value = input.value.replace(/\D/g, '');

            // Limitar la longitud del valor a 10 dígitos
            if (input.value.length > 10) {
                input.value = input.value.slice(0, 10);
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

        function permitirSoloLetras(event) {
            const input = event.target;
            const valorInput = input.value;
            const letrasValidas = /^[A-Za-záéíóúÁÉÍÓÚüÜ\s]+$/;

            if (!letrasValidas.test(valorInput)) {
                // Eliminar el último caracter ingresado si no es una letra, acento o espacio
                input.value = valorInput.slice(0, -1);
            }
        }

        function mostrarArchivosPDF(event) {
            const input = event.target;
            const archivos = input.files;

            const listaArchivos = document.getElementById('listaArchivos');
            listaArchivos.innerHTML = '';

            for (let i = 0; i < archivos.length; i++) {
                const archivo = archivos[i];
                if (archivo.type === 'application/pdf') {
                    const nombreArchivo = archivo.name;
                    const divArchivo = document.createElement('div');
                    divArchivo.textContent = nombreArchivo;
                    listaArchivos.appendChild(divArchivo);
                } else {
                    alert('Por favor, seleccione solo archivos PDF.');
                    input.value = ''; // Limpiar el campo de entrada si se selecciona un archivo no PDF
                    return;
                }
            }
        }

        function validarFormulario() {
            // Verificar si el checkbox está marcado
            var checkbox = document.getElementById('flexCheckDefault');
            if (!checkbox.checked) {
                alert("Debes confirmar que los datos son correctos.");
                return false; // Evitar que el formulario se envíe
            }
            return true; // Permitir el envío del formulario
        }

        // function validarFormulario() {
        //     var telefono = document.getElementById("telefono").value;
        //     if (telefono.length !== 10) {
        //         alert("El número de teléfono debe tener exactamente 10 dígitos.");
        //         return false; // Evita que el formulario se envíe si la validación falla
        //     }
        //     return true; // Permite que el formulario se envíe si la validación es exitosa
        // }

        function validarTelefono(input) {
            input.value = input.value.replace(/\D/g, '');
            var telefono = input.value.trim();
            var errorDiv = document.getElementById('mensaje');

            // Verificar si el valor es un número y si tiene 10 dígitos
            if (!/^\d{10}$/.test(telefono)) {
                errorDiv.textContent = 'Introduce un número de teléfono válido.';
            } else {
                errorDiv.textContent = ''; // Si es válido, eliminar cualquier mensaje de error
            }
        }

        function validarInputIMSS(input) {
            input.value = input.value.replace(/\D/g, '');
            var errorDiv = document.getElementById('error-nss');

            if (input.value.length >= 11) {
                input.value = input.value.slice(0, 11);
                errorDiv.textContent = '';
            } else {
                errorDiv.textContent = 'Este campo debe tener exactamente 11 dígitos.';

            }
        }

        function validarCurp(input) {
            var valor = input.value.trim();
            var errorDiv = document.getElementById('error-curp');
            var patron = /^[A-Za-z]{4}[0-9]{6}[A-Za-z]{6}[A-Za-z0-9]{2}$/;

            if (!patron.test(valor)) {
                errorDiv.textContent = 'CURP inválida. Debe tener el formato correcto.';

            } else {
                errorDiv.textContent = ''; // Si es válido, eliminar cualquier mensaje de error
            }

            // Verificar si el valor tiene exactamente 18 dígitos
            // if (valor.length !== 18) {
            //     errorDiv.textContent = 'Este campo debe tener exactamente 18 dígitos.';
            // } else {
            //     errorDiv.textContent = ''; // Si es válido, eliminar cualquier mensaje de error
            // }

            // Convertir a mayúsculas
            input.value = valor.toUpperCase();
        }

        function enviarFormulario() {
            var checkbox = document.getElementById('flexCheckDefault');

            if (checkbox.checked) {
                document.getElementById('form-alumno').submit();
            } else {
                alert('Debes confirmar que los datos son correctos antes de enviar el formulario.');
            }
        }
    </script>
</head>


<body>
    <nav class="navbar navbar-expand-md fixed-top colorr">
        <div class="container-fluid"> <!-- Cambiado a container-fluid -->
            <!-- Logo visible en todos los tamaños de dispositivo -->
            <a class="navbar-brand" href=" ">
                <img src="../requisitos/images/logocluster.png" height="60" alt="Company Logo">
            </a>

            <!-- Collapsable Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href=" ">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href="">Registrate</a>
                    </li>
                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href="./datos-alumno/perfil-alumno.php">Perfil</a>
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
                    <img src="../requisitos/images/usuario.png" class="img-fluid" alt="Perfil">
                </div>
            </div>
        </div>
    </nav>
    <!-- Añadir un div con padding debajo de la navbar -->
    <div class="pt-5 mt-2"> <!-- pt para padding top y mt para margin top -->
        <!-- El contenido de tu página va aquí -->
    </div>




    <!-- FORMULARIO DE ALUMNO -->
    <div class="container formulario" onsubmit="return validarFormulario()">
        <form id="form-alumno" action="./datos-alumno/agregar-datos-alumno.php" method="POST" enctype="multipart/form-data">
            <div id="formulario" class="row align-items-center justify-content-start">
                <div class=" text-center">
                    <p class="estilop">Datos personales</p>
                </div>
                <input type="hidden" name="id_alumno" id="id_alumno" value="<?php echo $usuario_id ?>">

                <div class="col-md-2 input-form">
                    <label class="form-label">Nombre(s):</label>
                    <input type="text" oninput="permitirSoloLetras(event)" id="nombre" name="nombre" class="form-control" placeholder="Nombre(s)" aria-label="First name" required>
                </div>
                <div class="col-md-3 input-form">
                    <label class="form-label">Apellido(s):</label>
                    <input type="text" oninput="permitirSoloLetras(event)" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos(s)" aria-label="Last name">
                </div>
                <div class="col-md-3 input-form">
                    <label class="form-label">Elige una foto de perfil:</label>
                    <input type="file" id="f-perfil" name="f-perfil" class="form-control" placeholder="Escribe tu nombre " aria-label="First name" accept="image/*" required>
                </div>
                <div class="col-md-3 input-form">
                    <label class="form-label">Número telefonico:</label>
                    <input type="tel" oninput="validarTelefono(this)" pattern="[0-9]{10}" id="telefono" name="telefono" class="form-control" placeholder="(10 dígitos)" aria-label="Last name" required minlength="10" maxlength="10" required>
                    <div id="mensaje" class="mensaje-error-tel"></div>
                </div>
                <div class="col-md-4 g-3">
                    <label class="form-label">Correo electronico:</label>
                    <input type="email" onchange="verificarCorreo(this.value)" id="correo" name="correo" class="form-control" placeholder="Ejemplo@gmail.com" aria-label="Last name" required>
                    <div id="mensaje-correo"></div>
                    <!-- <input type="email" id="correo" name="correo" class="form-control" placeholder="Ejemplo@gmail.com" aria-label="Last name" value="<?php echo isset($_POST['correo']) ? $_POST['correo'] : $usuario_correo ?>" required> -->
                </div>
                <div class="col-md-3 g-3">
                    <label class="form-label">CURP:</label>
                    <input type="text" pattern="[A-Za-z]{4}[0-9]{6}[A-Za-z]{6}[A-Za-z0-9]{2}" oninput="validarCurp(this)" maxlength="18" id="curp" name="curp" class="form-control" placeholder="(18 digitos)" aria-label="Last name" required>
                    <div id="error-curp" class="mensaje-error-curp"></div>
                </div>
                <div class="col-md-3 g-3">
                    <label class="form-label">Num de IMSS:</label>
                    <input type="text" oninput="validarInputIMSS(this)" pattern="[0-9]{11}" id="num-imss" name="num-imss" class="form-control" placeholder="NSS" aria-label="Last name" required>
                    <div id="error-nss" class="mensaje-error-nss"></div>
                </div>


                <div class="col-md-2 g-3">
                    <label class="form-label">Fecha de nacimiento:</label>
                    <input type="date" id="f-nacimiento" name="f-nacimiento" class="form-control" aria-label="Last name" required>
                </div>
            </div>

            <div id="formulario" class="row align-items-center justify-content-end">
                <div class=" text-center">
                    <p class="estilop">Datos Escolares</p>
                </div>
                <?php
                $iduni = "";
                ?>

                <div class="col-md-5">
                    <label class="form-label">Selecciona la universidad:</label>
                    <select id="universidad" name="universidad" class="form-select" aria-label="Default select example" required>
                        <?php
                        $sql = "SELECT * FROM universidades";
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($fila = $result->fetch_assoc()) {
                                $iduni = $fila["id"];
                        ?>
                                <option value='<?php echo $fila["id"] ?>'><?php echo $fila["nombre_uni"]; ?></option>
                        <?php
                            };
                        }
                        ?>

                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Selecciona la carrera:</label>
                    <select id="carrera" name="carrera" class="form-select" aria-label="Default select example" required>
                        <?php
                        $sql = "SELECT * FROM carreras";
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($fila = $result->fetch_assoc()) {
                                $iduni = $fila["id"];
                        ?>
                                <option value='<?php echo $fila["nombre_carrera"] ?>'><?php echo $fila["nombre_carrera"]; ?></option>
                        <?php
                            };
                        }
                        ?>

                    </select>
                </div>
                <!-- <div class="col-md-5" id="select2lista" name="select2lista"> -->

                <div class="col-md-2">
                    <label class="form-label">Matrícula</label>
                    <input onchange="verificarMatricula(this.value)" type="text" id="matricula" name="matricula" class="form-control" placeholder="Matrícula del alumno" aria-label="Last name" required>
                    <div id="mensaje-matricula"></div>
                    <!-- <input type="text" id="matricula" name="matricula" class="form-control" placeholder="Matrícula del alumno" aria-label="Last name" value="<?php echo isset($_POST['matricula']) ? $_POST['matricula'] : $usuario_matricula ?>" required> -->
                </div>
                <div class="col-md-2 g-3">
                    <label class="form-label">Periodo de estadía:</label>
                    <select id="periodo" name="periodo" class="form-select" aria-label="Default select example" required>
                        <option value="24-1 (ene-abr)">24-1 (ene-abr)</option>
                        <option value="24-2 (may-ago)">24-2 (may-ago)</option>
                        <option value="24-3 (sep-Dic)">24-3 (sep-Dic)</option>
                    </select>
                </div>
                <div class="col-md-2 g-3">
                    <label class="form-label">Calificación:</label>
                    <input type="text" oninput="validarCalif(this)" pattern="\d*" id="calificacion" name="calificacion" class="form-control" placeholder="Promedio Actual" aria-label="Last name" required>
                </div>

                <div class="col-md-5 g-3">
                    <label class="form-label">Plan de estudios en formato PDF:</label>
                    <input type="file" accept=".pdf" onchange="mostrarArchivosPDF(event)" id="plan" name="plan" class="form-control" placeholder="Selecciona tu curriculum " aria-label="First name" required>
                </div>
            </div>

            <div id="formulario" class="row align-items-center justify-content-end">
                <div class=" text-center">
                    <p class="estilop">Perfil profecional:</p>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Subir CV en formato PDF:</label>
                    <input type="file" accept=".pdf" onchange="mostrarArchivosPDF(event)" id="cv" name="cv" class="form-control" placeholder="Selecciona tu curriculum " aria-label="First name" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Área de interés:</label>
                    <select id="a-interes" name="a-interes" class="form-select" aria-label="Default select example" required>
                        <?php
                        $sql = "SELECT * FROM area_interes";
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($fila = $result->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $fila["nombre_area"] ?>"><?php echo $fila["nombre_area"] ?></option>
                        <?php
                            };
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Disponibilidad:</label>
                    <select id="disponibilidad" name="disponibilidad" class="form-select" aria-label="Default select example" required>
                        <option value="Tiempo Completo">Tiempo Completo</option>
                        <option value="Días Hábiles">Días Hábiles</option>
                    </select>
                </div>
            </div>
            <div id="btn-accept" class="container-login100-form-btn">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                    <label class=" form-check-label" for="flexCheckDefault">
                        <p class="rook">Confirmo que los datos son correctos</p>
                    </label>
                </div>
                <div class=" col-2 g-3 wrap-login100-form-btn aling-self-end">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn" type="submit">
                        Registrarse
                    </button>
                </div>
            </div>
        </form>
    </div>


    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Enlaces</h3>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Acerca</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
        </div>
    </footer>



    <script src="../app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#universidad').val(1);
        recargarLista();

        $('#universidad').change(function() {
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista() {
        $.ajax({
            type: "POST",
            url: "obtener_carreras.php",
            data: "universidad=" + $('#universidad').val(),
            success: function(r) {
                $('#select2lista').html(r);
            }
        });
    }
</script>


<!-- <label class="form-label">Selecciona la carrera:</label>
                    <select id="periodo" name="periodo" class="form-select" aria-label="Default select example" required>
                    <?php
                    $sql = "SELECT carreras.nombre_carrera FROM carreras JOIN universidad_carreras 
                            ON carreras.id = universidad_carreras.id_carrera 
                            WHERE universidad_carreras.id_universidad = $iduni";
                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($fila = $result->fetch_assoc()) {

                    ?>
                                <option value='<?php echo $fila["nombre_carrera"] ?>'><?php echo $fila["nombre_carrera"]; ?></option>
                        <?php
                        };
                    }
                        ?> -->

<!-- <option value="24-1 (ene-abr)">Carrera 1</option>
                        <option value="24-2 (may-ago)">Carrera 2</option>
                        <option value="24-3 (sep-Dic)">Carrera 3</option>
                    </select> -->