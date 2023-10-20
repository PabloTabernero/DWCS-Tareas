<?php 

// 1. Crea una función que reciba un carácter e imprima se o carácter é un díxito entre 0 e 9.
    function es_digito(string $caracter) {
        if ($caracter >= 0 && $caracter <= 9) {
            echo "El caracter introducido es un digito entre 0 y 9<br />";
        } else {
            echo "El caracter introducido NO es un digito entre 0 y 9<br />";
        }
    }

// 2. Crea una función que reciba un string e devolva a súa lonxitude.
    function longitud(string $cadena): int {
        $i = 0;
        while (isset($cadena[$i])) {
            $i++;
        }
        return $i;
    }

// 3. Crea una función que reciba dous número `a` e `b` e devolva o número `a` elevado a `b`.
    function elevar(int $a, int $b): int {
        $n = 1;
        for ($i=0; $i < $b; $i++) { 
            $n *= $a;
        }
        return $n;
    }
// 4. Crea una función que reciba un carácter e devolva `true` se o carácter é unha vogal.
    function es_vocal(string $caracter): bool {
        if ($caracter == "a" || $caracter == "e" || $caracter == "i" || $caracter == "o" || $caracter == "u") {
            return true;
        } 
    }
// 5. Crea una función que reciba un número e devolva se o número é par ou impar.
    function es_par(int $numero): string {
        return ($numero % 2 == 0) ? "Par" : "Impar";
    } 
// 6. Crea una función que reciba un string e devolva o string en maiúsculas.
    function mayusculas(string $string): string {
        return strtoupper($string);
    }

// 7. Crea una función que imprima a zona horaria (*timezone*) por defecto utilizada en PHP.
    function imprimir_zona_horaria() {
        echo date_default_timezone_get ();
    }
/* 8. Crea una función que imprima a hora á que sae e se pon o sol para a 
localización por defecto. Debes comprobar como axustar as coordenadas (latitude e lonxitude)
 predeterminadas do teu servidor.
*/
    //Entiendo que lo que se pide es modificar las coordenadas por defecto por la de mi zona.
    function imprimir_amanecer_anochecer() {
        date_default_timezone_set('Europe/Madrid'); 
        ini_set("date.default_latitude", 42.431);
        ini_set("date.default_longitude", -8.64435);
        $info = date_sun_info(time(),ini_get('date.default_latitude'), ini_get('date.default_longitude'));
        echo "La hora del amanecer en Pontevedra es: ".date('H:i',$info["sunrise"])."<br />";
        echo "La hora del anochecer en Pontevedra es: ".date('H:i',$info["sunset"])."<br />";
    }

?>