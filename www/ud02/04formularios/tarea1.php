<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required><br><br>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required><br><br>

                <input type="submit" value="Enviar">
            </form>
        </div>

            <div>
                <?php 
                    /**  Cree un formulario que solicite su nombre y apellido. Cuando se reciben los datos, se debe mostrar la siguiente información:
                     * Nombre: `xxxxxxxxx`
                     *  Apellidos: `xxxxxxxxx`
                     * Nombre y apellidos: `xxxxxxxxxxxx xxxxxxxxxxxx`
                     * Su nombre tiene caracteres `X`.
                     * Los 3 primeros caracteres de tu nombre son: `xxx`
                     * La letra A fue encontrada en sus apellidos en la posición: `X`
                     * Tu nombre en mayúsculas es: `XXXXXXXXX`
                     * Sus apellidos en minúsculas son: `xxxxxx`
                     * Su nombre y apellido en mayúsculas: `XXXXXX XXXXXXXXXX`
                     * Tu nombre escrito al revés es: `xxxxxx`
                    */
                    
                    //Aquí el código php que muestra la información solicitada.

                    $nombre = "";
                    $apellidos = "";

                    function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nombre = test_input($_POST["nombre"]);
                        $apellidos = test_input($_POST["apellido"]);
                    }

                    echo $nombre."<br />";
                    echo $apellidos."<br />";
                    echo $nombre." ".$apellidos."<br />";
                    echo "Su nombre tiene ".strlen($nombre)." caracteres<br />";
                    echo "Los 3 primeros caracteres de tu nombre son: ".substr($nombre, 0, 3)."<br />";
                    echo "La letra A fue encontrada en sus apellidos en la posición: ".(strpos(strtolower($nombre), "a"))."<br />";
                    echo "Tu nombre en mayusculas es: ".strtoupper($nombre)."<br />";
                    echo "Sus apellidos en minusculas son: ".strtolower($apellidos)."<br />";
                    echo "Su nombre y apellidos en mayusculas son: ".strtoupper($nombre)." ".strtoupper($apellidos)."<br />";
                    echo "Tu nombre escrito al reves es: ".strrev($nombre);

                ?>
        </div>
    </body>
</html>
