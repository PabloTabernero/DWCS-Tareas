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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?php
        //Bloque php que comprueba el metodo por el que llegan los datos. 
        include("lib/base_datos.php");
        include("lib/utilidades.php");
        //Se inicializan las variables del formulario.
        $nombre = $apellidos = $edad = $provincia = $resultado_cambios = $datos = "";

        //Si llegan datos por GET
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            //Se valida el id que llega por GET.
            $id = test_input($_GET["id"]);
            //Se recuperan los datos por id en un array asociativo.
            $datos = recuperar_datos_usuario($id);
        
            if($datos) {
                //Se asignan datos del array a varibles para cubrir en el formulario.
                $id = $datos["id"];
                $nombre = $datos["nombre"];
                $apellidos = $datos["apellidos"];
                $edad = $datos["edad"];
                $provincia = $datos["provincia"];
            }
        //Si llegan datos por POST
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Se validan los datos que llegan por POST.
            $id = test_input($_POST["id"]);
            $nombre = test_input($_POST["nombre"]);
            $apellidos = test_input($_POST["apellidos"]);
            $edad = test_input($_POST["edad"]);
            $provincia = test_input($_POST["provincia"]);
            
            //Se actualizan datos en la tabla de usuarios.
            $resultado_cambios = actualizar_datos_usuario($id, $nombre, $apellidos, $edad, $provincia);
        }
    ?>

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
                <h2 class="text-center mt-4 mb-4">Edición de usuario</h2>
                <p class="text-center mb-0">Formulario de edición</p>



                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mx-auto"
                    style="max-width: 400px;">
                    <!-- Se utiliza un input oculto para pasar el id de usuario en el formulario.-->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre ?>"
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos:</label>
                        <input type="text" class="form-control" name="apellidos" id="apellidos"
                            value="<?php echo $apellidos ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad:</label>
                        <input type="number" class="form-control" name="edad" id="edad" min="0" max="200"
                            value="<?php echo $edad ?>" required />
                    </div>
                    <div class="mb-3">
                        <label for="provincia" class="form-label">Provincia:</label>
                        <input type="text" class="form-control" name="provincia" id="provincia"
                            value="<?php echo $provincia ?>" required />
                    </div>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="Actualizar Usuario" />
                    </div>
                </form>

                <?php
                    //Bloque php para imprimir mensajes.
                    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                        if($resultado_cambios) {
                            echo "<div class='alert alert-success text-center mx-auto' role='alert' style='max-width: 500px'>Se han actualizado los datos del cliente.</div>";
                        }else{
                            echo "<div class='alert alert-danger text-center mx-auto' role='alert' style='max-width: 600px'>No se han podido actualizar los datos del cliente.</div>"; 
                        }
                    }elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
                        if($datos) {
                            echo "<div class='alert alert-success text-center mx-auto' role='alert' style='max-width: 500px'>Se han recuperado los datos del cliente.</div>";
                        }else{
                            echo "<div class='alert alert-danger text-center mx-auto' role='alert' style='max-width: 600px'>No se han podido actualizar los datos del cliente.</div>"; 
                        }
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