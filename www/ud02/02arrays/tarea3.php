<?php 

/*
1. Crea una matriz con 30 posiciones y que contenga números aleatorios entre 0 y 20 (inclusive).
Uso de la función [rand](https://www.php.net/manual/es/function.rand.php). 
Imprima la matriz creada anteriormente.
*/ 
for ($i=0; $i < 30; $i++) { 
    $aleatorios[$i] = rand (0, 20);
}
echo "<h4>Imprimir matriz aleatoria</h4>";
echo "<pre>";
print_r($aleatorios);
echo "</pre>";

/* 
2. (Optativo) Cree una matriz con los siguientes datos: 
`Batman`, `Superman`, `Krusty`, `Bob`, `Mel` y `Barney`.
    - Elimine la última posición de la matriz. 
    - Imprima la posición donde se encuentra la cadena 'Superman'. 
    - Agregue los siguientes elementos al final de la matriz: `Carl`, `Lenny`, `Burns` y `Lisa`. 
    - Ordene los elementos de la matriz e imprima la matriz ordenada. 
    - Agregue los siguientes elementos al comienzo de la matriz: `Apple`, `Melon`, `Watermelon`.
*/
$protagonistas = ["Batman", "Superman", "Krusty", "Bob", "Mel", "Barney"];

unset($protagonistas[count($protagonistas) - 1]);

echo "<h4>La posición de \"superman\" es: ".array_search("Superman", $protagonistas)."</h4>";

array_push($protagonistas, "Carl", "Lenny", "Burns", "Lisa");

sort($protagonistas);
echo "<h4>Matriz ordenada</h4>";
echo "<pre>";
print_r($protagonistas);
echo "</pre>";

array_unshift($protagonistas, "Apple", "Melon", "Watermelon");



/*3. (Optativo) Cree una copia de la matriz con el nombre `copia` con elementos del 3 al 5.
    - Agregue el elemento 'Pera' al final de la matriz. */ 
$copia = array_slice($protagonistas, 3, 3);
array_push($copia, "Pera");


?>