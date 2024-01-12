<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda IES San Clemente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <div class="container">

        <header class="mb-4 bg-light">
            <h1 class="display-4 text-center">Tienda IES San Clemente</h1>

            <nav class="navbar navbar-light bg-light">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dar_de_alta.php">Alta usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="listar.php">Listar usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dar_de_alta_productos.php">Alta productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </header>

        <article>
            <div class="container-fluid bg-white min-vh-100">
                
                <h2 class="text-center mt-4 mb-4">Lista de usuarios</h2>
                <?php
                    //Bloque php para obtener e imprimir el listado de usuarios.
                    include ("lib/base_datos.php");
                    include ("lib/utilidades.php");
                    //Se obtiene el listado de usuarios.
                    $lista_usuarios = listar_usuarios();
                    //Se verifica si listar devuelve false para imprimir un mensaje de error.
                    if(!$lista_usuarios) {
                        echo "<div class='alert alert-danger text-center mx-auto' role='alert' style='max-width: 500px'>Error al obtener el listado de usuarios.</div>";
                    //Se verifica si hay resultados para imprimir el listado o indicar no que no hay usuarios.
                    }elseif($lista_usuarios->num_rows > 0) {
                        imprimir_listado_usuarios($lista_usuarios);
                    }else{
                        echo "<div class='alert alert-warning text-center mx-auto' role='alert' style='max-width: 500px'>No hay resultados para mostrar.</div>";
                    }
                ?>
            </div>
        </article>
        <footer class="fixed-bottom">
            <div class="container bg-light">
                <a href='index.php'>Página de inicio</a>
                <p class="mb-0"><small>&copy; 2023 2023 Gestión Tienda IES San Clemente. Todos los derechos
                        reservados.</small>
                </p>
                <p><small>Contacto: a22pablotv@iessanclemente.net</small></p>
            </div>
        </footer>
    </div>
</body>

</html>