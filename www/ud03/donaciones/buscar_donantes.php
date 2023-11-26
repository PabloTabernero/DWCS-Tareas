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
        //Bloque php que recupera los datos de $_POST y lanza la busqueda de donantes.
        include_once("lib/base_datos.php");
        include_once("lib/utilidades.php");
        $codigo_postal = $grupo_sanguineo = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Se validan los datos de POST.
            $codigo_postal = test_input($_POST["codigo_postal"]);
            $grupo_sanguineo = test_input($_POST["grupo_sanguineo"]);
            
            $listado_donantes = buscar_donantes($codigo_postal, $grupo_sanguineo);
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
                        <a class="nav-link active me-2" href="buscar_donantes.php">Buscar donantes</a>
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
        <main>
            <!-- Titulo secundario, formulario de busqueda y tabla en caso de encontrar donantes-->
            <article>
                <div class="card mx-auto mb-4" style="max-width: 600px">
                    <div class="card-header">
                        <h2 class="fs-4 text-center">Formulario para buscar donantes</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="mb-3">
                                <label for="codigo_postal" class="form-label">Codigo Postal:</label>
                                <input type="number" class="form-control" name="codigo_postal" id="codigo_postal"
                                    pattern="/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/"
                                    title="Ingrese un código postal español válido de 5 dígitos" required />
                            </div>
                            <div class="mb-3">
                                <label for="grupo_sanguineo" class="form-label">Grupo Sanguineo:</label>
                                <select class="form-select" id="grupo_sanguineo" name="grupo_sanguineo" required>
                                    <option value="O-">O-</option>
                                    <option value="O+">O+</option>
                                    <option value="A-">A-</option>
                                    <option value="A+">A+</option>
                                    <option value="B-">B-</option>
                                    <option value="B+">B+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="AB+">AB+</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-primary me-4" type="submit" name="submit" value="Buscar" />
                                <input class="btn btn-primary" type="reset" name="reset" value="Borrar Formulario" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mb-4">
                    <?php 
                        //Bloque php que imprime los datos de los donantes compatibles y los mensajes de error.
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if ($listado_donantes) {  
                                imprimir_busqueda_donantes($listado_donantes);
                            //Se comprueba si $listado_donantes es un array para saber si la consulta no tiene resultados o se trata de un error.
                            }elseif(is_array($listado_donantes)) {
                                echo "<div class='alert alert-warning text-center mx-auto' role='alert' style='max-width: 600px'>No hay donantes compatibles con los criterios de búsqueda.</div>";  
                            }else{
                                echo "<div class='alert alert-danger text-center mx-auto' role='alert' style='max-width: 600px'>Error al realizar la consulta en la base de datos.</div>"; 
                            }
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