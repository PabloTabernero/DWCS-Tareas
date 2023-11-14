<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
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
    <h1>Lista de usuarios</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <!--Lista de usuarios con enlaces para borrar y editar-->
    <?php
        include ("lib/base_datos.php");
        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);
        //Consulta obtención dos usuarios (array)
        $sql = "SELECT id, nombre, apellidos, edad, provincia FROM usuarios";
        $resultados = $conexion->query($sql);
        if ($resultados->num_rows > 0) {
            echo "<table class=\"m-4\"><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Edad</th><th>Provincia</th></tr>";
            while($row = $resultados->fetch_assoc()){
                echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["apellidos"]."</td><td>".$row["edad"]."</td><td>".$row["provincia"]."</td>
                <td><a class=\"btn btn-primary\" href=\"editar.php?id=".$row["id"]."\" role=\"button\"> Editar</a></td>
                <td><a class=\"btn btn-primary\" href=\"borrar.php?id=".$row["id"]."\" role=\"button\"> Borrar</a></td>
                </tr>";
            }
            echo "</table>";
        }else{
            echo "0 resultados.";
        }
    ?>
    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>