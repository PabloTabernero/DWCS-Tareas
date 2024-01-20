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
        include ("lib/base_datos.php");
        include ("lib/utilidades.php");
        require ("lib/funciones.php");
        $mensajes = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            if (empty($_POST["nombre"]) || empty($_POST["descripcion"]) || empty($_POST["precio"]) || empty($_POST["unidades"]) || empty($_FILES["imagenes"]["name"])) {
                $mensajes =  "Falta algún dato obligatorio en el formulario";
            } else {
                //Bucle para acceder a la clave de cada elemento del array $_FILES.
                foreach ($_FILES["imagenes"]["name"] as $key => $imagenNombre ) {
                    //Seleccionar el directorio de destino de la imagen.
                    $directorioDestino = "uploads/";
                    //Obtener la ruta completa del archivo destino.
                    $archivoDestino = $directorioDestino.basename($imagenNombre);
                    //Obtener el archivo temporal subido.
                    $archivoTemporal = $_FILES["imagenes"]["tmp_name"][$key];
                    //Obtener el tamaño del archivo.
                    $archivoTamanho =  $_FILES["imagenes"]["size"][$key];
                
                    if (comprobaTamanho($archivoTamanho)) {
                        if (compruebaExtension($archivoDestino)) { 
                            //Si tiene el tamaño y extensión correcta se mueve a la carpeta destino y se comprueba si la acción se realiza correctamente.  
                            if(move_uploaded_file($archivoTemporal, $archivoDestino)) {
                                //Almacenar en variables los datos pasados por el formulario.
                                $nombre = test_input($_POST["nombre"]);
                                $descripcion = test_input($_POST["descripcion"]);
                                $precio = test_input($_POST["precio"]);
                                $unidades = test_input($_POST["unidades"]);
                                //Extraer el contenido del fichero imagen.
                                $archivoContenido = addslashes(file_get_contents($archivoDestino));

                                //Realizar el alta del producto en la BD y configurar el mensaje de salida en función del resultado.
                                $resultado = alta_producto($nombre, $descripcion, $precio, $unidades, $archivoContenido);
                                $mensajes = $resultado ? "Producto dado de alta correctamente" : "Error en el alta del producto en la base de datos";
                            } else {
                                $mensajes = "Error subiendo el fichero.";
                            }
                        } else {
                            $mensajes = "El formato del fichero es incorrecto. Solo se admite JPG, JPEG, PNG o GIF";
                        }
                    } else {
                        $mensajes = "El fichero es demasiado grande.";
                    }
                
                }
            }        
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
                        <a class="nav-link" href="listar.php">Listar usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="dar_de_alta_productos.php">Alta productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </header>

        <article>
            <div class="container-fluid bg-white min-vh-100">
                <h2 class="text-center mt-4 mb-4">Alta de producto</h2>
                <p class="text-center mb-0">Formulario de alta</p>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" 
                class="mx-auto" style="max-width: 400px;">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required />
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" required />
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio:</label>
                        <input type="number" class="form-control" name="precio" id="precio" step="any" required />
                    </div>

                    <div class="mb-3">
                        <label for="unidades" class="form-label">Unidades:</label>
                        <input type="number" class="form-control" name="unidades" id="unidades" step="any" required />
                    </div>

                    <div class="mb-4">
                        <label for="imagenes" class="form-label">Selecciona una imagen:</label>
                        <input type="file" class="form-control" name="imagenes[]" id="imagenes[]" multiple required />                        
                    </div>

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="Alta Producto" />
                    </div>
                </form>

                <!-- Bloque php para imprimir el resultado del alta del procducto. -->
                <?php
                    //
                    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
                        if (!isset($resultado) || !$resultado){
                            echo "<div class='alert alert-danger text-center mx-auto' role='alert' style='max-width: 500px'>$mensajes</div>";
                        } else {
                            echo "<div class='alert alert-success text-center mx-auto' role='alert' style='max-width: 500px'>$mensajes</div>";
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