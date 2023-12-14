<?php

    function isPar($array) {
        $resultado = [];
        
        for ( $i= 0; $i < count($array); $i++) {
            if (is_int($array[$i]) && $array[$i] % 2 == 0) {
                array_push($resultado, "true");
            }else{
                array_push($resultado, "false");
            }
        } 
        return $resultado;
    }

    function isImpar($array) {
        $resultado = [];
        for ( $i= 0; $i < count($array); $i++) {
            if (!is_int($array[$i])) {
                array_push($resultado, "false");
            }elseif($array[$i] % 2 == 0) {
                array_push($resultado, "false");
            }else{
                array_push($resultado, "true");
            }
        } 
        return $resultado;
    }

?>