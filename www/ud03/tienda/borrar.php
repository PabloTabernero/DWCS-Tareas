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
    <?php
        include("lib/base_datos.php");
    include("lib/utilidades.php");
    
        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);
    
        $id = test_input($_GET["id"]);
    
        $sql = "DELETE FROM usuarios WHERE id=$id";
        if ($conexion->query($sql)) {
            echo "Eliminado correctamente";
        } else {
            echo "Error eliminando : " . $conexion->error;
        }
        $conexion->close();
    ?>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>