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

        <h1 class="display-4 mt-4 mb-4">Alta de donante</h1>
        
        <?php
        include ("lib/base_datos.php");
        include ("lib/utilidades.php");

        //Comprobarmos si vienen datos por el POST.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Array con los campos a recoger de $_POST.
            $campos_formulario = ["nombre", "apellidos", "edad", "grupo_sanguineo", "codigo_postal", "telefono_movil"];
            //Se obtiene un array con los datos del formulario.
            $datos_formulario = recoger_datos_post($campos_formulario);
            //Se pasan los datos a la función alta donante para darlos de alta en la bd.
            dar_alta_donante($datos_formulario);
        }
        ?>

        <div class="mb-4">
            <p class="fs-4">Formulario para dar de alta un donante</p>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="col-md-4 mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required />
                </div>
                <div class="col-md-4 mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" id="apellidos" required />
                </div>
                <div class="col-md-4 mb-3">
                    <label for="edad" class="form-label">Edad:</label>
                    <input type="number" class="form-control" name="edad" id="edad" min="18" max="60" required />
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
                <div class="col-md-4 mb-3">
                    <label for="codigo_postal" class="form-label">Codigo Postal:</label>
                    <input type="number" class="form-control" name="codigo_postal" id="codigo_postal" min="01000"
                        max="52999" pattern="[0-9]{5}" title="Ingrese un código postal válido de 5 dígitos" required />
                </div>
                <div class="col-md-4 mb-3">
                    <label for="telefono_movil" class="form-label">Telefono Movil:</label>
                    <input type="tel" class="form-control" name="telefono_movil" id="telefono_movil" required />
                </div>
                <input class="btn btn-primary" type="submit" name="submit" value="Alta Usuario" />
                <input class="btn btn-primary" type="reset" name="reset" value="Borrar Formulario" />
            </form>
        </div>
    </div>
    <footer class="fixed-bottom">
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>