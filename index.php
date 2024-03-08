<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>CLUSTER</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="./css/carrousel.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md fixed-top">
            <div class="container">
                <!-- Logo visible en todos los tamaños de dispositivo -->
                <a class="navbar-brand" href="#">
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
                            <a id="estiloLetra" class="nav-link mx-2" href="">Acceder</a>
                        </li>
                        <li class="nav-item">
                            <a id="estiloLetra" class="nav-link mx-2" href="">Registrate</a>
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
    </header>


    <main>
        <!-- CARROUSEL -->
        <section id="gallery">
            <div class="gallery-container">
                <figure class="gallery-item">
                    <img src="./requisitos/banners/banner1.jpg" alt="Imagen 1">
                    <div class="overlay"></div>
                    <figcaption class="text-overlay">
                        <h2>Título de la imagen 1</h2>
                        <p>Descripción de la imagen 1</p>
                    </figcaption>

                </figure>
                <figure class="gallery-item">
                    <img src="./requisitos/banners/banner2.jpg" alt="Imagen 2">
                    <div class="overlay"></div>
                    <figcaption class="text-overlay title1">
                        <h2>Título de la imagen 2</h2>
                        <p>Descripción de la imagen 2</p>
                    </figcaption>

                </figure>
                <figure class="gallery-item">
                    <img src="./requisitos/banners/banner3.jpg" alt="Imagen 3">
                    <div class="overlay"></div>
                    <figcaption class="text-overlay title1">
                        <h2>Título de la imagen 3</h2>
                        <p>Descripción de la imagen 3</p>
                    </figcaption>

                </figure>
                <!-- ... otras imágenes ... -->
            </div>


            <div class="nav-button prev-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                </svg>
            </div>
            <div class="nav-button next-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                </svg>
            </div>

        </section>




        <!-- FORMULARIO DE ALUMNO -->
        <div class="m-2 p-3">
            <div class="container">
                <a type="button" class="btn btn-primary" href="./login/login-estudiante.php">Entrar como alumno</a>
                <!-- <a type="button" class="btn btn-primary" href="./views/subir-datos-alumno.php">Registrarse como Alumno</a> -->
            </div>
            <br>
            <div class="container">
            <a type="button" class="btn btn-primary" href="./views/datos-empresa/subir-datos-empresa.php">Entrar como empresa</a>
                <!-- <a type="button" class="btn btn-primary" href="./views/datos-empresa/subir-datos-empresa.php">Entrar como empresa</a> -->
            </div>

        </div>

    </main>

    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>Enlaces</h3>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="./admin/panel.php">Administrador</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contacto</h3>
                <p>Dirección: 123 Calle Principal</p>
                <p>Teléfono: 123-456-7890</p>
                <p>Correo electrónico: info@example.com</p>
            </div>
            <div class="footer-column">
                <h3>Redes Sociales</h3>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </div>

        </div>
    </footer>

    <script>
        function showTextOverlay(img) {
            img.nextElementSibling.classList.add('show');
        }
    </script>

    <script>
        let currentIndex = 0;

        document.querySelector('.prev-button').addEventListener('click', () => {
            navigate(-1);
        });

        document.querySelector('.next-button').addEventListener('click', () => {
            navigate(1);
        });

        function navigate(direction) {
            const galleryContainer = document.querySelector('.gallery-container');
            const totalImages = document.querySelectorAll('.gallery-item').length;

            currentIndex = (currentIndex + direction + totalImages) % totalImages;
            const offset = -currentIndex * 100;

            galleryContainer.style.transform = `translateX(${offset}%)`;
        }
    </script>

    <script>
        let autoplayInterval = null;

        function startAutoplay(interval) {
            stopAutoplay(); // Detiene cualquier autoplay anterior para evitar múltiples intervalos.
            autoplayInterval = setInterval(() => {
                navigate(1); // Navega a la siguiente imagen cada intervalo de tiempo.
            }, interval);
        }

        function stopAutoplay() {
            clearInterval(autoplayInterval);
        }

        // Iniciar autoplay con un intervalo de 3 segundos.
        startAutoplay(3000);

        // Opcional: Detener autoplay cuando el usuario interactúa con los botones de navegación.
        document.querySelectorAll('.nav-button').forEach(button => {
            button.addEventListener('click', stopAutoplay);
        });
    </script>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>