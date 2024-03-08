<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra tu empresa</title>
    <link rel="stylesheet" href="../../css/button.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/estilos-form-empresa.css">
    <!-- Asegúrate de que jQuery se esté cargando antes de Bootstrap JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-u3jTj+6QqF7B3pP6jwe9zD/CZQIm2LMpFF1oPp3jJY/AHRbTBxb6b9s5K7su1Fy6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eQPhU/1i7OYMTYoVDD7/TIDj4WzIxyPBO1pP5fFii/w7/l1W4l8O6QqjoM0C+2Sb" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script>
        function permitirSoloLetras(event) {
            const input = event.target;
            let valorInput = input.value;

            // Expresión regular que solo permite letras, acentos y espacios
            const letrasValidas = /^[A-Za-záéíóúÁÉÍÓÚüÜ\s]+$/;

            if (!letrasValidas.test(valorInput)) {
                // Eliminar el último caracter ingresado si no es una letra, acento o espacio
                input.value = valorInput.slice(0, -1);
            }

            // Convertir a mayúsculas
            input.value = input.value.toUpperCase();
        }

        function permitirSoloNumeros(input) {
            // Obtener el valor del input
            let valor = input.value;

            // Remover cualquier carácter no numérico del valor
            valor = valor.replace(/\D/g, '');

            // Actualizar el valor del input con solo los caracteres numéricos
            input.value = valor;
        }

        function permitirLetrasNumeros(input) {
            // Obtener el valor del input y convertirlo a mayúsculas
            let valorInput = input.value.toUpperCase();

            // Remover caracteres especiales excepto letras y números
            valorInput = valorInput.replace(/[^A-Z0-9]/g, '');

            // Actualizar el valor del input
            input.value = valorInput;
        }

        function eliminarCaracteresEspeciales(input) {
            // Obtener el valor del input
            let valorInput = input.value.toUpperCase();;

            // Remover caracteres especiales excepto letras, números, espacios, acentos y letra ñ
            valorInput = valorInput.replace(/[^\w\sáéíóúüñÁÉÍÓÚÜÑ()/]/gi, '');
            // valorInput = valorInput.replace(/[0-9]/g, '');

            // Actualizar el valor del input
            input.value = valorInput;
        }

        function permitirLetrasNumerosAcentos(input) {
            // Expresión regular que permite números, letras (con acentos) y la letra "ñ"
            var patron = /^[A-Za-z0-9áéíóúÁÉÍÓÚüÜñÑ&(). ]+$/;
            var valor = input.value;

            // Verificar si el valor coincide con la expresión regular
            if (!patron.test(valor)) {
                // Si el valor no coincide, limpiar el valor del input
                input.value = valor.replace(/[^\wáéíóúÁÉÍÓÚüÜñÑ\s]/gi, '');
            }
        }

        function permitirLetrasAcentos(input) {
            // Obtener el valor del input
            let valorInput = input.value;

            // Remover números y caracteres especiales excepto letras, espacios, acentos y la letra ñ
            valorInput = valorInput.replace(/[^A-Za-záéíóúüñÁÉÍÓÚÜÑ\s]/g, '');

            // Actualizar el valor del input
            input.value = valorInput;
        }

        function copiarCampos() {
            // Obtener los valores de los campos del primer grupo
            const nombre1 = document.getElementById('nombre-director').value;
            const apellido1 = document.getElementById('apellidos-director').value;
            const telefono1 = document.getElementById('tel-director').value;
            const email1 = document.getElementById('email-director').value;

            // Rellenar los campos del segundo grupo con los valores del primer grupo
            document.getElementById('nombre-admin').value = nombre1;
            document.getElementById('apellidos-admin').value = apellido1;
            document.getElementById('tel-admin').value = telefono1;
            document.getElementById('email-admin').value = email1;
        }

        function verificarNombreComercial(nombrecomercial) {
            // Realizar una solicitud AJAX para verificar si la matrícula ya existe
            $.ajax({
                url: './verificar/verificar-nombrecomercial-empresa.php',
                type: 'post',
                data: {
                    nombrecomercial: nombrecomercial
                },
                success: function(response) {
                    if (response === 'repetida') {
                        // Si la matrícula se repite, marcar el campo de entrada como inválido
                        document.getElementById('nombrecomercial').setCustomValidity('Esta empresa ya está registrada.');
                        $('#mensaje-nombrecomercial').html('<span style="color: rgb(245, 26, 26); font-size: 12px; position: absolute; margin-top: 5px;">Esta empresa ya está registrada.</span>');
                    } else {
                        // Si la matrícula no se repite, limpiar cualquier mensaje de error
                        $('#mensaje-nombrecomercial').empty();
                        document.getElementById('nombrecomercial').setCustomValidity('');
                    }
                    // Actualizar la visualización de la validación del campo de entrada
                    document.getElementById('nombrecomercial').reportValidity();
                }
            });
        }

        function verificarRazonSocial(razonsocial) {
            // Realizar una solicitud AJAX para verificar si la matrícula ya existe
            $.ajax({
                url: './verificar/verificar-razonsocial-empresa.php',
                type: 'post',
                data: {
                    razonsocial: razonsocial
                },
                success: function(response) {
                    if (response === 'repetida') {
                        // Si la matrícula se repite, marcar el campo de entrada como inválido
                        document.getElementById('razonsocial').setCustomValidity('Esta empresa ya está registrada.');
                        $('#mensaje-razonsocial').html('<span style="color: rgb(245, 26, 26); font-size: 12px; position: absolute; margin-top: 5px;">Esta empresa ya está registrada.</span>');
                    } else {
                        // Si la matrícula no se repite, limpiar cualquier mensaje de error
                        $('#mensaje-razonsocial').empty();
                        document.getElementById('razonsocial').setCustomValidity('');
                    }
                    // Actualizar la visualización de la validación del campo de entrada
                    document.getElementById('razonsocial').reportValidity();
                }
            });
        }

        function verificarRFC(rfc) {
            // Realizar una solicitud AJAX para verificar si la matrícula ya existe
            $.ajax({
                url: './verificar/verificar-rfc-empresa.php',
                type: 'post',
                data: {
                    rfc: rfc
                },
                success: function(response) {
                    if (response === 'repetida') {
                        // Si la matrícula se repite, marcar el campo de entrada como inválido
                        document.getElementById('rfc').setCustomValidity('Esta empresa ya está registrada.');
                        $('#error-rfc').html('<span style="color: rgb(245, 26, 26); font-size: 12px; position: absolute; margin-top: 5px;">Esta empresa ya está registrada.</span>');
                    } else {
                        // Si la matrícula no se repite, limpiar cualquier mensaje de error
                        $('#error-rfc').empty();
                        document.getElementById('rfc').setCustomValidity('');
                    }
                    // Actualizar la visualización de la validación del campo de entrada
                    document.getElementById('rfc').reportValidity();
                }
            });
        }


        function validarRFC(input) {
            var valor = input.value.trim();
            var errorDiv = document.getElementById('error-rfc');
            var patron = /^[A-Za-z]{3,4}[0-9]{6}[A-Za-z0-9]{3}$/;

            if (!patron.test(valor)) {
                errorDiv.textContent = 'RFC inválida. Debe tener el formato correcto.';

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

        function validarCodigoPostal(cp) {
            // Verificar si el código postal tiene exactamente 5 dígitos
            if (/^\d{5}$/.test(cp)) {
                // Si es válido, eliminar el mensaje de error y resetear la validación
                document.getElementById('mensaje-error-cp').innerText = '';
                document.getElementById('cp').setCustomValidity('');
            } else {
                // Si no es válido, mostrar un mensaje de error
                document.getElementById('mensaje-error-cp').innerText = 'Código postal no válido';
                // Establecer un mensaje de validación personalizado para el input
                document.getElementById('cp').setCustomValidity('Código postal no válido');
            }
        }
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top colorr">
        <div class="container-fluid"> <!-- Cambiado a container-fluid -->
            <!-- Logo visible en todos los tamaños de dispositivo -->
            <a class="navbar-brand" href=" ">
                <img src="../../requisitos/images/logocluster.png" height="60" alt="Company Logo">
            </a>

            <!-- Collapsable Navbar Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href=" ">Home</a>
                    </li>


                    <li class="nav-item">
                        <a id="estiloLetra" class="nav-link mx-2" href="#">Acerca de</a>
                    </li>
                </ul>
                <!-- Íconos y foto de perfil a la derecha -->
                <a href="#" id="iconosvg" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalMensajes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                    </svg>
                </a>
                <div class="rounded-circle" style="overflow: hidden; width: 40px; height: 40px; margin-left: 10px;">
                    <img src="../../requisitos/images/usuario.png" class="img-fluid" alt="Perfil">
                </div>
            </div>
        </div>
    </nav>
    <!-- Añadir un div con padding debajo de la navbar -->
    <div class="pt-5 mt-2"> <!-- pt para padding top y mt para margin top -->
        <!-- El contenido de tu página va aquí -->
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 col-lg-10 col-xl-8 mx-auto">
                <!-- Card con el formulario -->
                <div class="card cardiseñon  border-white bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div class="card-body">
                        <form action="./create-empresa.php" method="POST" enctype="multipart/form-data">

                            <div id="formulario" class="row align-items-center ">
                                <div class=" text-center">
                                    <p class="estilop">Datos de la empresa</p>
                                </div>
                                <div class="col-md-6 g-3">
                                    <label class="form-label">Nombre Comercial:</label>
                                    <input onchange="verificarNombreComercial(this.value)" type="text" id="nombrecomercial" name="nombrecomercial" class="form-control" placeholder="Nombre Comercial" aria-label="First name" required>
                                    <div id="mensaje-nombrecomercial"></div>
                                </div>
                                <div class="col-md-6 g-3">
                                    <label class="form-label">Razón Social </label>
                                    <input onchange="verificarRazonSocial(this.value)" type="text" id="razonsocial" name="razonsocial" class="form-control" placeholder="Razón social de la empresa..." aria-label="First name" required>
                                    <div id="mensaje-razonsocial"></div>
                                </div>
                                <!-- <div class="col-md-3 g-3">
                                    <label class="form-label">RFC </label>
                                    <input type="text" id="rfc" name="rfc" class="form-control" placeholder="RFC de la empresa" aria-label="First name" required>
                                </div> -->

                                <!-- rfc -->
                                <div class="col-md-5 g-3">
                                    <label class="form-label">RFC</label>
                                    <!-- <div class="input-container">
                                        <input type="text" oninput="permitirSoloLetrasRFC(event)" class="form-control" id="parte1RFC" maxlength="4" placeholder="XXXX" required>
                                        <span>-</span>
                                        <input type="text" oninput="permitirSoloNumerosRFC(this)" class="form-control" id="parte2RFC" maxlength="6" placeholder="AAMMDD" required>
                                        <span>-</span>
                                        <input type="text" oninput="permitirLetrasNumerosRFC(this)" class="form-control" id="parte3RFC" maxlength="3" placeholder="XXX" required>
                                        <button type="button" onclick="verificarDatos()">Verificar</button>
                                        <div id="mensaje"></div>
                                    </div> -->
                                    <input type="text" pattern="[A-Za-z]{3,4}[0-9]{6}[A-Za-z0-9]{3}" onchange="verificarRFC(this.value)" oninput="validarRFC(this)" class="form-control" id="rfc" name="rfc" maxlength="13" placeholder="XXXXAAMMDDXXX" required>
                                    <div id="error-rfc" class="mensaje-error-rfc col-md-5"></div>
                                </div>


                                <div>
                                    <p class="diseñosubT">Geolocalización </p>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Estado</label>
                                    <input type="text" oninput="eliminarCaracteresEspeciales(this)" id="estado" name="estado" class="form-control" placeholder="Estado" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Ciudad</label>
                                    <input type="text" oninput="eliminarCaracteresEspeciales(this)" id="ciudad" name="ciudad" class="form-control" placeholder="Ciudad" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Colonia</label>
                                    <input type="text" oninput="eliminarCaracteresEspeciales(this)" id="colonia" name="colonia" class="form-control" placeholder="Colonia" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Calle</label>
                                    <input type="text" oninput="eliminarCaracteresEspeciales(this)" id="calle" name="calle" class="form-control" placeholder="Calle" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Número exterior</label>
                                    <input type="text" id="num_ext" name="num_ext" class="form-control" placeholder="Num calle" aria-label="First name">
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Número interior</label>
                                    <input type="text" id="num_int" name="num_int" class="form-control" placeholder="Num domicilio" aria-label="First name">
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">CP</label>
                                    <input type="text" oninput="validarCodigoPostal(this.value)" maxlength="5" id="cp" name="cp" class="form-control" placeholder="" aria-label="First name">
                                    <div id="mensaje-error-cp"></div>
                                </div>
                            </div>
                            <div id="formulario" class="row align-items-center ">

                                <div class=" text-center">
                                    <p class="estilop">Contactos de la empresa
                                </div>
                                <div>
                                    <p class="diseñosubT">Director de la empresa </p>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label for="nombre-director" class="form-label">Nombre(s)</label>
                                    <input type="text" oninput="permitirLetrasAcentos(this)" id="nombre-director" name="nombre-director" class="form-control" placeholder="Nombres" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label for="apellidos-director" class="form-label">Apellido(s) </label>
                                    <input type="text" oninput="permitirLetrasAcentos(this)" id="apellidos-director" name="apellidos-director" class="form-control" placeholder="Apellido paterno" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label for="tel-director" class="form-label">Teléfono</label>
                                    <input type="text" oninput="permitirSoloNumeros(this)" id="tel-director" name="tel-director" maxlength="10" class="form-control" placeholder="Número telefónico" aria-label="First name" required>
                                </div>
                                <div class="col-md-5 g-3">
                                    <label for="email-director" class="form-label">Email </label>
                                    <input type="email" id="email-director" name="email-director" class="form-control" placeholder="Correo electrónico" aria-label="First name" required>
                                </div>
                                <div class="div-flex-admin d-flex flex-row">
                                    <p class="diseñosubT">Contacto Administrativo </p>
                                    <a class="a-admin" type="button" onclick="copiarCampos()">Igual que el anterior</a>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label for="nombre-admin" class="form-label">Nombre(s) </label>
                                    <input type="text" oninput="permitirLetrasAcentos(this)" id="nombre-admin" name="nombre-admin" class="form-control" placeholder="Nombres" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label for="apellidos-admin" class="form-label">Apellido(s) </label>
                                    <input type="text" oninput="permitirLetrasAcentos(this)" id="apellidos-admin" name="apellidos-admin" class="form-control" placeholder="Apellido paterno" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label for="tel-admin" class="form-label">Teléfono</label>
                                    <input type="text" oninput="permitirSoloNumeros(this)" id="tel-admin" name="tel-admin" maxlength="10" class="form-control" placeholder="Número telefónico" aria-label="First name" required>
                                </div>
                                <div class="col-md-5 g-3">
                                    <label for="email-admin" class="form-label">Email </label>
                                    <input type="email" id="email-admin" name="email-admin" class="form-control" placeholder="Correo electrónico" aria-label="First name" required>
                                </div>

                                <!-- <div>
                                    <p class="diseñosubT"> Responsable de la estadía

                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Nombre </label>
                                    <input type="text" id="nombre-responsable" name="nombre-responsable" class="form-control" placeholder="Nombres" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Apellido </label>
                                    <input type="text" id="ap-paterno-responsable" name="ap-paterno-responsable" class="form-control" placeholder="Apellido paterno" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Apellido </label>
                                    <input type="text" id="ap-materno-responsable" name="ap-materno-responsable" class="form-control" placeholder="Apellido materno" aria-label="First name" required>
                                </div>
                                <div class="col-md-3 g-3">
                                    <label class="form-label">Teléfono</label>
                                    <input type="text" id="tel-responsable" name="tel-responsable" class="form-control" placeholder="Número telefónico" aria-label="First name" required>
                                </div>
                                <div class="col-md-5 g-3">
                                    <label class="form-label">Email </label>
                                    <input type="text" id="email-responsable" name="email-responsable" class="form-control" placeholder="Correo electrónico" aria-label="First name" required>
                                </div> -->
                            </div>
                            <div id="formulario" class="row align-items-center ">
                                <div class="col-md-5">
                                    <label for="email-admin" class="form-label">Anexar PDF de Constancia de Situación Fiscal</label>
                                    <input type="file" accept=".pdf" onchange="mostrarArchivosPDF(event)" id="csf" name="csf" class="form-control" placeholder="Constancia de Situación Fiscal" aria-label="First name" required>
                                </div>
                            </div>
                            <div>
                                <div class="container-login100-form-btn">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
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
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>