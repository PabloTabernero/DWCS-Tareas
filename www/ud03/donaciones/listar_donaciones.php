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
    <div class="container">
        <?php
        include_once("lib/base_datos.php");
        include_once("lib/utilidades.php");
        $id = "";

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
            $id = test_input($_GET["id"]);

            //Se recuperan los datos del donante para poder mostrarlos en el encabezado.
            $datos_donante = recuperar_datos_donante($id);
        }

    ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>

        <h1 class="display-4 mt-4 mb-4">Gestión donacion de Sangre</h1>

        <div class="mb-4">
            <p class="fs-4">Datos del donante</p>
            <div class="col-md-4 mb-3">
                <p>Nombre: <?php echo $datos_donante["nombre"]; ?></p>
                <p>Apellidos: <?php echo $datos_donante["apellidos"]; ?></p>
                <p>Edad: <?php echo $datos_donante["edad"]; ?></p>
                <p>Grupo Sanguineo: <?php echo $datos_donante["grupo_sanguineo"]; ?></p>
            </div>

            <div class="col-md-4 mb-3">
                <p class="fs-4">Listado de donaciones</p>

                <?php listar_donaciones($id) ?>
            </div>
        </div>
    </div>
    <footer class="fixed-bottom">
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>