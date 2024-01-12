<?php
    session_start();

    require "lib/base_datos.php";
    require "lib/utilidades.php";
    
    //Inicializar variable error.
    $error = false;
  
    //Comprobar si se reciben los datos por POST
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $usuario = $_POST["nombre"];
        $pass = $_POST["password"];
        
        //Realizar consula de usuario en la BD
        $resultado = comprobar_usuario($usuario);
        
        if(!$resultado){
            $error = true;
        }else{
            $usuario = $resultado->fetch_assoc();
            $pass_bd = $usuario['password'];


            if (!password_verify($pass, $pass_bd)) {
                $error = true;
            } else {
                $_SESSION['usuario'] = $usuario['nombre'];
                //Redirigimos a index.php
                header('Location: index.php');
            }
        }
    }
?>

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
        </header>

        <article>
            <div class="container-fluid bg-white min-vh-100">
                <h2 class="text-center mt-4 mb-4">Inicio de sesión</h2>


                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="mx-auto"
                    style="max-width: 400px;">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña:</label>
                        <input type="password" class="form-control" name="password" id="password" required />
                    </div>

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="Iniciar Sesión" />
                    </div>
                </form>

                <?php
                    if ($error) {
                        echo "<div class='alert alert-danger text-center mx-auto' role='alert' style='max-width: 600px'>Nombre de usuario o contraseña incorrecta.</div>";
                    }
                ?>

            </div>
        </article>

        <footer class="fixed-bottom">
            <div class="container bg-light">
                <a href='index.php'>Página de inicio</a>
                <p class="mb-0"><small>&copy; 2023 Gestión Tienda IES San Clemente. Todos los derechos
                        reservados.</small>
                </p>
                <p><small>Contacto: a22pablotv@iessanclemente.net</small></p>
            </div>
        </footer>
    </div>
</body>

</html>