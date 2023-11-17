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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
        </script>

        <h1 class="display-4 mt-4 mb-4">Alta de administrador</h1>

        <div class="mb-4">

            <?php
            include_once("lib/base_datos.php");
            include_once("lib/utilidades.php");

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $nombre_admin = test_input($_POST["nombre_usuario"]);
                $pass = test_input($_POST["password"]);

                alta_administrador($nombre_admin, $pass);
            
                }
        ?>

        </div>
    </div>
    <footer class="fixed-bottom">
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>