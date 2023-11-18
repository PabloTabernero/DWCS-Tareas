<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?php
        include ("lib/base_datos.php");
        //Se crea la base de datos y las tablas si no están creadas.
        crear_bd_donacion();
        crear_tabla_donantes();
        crear_tabla_historico();
        crear_tabla_administradores();
    ?>

    <div class="container">
        <!-- Header con el título principal -->
        <header class="mb-4">
            <h1 class="display-4">Gestión Donación de Sangre</h1>

            <nav class="navbar navbar-light bg-light">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active me-2" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="dar_alta_donante.php">Alta donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="buscar_donantes.php">Buscar donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="listar_donantes.php">Listar donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dar_alta_administrador.php">Nuevos administradores</a>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Titulo secundario y presentación de la aplicación-->
        <article>
            <div class="mb-4">
                <h2 class="fs-4">Bienvenido al portal de Gestión de Donación de Sangre</h2>
            </div>
            <div class="mb-4">
                <p>
                    Esta plataforma está diseñada para facilitar la gestión de donantes de sangre y proporcionar
                    información esencial para los administradores. Utiliza las opciones del menú superior para acceder
                    a las distintas funcionalidades del sistema.
                </p>
            </div>
        </article>

        <footer class="fixed-bottom">
            <div class="container">
                <p clas="fs-8">&copy; 2023 Gestión Donación de Sangre. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
</body>

</html>