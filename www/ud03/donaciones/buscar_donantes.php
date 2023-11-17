<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        td,th {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
        include_once("lib/base_datos.php");
        include_once("lib/utilidades.php");
            $codigo_postal = $grupo_sanguineo = $listado_donantes = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $codigo_postal = test_input($_POST["codigo_postal"]);
                $grupo_sanguineo = test_input($_POST["grupo_sanguineo"]);
                $listado_donantes = buscar_donantes($codigo_postal, $grupo_sanguineo);
            }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Buscar donantes</h1>
    <div>
        <p>Formulario para buscar donantes</p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <label for="codigo_postal">Codigo Postal:</label>
            <input type="search" name="codigo_postal" id="codigo_postal" required /> 
            <label for="grupo_sanguineo">Grupo Sanguineo:</label>
            <select id="grupo_sanguineo" name="grupo_sanguineo" required >
                <option value="O-">O-</option>
                <option value="O+">O+</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
            </select>

            <input class="btn btn-primary" type="submit" name="submit" value="Buscar" />

        </form>

        <?php 
            if($listado_donantes != "") {
                imprimir_busqueda_donantes($listado_donantes);
            }
        ?>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>