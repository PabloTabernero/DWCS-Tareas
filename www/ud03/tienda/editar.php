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
    <h1>Editar usuario </h1>
    <?php
        include("lib/base_datos.php");
        include("lib/utilidades.php");

        //Si llegan datos por GET
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            //Se valida el id que llega por GET.
            $id = test_input($_GET["id"]);
            //Se recuperan los datos por id en un array.
            $row = recuperar_datos_usuario($id);
            //Se asignan datos del array a varibles para cubrir en el formulario.
            $id = $row["id"];
            $nombre = $row["nombre"];
            $apellidos = $row["apellidos"];
            $edad = $row["edad"];
            $provincia = $row["provincia"];

        //Si llegan datos por POST
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Se validan los datos que llegan por POST.
            $id = test_input($_POST["id"]);
            $nombre = test_input($_POST["nombre"]);
            $apellidos = test_input($_POST["apellidos"]);
            $edad = test_input($_POST["edad"]);
            $provincia = test_input($_POST["provincia"]);
            //Se actualizan datos en la tabla de usuarios.
            actualizar_datos_usuario($id, $nombre, $apellidos, $edad, $provincia);
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de edición</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <!-- Se utiliza un input oculto para pasar el id de usuario en el formulario.-->
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" required/>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>" required/>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" min="0" max="200" value="<?php echo $edad ?>" required/>
            <label for="provincia">Provincia:</label>
            <input type="text" name="provincia" id="provincia" value="<?php echo $provincia ?>" required/>
            <input class="btn btn-primary" type="submit" name="submit" value="Actualizar Usuario" />
        </form>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>