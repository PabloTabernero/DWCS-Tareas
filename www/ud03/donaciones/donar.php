<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        input, label {
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
        include_once("lib/base_datos.php");
        include_once("lib/utilidades.php");
        $id = "";

        //Si los datos llegan por GET se recupera el id del cliente.
        if ($_SERVER["REQUEST_METHOD"] == "GET") {

            $id = test_input($_GET["id"]);
        
        //Si los datos llegan por POST se recupera el id, la fecha de donación y se
        //Actualizan los datos de la donación en la Base de datos historico.
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = test_input($_POST["id"]);
            $fecha_donacion = test_input($_POST["fecha_donacion"]);
        
            registrar_donacion($id, $fecha_donacion);
        }

        //Independientemente de por donde llegue el id, se recuperan los datos del donante
        //Para poder rellenar el formulario.
        $datos_donante = recuperar_datos_donante($id);

        foreach($datos_donante as $clave => $valor) {
            $$clave = $valor;
        }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <br>
    <h1>Alta de donación</h1>
    <div>
        <p>Formulario para dar de alta una donación</p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" value="<?php echo $id ?>" readonly> 
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" readonly/>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>" readonly/><br /><br />
            <label for="fecha_donacion">Fecha Donación:</label>
            <input type="date" name="fecha_donacion" id="fecha_donacion" value="<?php echo date("Y-m-d") ?>" max="<?php echo date("Y-m-d") ?>" required/>

            <input class="btn btn-primary" type="submit" name="submit" value="Registrar Donacion" />
        </form>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>