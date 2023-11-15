<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Alta de usuario </h1>
    <?php
        include ("lib/base_datos.php");

        alta_usuario();
        
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

        <p>Formulario de alta</p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required/>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" required/>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" min="0" max="200" required/>
            <label for="provincia">Provincia:</label>
            <input type="text" name="provincia" id="provincia" required/>
            <input class="btn btn-primary" type="submit" name="submit" value="Alta Usuario" />
        </form>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>