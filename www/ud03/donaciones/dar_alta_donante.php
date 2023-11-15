<!doctype html>
<html lang="en">

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
    <br>
    <h1>Alta de donante</h1>
    <?php
        include ("lib/base_datos.php");
        include ("lib/utilidades.php");

        //Comprobarmos si vienen datos por el POST.
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Array con los campos a recoger de $_POST.
            $campos_formulario = ["nombre", "apellidos", "edad", "grupo_sanguineo", "codigo_postal", "telefono_movil"];
            //Se obtiene un array con los datos del formulario.
            $datos_formulario = recoger_datos_post($campos_formulario);
            //Se pasan los datos a la función alta donante para darlos de alta en la bd.
            dar_alta_donante($datos_formulario);
        }
    ?>
    <div>
        <p>Formulario para dar de alta un donante</p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required/>
            <label for="apellidos">Apellidos:</label>
            <input type="text" name="apellidos" id="apellidos" required/>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" min="18" max="60" required/>
            <label for="grupo_sanguineo">Grupo Sanguineo:</label>
            <select id="grupo_sanguineo" name="grupo_sanguineo" required>
                <option value="O-">O-</option>
                <option value="O+">O+</option>
                <option value="A-">A-</option>
                <option value="A+">A+</option>
                <option value="B-">B-</option>
                <option value="B+">B+</option>
                <option value="AB-">AB-</option>
                <option value="AB+">AB+</option>
            </select>
            <label for="codigo_postal">Codigo Postal:</label>
            <input type="number" name="codigo_postal" id="codigo_postal" min="01000" max="52999" pattern="[0-9]{5}" title="Ingrese un código postal válido de 5 dígitos" required/>
            <label for="telefono_movil">Telefono Movil:</label>
            <input type="number" name="telefono_movil" id="telefono_movil" pattern="[6-7][0-9]{8}" title="Ingrese un número de teléfono móvil válido de 9 dígitos" required/><br /><br />

            <input class="btn btn-primary" type="submit" name="submit" value="Alta Usuario" />
        </form>
    </div>

    <footer>
        <p><a href='index.php'>Página de inicio</a></p>
    </footer>

</body>

</html>