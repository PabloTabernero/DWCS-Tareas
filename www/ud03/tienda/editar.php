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
        //Obter id de $_GET
        //Conexión
        //Seleccionar bd
        include("lib/base_datos.php");
        include("lib/utilidades.php");
        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);
    
        $id = test_input($_GET["id"]);

        $sql = "SELECT id, nombre, apellidos, edad, provincia FROM usuarios WHERE id=$id";
        $resultados = $conexion->query($sql);
        $row = $resultados->fetch_assoc();
        $id = $row["id"];
        $nombre = $row["nombre"];
        $apellidos = $row["apellidos"];
        $edad = $row["edad"];
        $provincia = $row["provincia"];
 
        //Consultar datos de ese id

        //Obter os datos de $_POST
        //Executar UPDATE
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Formulario de edición</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" required/>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos ?>" required/>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" min="0" max="200" value="<?php echo $edad ?>" required/>
            <label for="provincia">Provincia:</label>
            <input type="text" name="provincia" id="provincia" value="<?php echo $provincia ?>" required/>
            <input class="btn btn-primary" type="submit" name="submit" value="Alta Usuario" />
        </form>
    
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>