<?php
    session_start();

    require "lib/base_datos.php";
    require "lib/utilidades.php";
    
    //Inicializar variable error.
    $error = false;
  
    //Comprobar si se reciben los datos por POST
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $usuario = $_POST["usuario"];
        $pass = $_POST["pass"];
        
        //Realizar consula de usuario en la BD
        $conexion = get_conexion();
        seleccionar_bd_tienda($conexion);
        $resultado = comprobar_usuario($conexion, $usuario);
        cerrar_conexion($conexion);
        
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
    <title>Tienda IES San Clemente </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <h1>Login de Usuario</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

    <p>Login</p>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        Usuario: <input name="usuario" id="usuario" type="text">
        Contraseña: <input name="pass" id="pass" type="password">
        <input type="submit">
    </form>

    <?php
        if ($error) {
            echo "Nombre de usuario o contraseña incorrecto";
        }
    ?>

    <footer>
        <p>
            <a href='index.php'>Página de inicio</a>
        </p>
    </footer>
</body>

</html>