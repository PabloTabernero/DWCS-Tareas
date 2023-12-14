<?php
    include("e1.php");

    function imprimirArray($array) {
        echo "[ ";
        foreach($array as $valor) {
            echo $valor." ";
        }
        echo "]";
    }

    $elementos = [4, 7, 4.5, "hola"];

    $pares = isPar($elementos);
    $impares = isImpar($elementos);

    imprimirArray($pares);

    echo "<br />";

    imprimirArray($impares);
?>