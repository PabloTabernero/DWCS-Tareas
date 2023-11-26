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
        include_once("lib/base_datos.php");
        include_once("lib/utilidades.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nombre_admin = test_input($_POST["nombre_usuario"]);
            $pass = test_input($_POST["password"]);
            $resultado = alta_administrador($nombre_admin, $pass);
        }
    ?>

    <div class="container">
        <!-- Título principal y navbar-->
        <header class="mb-4 text-center">
            <h1 class="display-4">Gestión Donación de Sangre</h1>

            <nav class="navbar navbar-light bg-light">
                <ul class="nav nav-pills mx-auto">
                    <li class="nav-item">
                        <a class="nav-link me-2" href="index.php">Inicio</a>
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
                        <a class="nav-link active" href="dar_alta_administrador.php">Nuevos administradores</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>

            <!-- Titulo secundario y formulario de alta de administrador-->
            <article>

                <div class="mb-4">
                    <?php
                        if($resultado) {  
                            echo "<div class='alert alert-success text-center mx-auto' role='alert' style='max-width: 600px'>Administrador dado de alta.</div>";
                        }else{
                            echo "<div class='alert alert-danger text-center mx-auto' role='alert' style='max-width: 600px'>No se pudo dar de alta al administrador.</div>";
                        }
                    ?>
                </div>
            </article>
        </main>
        <footer class="fixed-bottom">
            <div class="container">
                <p class="mb-0"><small>&copy; 2023 Gestión Donación de Sangre. Todos los derechos reservados.</small>
                </p>
                <p><small>Contacto: a22pablotv@iessanclemente.net</small></p>
            </div>
        </footer>
    </div>
</body>

</html>