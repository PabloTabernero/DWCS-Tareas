<?php
/*1. Escribe un programa que pase de grados Fahrenheit a Celsius. 
Para pasar de Fahrenheit a Celsius se resta 32 a la temperatura, 
se multiplica por 5 y se divide entre 9.*/

    echo "<p>Conversor de Fahrenheit a Celsius</p>";
    $fahrenheit = 80;
    $celsius = ($fahrenheit - 32) * 5 / 9;
    echo "Temperatura Fahrenheit = $fahrenheit<br />";
    echo "Temperatura Celsius = $celsius<br /><br />";

/*2. Crea un programa en PHP que declare e inicialice dos 
variables x e y con los valores 20 y 10 respectivamente y
muestre la suma, la resta, la multiplicación, 
la división y el módulo de ambas variables. */
/*(Optativo) Haz dos versiones de este ejercicios.
    - Guarda los resultados en nuevas variables.
    - Sin utilizar variables intermedias. */

    //Versión con nuevas variables:
    echo "<p>Operaciones aritmeticas con nuevas variables</p>";
    $x = 20;
    $y = 10;
    $suma = $x + $y;
    echo $x." + ".$y. " = ".$suma."<br />";
    $resta = $x - $y;
    echo $x." - ".$y. " = ".$resta."<br />";
    $multiplicacion = $x * $y;
    echo $x." * ".$y. " = ".$multiplicacion."<br />";
    $division = $x / $y;
    echo $x." / ".$y. " = ".$division."<br />";
    $modulo = $x % $y;
    echo $x." % ".$y. " = ".$modulo."<br />";

    //Versión sin utilizar variables intermedias:
    echo "<p>Operaciones aritmeticas sin variables intermedias</p>";
    $x = 20;
    $y = 10;
    echo $x." + ".$y. " = ".($x + $y)."<br />";
    echo $x." - ".$y. " = ".($x - $y)."<br />";
    echo $x." * ".$y. " = ".($x * $y)."<br />";
    echo $x." / ".$y. " = ".($x / $y)."<br />";
    echo $x." % ".$y. " = ".($x % $y)."<br />";


/*3. (Optativo) Escribe un programa que imprima por pantalla los cuadrados de los 
30 primeros números naturales.*/ 

    echo "<p>Imprimir el cuadrado de los 30 primeros números</p>";
    for ($i=1; $i < 31; $i++) { 
        echo "cuadrado de $i = ".($i * $i)."<br />";
    }

/*4. Hacer un programa php que calcule el área y el perímetro de un rectángulo
 (```área=base*altura``` y (```perímetro=2*base+2*altura```). Debéis declarar 
 las variables base=20 y altura=10. */
    
    echo "<p>Calcular area y perimetro de un rectangulo</p>";
    $base =  20;
    $altura = 10;
    $area = $base * $altura;
    $perimetro = (2 * $base) + (2 * $altura);
    echo "El area de un rectangulo de base $base y altura $altura es $area<br />";
    echo "El perimetro de un rectangulo base $base y altura $altura es $perimetro<br />"; 

?>