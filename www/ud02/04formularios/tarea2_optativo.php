<html>
    <head>
        <meta charset="utf-8">
        <title>HTML</title> 
    </head>
    <body>
        <div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <label for="bebida">Bebida:</label>
                    <select id="bebida" name="bebida" required>
                        <option value="Coca Cola">Coca Cola - 1 €</option>
                        <option value="Pepsi Cola">Pepsi Cola - 0,80 €</option>
                        <option value="Fanta Naranja">Fanta Naranja - 0,90 €</option>
                        <option value="Trina Manzana">Trina Manzana - 1,10 €</option>
                    </select><br><br>

                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" min="1" required><br><br>

                <input type="submit" name="submit" value="Solicitar">
            </form>
        </div>

        <?php 
            /*
            Crea un formulario para solicitar una de las siguientes bebidas:

            Bebida|PVP
            :-|:-:
            Coca Cola|1 €
            Pepsi Cola|0,80 €
            Fanta Naranja|0,90 €
            Trina Manzana|1,10 €
    
            A mayores, necesitamos un campo adicional con la cantidad de bebidas a comprar y un botón de <kbd>Solicitar</kbd>.
    
            La aplicación mostrará algo como:

            Pediste 3 botellas de Coca Cola. Precio total a pagar: 3 Euros.
            Puedes utilizar sentencias `switch` o `if`.
            */

            //Aquí va el código PHP que muestra la información solicitada.

            $precios = array(
                "Coca Cola" => 1,
                "Pepsi Cola" => 0.80,
                "Fanta Naranja" => 0.90,
                "Trina Manzana" => 1.10
            );

            $bebida = "";
            $cantidad = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $bebida = test_input($_POST["bebida"]);
                $cantidad = test_input($_POST["cantidad"]);

            }
      
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if ($bebida != "") {
                echo "Pediste $cantidad botella de $bebida. Precio total a pagar: ".($cantidad * $precios[$bebida])." Euros.";
            }
        ?>
    </body>
</html>