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

        <h1 class="display-4 mt-4 mb-4">Buscar donantes</h1>

        <div class="mb-4">
            <p class="fs-4">Formulario para buscar donantes</p>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="col-md-4 mb-3 form-outline">
                    <label for="codigo_postal" class="form-label">Codigo Postal:</label>
                    <input type="search" class="form-control" name="codigo_postal" id="codigo_postal" required />
                </div>
                <div class="col-md-4 mb-3">
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
                <input class="btn btn-primary" type="submit" name="submit" value="Buscar" />
                <input class="btn btn-primary" type="reset" name="reset" value="Borrar Formulario" />
            </form>

            <?php 
            if($listado_donantes != "") {
                imprimir_busqueda_donantes($listado_donantes);
            }
        ?>
        </div>
        <footer class="fixed-bottom">
            <p><a href='index.php'>Página de inicio</a></p>
        </footer>

</body>

</html>