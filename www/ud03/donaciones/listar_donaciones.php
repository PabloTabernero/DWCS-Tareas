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
        //Bloque php que recupera los datos del donante y su historico de donanciones.
        include_once("lib/base_datos.php");
        include_once("lib/utilidades.php");
        $id = "";

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
            $id = test_input($_GET["id"]);
            //Se recuperan los datos del donante.
            $datos_donante = recuperar_datos_donante($id);
            //Se recorre el array con los datos del donante recuperados y se crean las variables con el 
            //nombre de la clave del array.
            foreach($datos_donante as $clave => $valor) {
                $$clave = $valor;
            }
            //Se obtiene el historico de donaciones.
            $lista_donaciones = recuperar_donaciones($id);
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
                        <a class="nav-link active me-2" href="listar_donantes.php">Listar donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dar_alta_administrador.php">Nuevos administradores</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <!-- Titulo secundario, tarjeta con datos donante y tabla con fecha de donaciones-->
            <article>
                <div class="card mx-auto mb-4" style="max-width: 600px">
                    <div class="card-header">
                        <h2 class="fs-4 text-center">Listado de donaciones</h2>
                    </div>
                    <div class="card-body">
                        <div class="card mx-auto">
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
                </div>
                <div class="mx-auto mb-4" style="max-width: 600px">
                    <?php 
                        //Bloque php para imprimir el listado de donaciones o mensajes de error.
                        if ($lista_donaciones) {
                            imprimir_donaciones($lista_donaciones);    
                        //Se utiliza is_array para diferenciar cuando se trata de una consulta vacia o un error.
                        }elseif(is_array($lista_donaciones)){
                            echo "<div class='alert alert-warning text-center mx-auto' role='alert' style='max-width: 600px'>No hay donaciones para mostrar.</div>";
                        }else{
                            echo "<div class='alert alert-danger text-center mx-auto' role='alert' style='max-width: 600px'>Error realizando la consulta a la base de datos.</div>";
                        }
                    ?>
                </div>
    </div>
    </article>
    </main>
    <footer class="fixed-bottom">
        <div class="container">
            <p class="mb-0"><small>&copy; 2023 Gestión Donación de Sangre. Todos los derechos reservados.</small></p>
            <p><small>Contacto: a22pablotv@iessanclemente.net</small></p>
        </div>
    </footer>
    </div>
</body>

</html>