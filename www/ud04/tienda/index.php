<?php
    session_start();

    include("lib/base_datos.php");

    //Realizar la configuración inicial de la base de datos.
    crear_bd_tienda();
    crear_tabla_usuarios();
    crear_tabla_productos();
    crear_tabla_imagenes();
    
    //Reenviar a la pagina de loguin si no hay session.
	if(!isset($_SESSION["usuario"])){	
		header("Location: login.php?redirigido=true");
	}

    //Contador de visitas. Guarda el valor durante minimo 1 mes.
    if (!isset($_COOKIE["visitas"])) {
        setcookie("visitas", 1, time() + 86400 * 30);
    } else {
        setcookie("visitas", $_COOKIE["visitas"] + 1, time()+ 86400 * 30);
    }

    //Selecionar idioma por defecto el gallego si la cookie no está definida
    if (!isset($_COOKIE["idioma"])) {
        setcookie("idioma", "Gallego", time() + (86400 * 30));
    }

    //Actualizar la cookie con el valor que llegue por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idioma"])) {
        $idioma = $_POST["idioma"];
        setcookie("idioma", $idioma, time() + (86400 * 30));
        header("Location: " . $_SERVER['PHP_SELF']);
    } 

    //Modificar el titulo, mensaje y campos del formulario de la web en función del idioma seleccionado.
    switch ($_COOKIE["idioma"]) {
        case "Gallego":
            $opcion = ["Gallego", "Español", "Ingles"];
            $titulo = "Benvido á Tenda do IES San Clemente.";
            $texto = "Descobre a nosa ampla selección de produtos de alta calidade. Na tenda do IES San Clemente, 
                        sentímonos orgullosos de ofrecer unha variedade de produtos que se axustan ás túas necesidades. 
                        Desde dispositivos electrónicos ata moda e accesorios, atoparás todo o que estás buscando.";          
            break;
        case "Español":
            $opcion = ["Español", "Gallego", "Ingles"];
            $titulo = "Bienvenido a la Tienda IES San Clemente";
            $texto = "Descubre nuestra amplia selección de productos de alta calidad. En la Tienda IES San Clemente,
                        nos enorgullece ofrecer una variedad de productos que se adaptan a tus necesidades. Desde
                        dispositivos electrónicos hasta moda y accesorios, encontrarás todo lo que estás buscando.";
            break;
        case "Ingles":
            $opcion = ["Ingles", "Gallego", "Español"];
            $titulo = "Welcome to IES San Clemente Store.";
            $texto = "Discover our wide selection of high-quality products. At IES San Clemente Store, 
                        we take pride in offering a variety of products that cater to your needs. 
                        From electronic devices to fashion and accessories, you'll find everything you're looking for.";
            break;
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

    <?php
        
    ?>

    <div class="container">
        <header class="mb-4 bg-light">
            <h1 class="display-4 text-center">Tienda IES San Clemente</h1>

            <nav class="navbar navbar-light bg-light">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dar_de_alta.php">Alta usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Listar usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dar_de_alta_productos.php">Alta productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Cerrar sesión</a>
                    </li>
                </ul>

                <!-- Se utiliza el array $opcion para tener siempre visible el idioma seleccionado -->
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form-inline">
                    <select class="form-select form-select-sm mb-2 mx-auto" id="idioma" name="idioma">
                        <option value="<?php echo $opcion[0] ?>"> <?php echo $opcion[0] ?> </option>
                        <option value="<?php echo $opcion[1] ?>"> <?php echo $opcion[1] ?> </option>
                        <option value="<?php echo $opcion[2] ?>"> <?php echo $opcion[2] ?> </option>
                    </select>
                    <button type="submit" class="btn btn-secondary btn-sm">Enviar</button>
                </form>

            </nav>
        </header>

        <article>
            <div class="container-fluid bg-white min-vh-100">
                <h2 class="text-center"> <?php echo $titulo ?> </h2>

                <p>
                    <?php echo $texto ?>
                </p>
            </div>
        </article>

        <footer class="fixed-bottom">
            <div class="container bg-light">
                <a href='index.php'>Página de inicio</a>
                <p class="mb-0"><small>Tú número de visitas a la web es: <?php echo $_COOKIE["visitas"] ?></small></p>
                <p class="mb-0"><small>&copy; 2023 2023 Gestión Tienda IES San Clemente. Todos los derechos
                        reservados.</small>
                </p>
                <p><small>Contacto: a22pablotv@iessanclemente.net</small></p>
            </div>
        </footer>
    </div>
</body>

</html>