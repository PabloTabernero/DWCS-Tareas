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
        $id = "";

        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $id = test_input($_GET["id"]);

        }elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = test_input($_POST["id"]);
            $fecha_donacion = test_input($_POST["fecha_donacion"]);
        }

        //Independientemente de por donde llegue el id, se recuperan los datos del donante
        //Para poder rellenar el formulario.
        $datos_donante = recuperar_datos_donante($id);

        foreach($datos_donante as $clave => $valor) {
            $$clave = $valor;
        }
    ?>

    <div class="container">
        <!-- Header con el título principal -->
        <header class="mb-4">
            <h1 class="display-4">Gestión Donación de Sangre</h1>

            <nav class="navbar navbar-light bg-light">
                <ul class="nav nav-pills justify-content-center">
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
                        <a class="nav-link active me-2" href="listar_donantes.php">Listar donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dar_alta_administrador.php">Nuevos administradores</a>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Titulo secundario y tabla con la lista de donantes-->
        <article>
            <div class="mb-4">
                <h2 class="fs-4">Formulario para dar de alta una donación</h2>
            </div>
            <div class="mb-4">
                <div class="card col-5 mb-4">
                    <div class="card-header">
                        Datos donante
                    </div>
                    <div class="card-body">
                        <p class="card-text">Nombre: <?php echo $nombre ?></p>
                        <p class="card-text">Apellidos: <?php echo $apellidos ?></p>
                        <p class="card-text">Edad: <?php echo $edad ?></p>
                        <p class="card-text">Grupo sanguineo: <?php echo $grupo_sanguineo ?></p>
                        <p class="card-text">Código postal: <?php echo $codigo_postal ?></p>
                        <p class="card-text">Teléfono móvil: <?php echo $telefono_movil ?></p>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <!--Se envía el id recuperado por GET oculto en el formulario-->
                    <input type="text" id="id" name="id" value="<?php echo $id ?>" hidden />
                    <div class="col-md-4 mb-3">
                        <label for="fecha_donacion" class="form-label">Fecha Donación:</label>
                        <input type="date" class="form-control" name="fecha_donacion" id="fecha_donacion"
                            value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d") ?>" required />
                    </div>

                    <input class="btn btn-primary" type="submit" name="submit" value="Registrar Donacion" />
                </form>
            </div>
            <div class="mb-4">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        //Si los datos llegan por POST se registra la donación en la base de datos.
                        //Imprime mensaje de exito.
                        registrar_donacion($id, $fecha_donacion);
                    }
                ?>
            </div>
        </article>

        <footer class="fixed-bottom">
            <div class="container">
                <p class="fs-8">&copy; 2023 Gestión Donación de Sangre. Todos los derechos reservados.</p>
            </div>
        </footer>
    </div>
</body>

</html>