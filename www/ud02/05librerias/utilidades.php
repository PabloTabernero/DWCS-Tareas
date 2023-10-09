<?php 

/**Diferencias entre `include`, `include_once`, `require` y `require_once`:
 * 
 * Include: Incluye e interpreta el contenido del fichero en el script php, si no se encuentra el archivo o hay algún error en la inclusión se mostrará una advertencia
 *          pero se seguirá ejecutando el script.
 * Require: La diferencía con Include es que si no se encuentra el archivo o hay algún error en la inclusión se mostrará un error fatal y se detendrá la ejecución del 
 *          script.
 * Include_once: Funciona de manera similar a Include, pero garantiza que el archivo se incluirá solo una vez en el script.
 * 
 * Require_once: Funciona de manera similar a Require, pero garantiza que el archivo se incluirá solo una vez en el script.
 * 
 * 
 */

//Función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
    function es_digito(string $caracter) {
        if ($caracter >= 0 && $caracter <= 9) {
            echo "El caracter introducido es un digito entre 0 y 9<br />";
        } else {
            echo "El caracter introducido NO es un digito entre 0 y 9<br />";
        }
    }

//Función que reciba un string e devolva a súa lonxitude.
    function longitud(string $cadena): int {
        $i = 0;
        while (isset($cadena[$i])) {
            $i++;
        }
        return $i;
    }

//Función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
    function elevar(int $a, int $b): int {
        $n = 1;
        for ($i=0; $i < $b; $i++) { 
            $n *= $a;
        }
        return $n;
    }
//Función que reciba un carácter e devolva `true` se o carácter é unha vogal.
    function es_vocal(string $caracter): bool {
        if ($caracter == "a" || $caracter == "e" || $caracter == "i" || $caracter == "o" || $caracter == "u") {
            return true;
        } 
    }
//Función que reciba un número e devolva se o número é par ou impar.
    function es_par(int $numero): string {
        return ($numero % 2 == 0) ? "Par" : "Impar";
    } 
//Función que reciba un string e devolva o string en maiúsculas.
    function mayusculas(string $string): string {
        return strtoupper($string);
    }

//Función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
    function imprimir_zona_horaria() {
        echo date_default_timezone_get ();
    }
/*Función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
    function imprimir_amanecer_anochecer() {
        date_default_timezone_set('Europe/Madrid'); 
        $latitud = 42.431;
        $longitud = -8.64435;
        $info = date_sun_info(time(),$latitud, $longitud);
        echo "La hora del amanecer en Pontevedra es: ".date('H:i',$info["sunrise"])."<br />";
        echo "La hora del anochecer en Pontevedra es: ".date('H:i',$info["sunset"])."<br />";
    }

/**
 * Función chamada `comprobar_nif()` que reciba un NIF e devolva:
 *  `true` se o NIF é correcto.
 *  false` se o NIF non é correcto.
 * A letra do DNI é unha letra para comprobar que o número introducido anteriormente é correcto. 
 * Para obter a letra do DNI débense levar a cabo os seguintes pasos:
 * Dividimos o número entre 23.
 * Co resto da división anterior, obtemos a letra corresponde na seguinte táboa: 
 */

 function comprobar_nif(string $dni): bool {
    $tablaDNI = array('T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E');
    
    if (strlen($dni) != 9) {
        return false;
    } else {
        $numero = substr($dni, 0, 8);
        $letra = substr($dni,8, 1);
        $resto = $numero % 23;
        return $letra == $tablaDNI[$resto];
    }
}

?>