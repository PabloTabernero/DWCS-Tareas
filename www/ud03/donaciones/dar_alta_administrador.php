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
            <p class="fs-4">Formulario para dar de alta un administrador</p>

            <form method="post" action="altaadmin.php">

                <div class="col-md-4 mb-3">
                    <label for="nombre_usuario" class="form-label">Nombre de Usuario:</label>
                    <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" required />
                </div>
                <div class="col-md-4 mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="password" name="password" required />
                </div>

                <input class="btn btn-primary" type="submit" name="submit" value="Alta Administrador" />

            </form>
        </div>
    </div>
    <footer class="fixed-bottom">
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>