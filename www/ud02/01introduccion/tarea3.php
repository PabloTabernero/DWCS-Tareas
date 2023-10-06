<?php

/**Busca en la documentación de PHP las funciones de [manejo de variables](http://www.php.net/manual/es/funcref.php)

Comprueba el resultado devuelto por los siguientes fragmentos de código y analiza el resultado:
*/
$a = "true"; // imprime el valor devuelto por is_bool($a)...
    echo 'is_bool($a) = '.is_bool($a)." --> No devuelve nada. is_bool($a) se evalua a falso puesto que $a es un string.<br />";

$c = "false"; // imprime el valor devuelto por gettype($c);
    echo 'gettype($c) = '.gettype($c)." --> Devuelve string puesto que el false de la asignación está entre comillas.<br />";
$d = ""; // el valor devuelto por empty($d);
    echo 'empty($d) = '.empty($d)." --> Devuelve 1 (true) puesto que el \"\" (cadena vacia) es considerado como vacio por la función.<br />";

$e = 0.0; // el valor devuelto por empty($e);
    echo 'empty($e) = '.empty($e)." --> Devuelve 1 (true) puesto que el 0.0 (0 float) es considerado como vacio por la función.<br />";

$f = 0; // el valor devuelto por empty($f);
    echo 'empty($f) = '.empty($f)." --> Devuelve 1 (true) puesto que el 0 (0 integer) es considerado como vacio por la función.<br />";

$g = false; // el valor devuelto por empty($g);
    echo 'empty($g) = '.empty($g)." --> Devuelve 1 (true) puesto que el false es considerado como vacio por la función.<br />";

$h; // el valor devuelto por empty($h);
    echo 'empty($h) = '.empty($h)." --> Devuelve 1 (true) puesto que la variable existe y no tiene valor.<br />";

$i = "0"; // el valor devuelto por empty($i);
    echo 'empty($i) = '.empty($i)." --> Devuelve 1 (true) puesto que el \"0\" (0 string) es considerado como vacio por la función.<br />";

$j = "0.0"; // el valor devuelto por empty($j);
    echo 'empty($j) = '.empty($j)." --> No devuelve nada (false) puesto que el valor \"0.0\" es considerado un valor no vacio por la función.<br />";

$k = true; // el valor devuelto por isset($k);
    echo 'isset($k) = '.isset($k)." --> Devuelve 1 (true) puesto que la variable existe y tiene un valor distinto de null.<br />";

$l = false; // el valor devuelto por isset($l);
    echo 'isset($l) = '.isset($l)." --> Devuelve 1 (true) puesto que la variable existe y tiene un valor distinto de null.<br />";

$m = true; // el valor devuelto por is_numeric($m);
    echo 'is_numeric($m) = '.is_numeric($m)." --> No devuelve nada (false) puesto que la variable no es un numero ni un string numerico.<br />";   

$n = ""; // el valor devuelto por is_numeric($n);
    echo 'is_numeric($n) = '.is_numeric($n)." --> No devuelve nada (false) puesto que la variable no es un numero ni un string numerico.<br />"; 
?>