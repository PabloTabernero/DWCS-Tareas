<?php 
/**
 * Crea unha función chamada `comprobar_nif()` que reciba un NIF e devolva:
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