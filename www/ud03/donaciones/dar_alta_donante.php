<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donación Sangre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <?php
        //Bloque php que obtiene los datos que llegan por POST y da de alta a un donante.
        include ("lib/base_datos.php");
        include ("lib/utilidades.php");

        //Comprobarmos si vienen datos por el POST.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Creamos un array con los nombres de los campos a recoger de $_POST.
            $campos_formulario = ["nombre", "apellidos", "edad", "grupo_sanguineo", "codigo_postal", "telefono_movil"];
            //Se obtiene un array asociativo con los datos del formulario.
            $datos_formulario = recoger_datos_post($campos_formulario);
            //Se pasan los datos a la función alta donante para darlos de alta en la bd.
            $resultado = dar_alta_donante($datos_formulario);
        }
    ?>

    <div class="container">
        <!-- Título principal y navbar-->
        <header class="mb-4 text-center">
            <h1 class="display-4">Gestión Donación de Sangre</h1>

            <nav class="navbar navbar-light bg-light">
                <ul class="nav nav-pills mx-auto">
                    <li class="nav-item">
                        <a class="nav-link me-2" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active me-2" href="dar_alta_donante.php">Alta donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="buscar_donantes.php">Buscar donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="listar_donantes.php">Listar donantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dar_alta_administrador.php">Nuevos administradores</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main>
            <!-- Titulo secundario y formulario de alta-->
            <article>
                <div class="card mx-auto mb-4" style="max-width: 600px">
                    <div class="card-header">
                        <h2 class="fs-4 text-center">Formulario para dar de alta un donante</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre" required />
                            </div>
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos:</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos" required />
                            </div>
                            <div class="mb-3">
                                <label for="edad" class="form-label">Edad:</label>
                                <input type="number" class="form-control" name="edad" id="edad" min="18" max="65"
                                    title="Por favor, introduzca una edad válida (entre 18 y 65)." required />
                            </div>
                            <div class="mb-3">
                                <label for="grupo_sanguineo" class="form-label">Grupo Sanguineo:</label>
                                <select class="form-select" id="grupo_sanguineo" name="grupo_sanguineo" required>
                                    <option value="O-">O-</option>
                                    <option value="O+">O+</option>
                                    <option value="A-">A-</option>
                                    <option value="A+">A+</option>
                                    <option value="B-">B-</option>
                                    <option value="B+">B+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="AB+">AB+</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="codigo_postal" class="form-label">Codigo Postal:</label>
                                <input type="number" class="form-control" name="codigo_postal" id="codigo_postal"
                                    pattern="/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/"
                                    title="Ingrese un código postal español válido de 5 dígitos" required />
                            </div>
                            <div class="mb-3">
                                <label for="telefono_movil" class="form-label">Telefono Movil:</label>
                                <input type="tel" class="form-control" name="telefono_movil" id="telefono_movil"
                                    maxlength="9" pattern="^[6-9]\d{8}$"
                                    title="Introduce un número de teléfono móvil español válido. Debe comenzar con un dígito del 6 al 9, seguido por 8 dígitos numéricos."
                                    required />
                            </div>
                            <div class="text-center">
                                <input class="btn btn-primary me-4" type="submit" name="submit" value="Alta Usuario" />
                                <input class="btn btn-primary" type="reset" name="reset" value="Borrar Formulario" />
                            </div>
                        </form>
                    </div>
                </div>

                <div class="mb-4">
                    <?php
                        //Bloque php para imprimir el resultado de la operación.
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if($resultado){
                                echo "<div class='alert alert-success text-center mx-auto' role='alert' style='max-width: 500px'>Se ha creado un nuevo registro en la tabla usuarios.</div>";
                            }else{
                                echo "<div class='alert alert-warning text-center mx-auto' role='alert' style='max-width: 600px'>No se ha podido crear el nuevo registro en la tabla usuarios.</div>"; 
                            }
                        }
                    ?>
                </div>
            </article>
        </main>
        <footer>
            <div class="container">
                <p class="mb-0"><small>&copy; 2023 Gestión Donación de Sangre. Todos los derechos reservados.</small>
                </p>
                <p><small>Contacto: a22pablotv@iessanclemente.net</small></p>
            </div>
        </footer>
    </div>
</body>

</html>