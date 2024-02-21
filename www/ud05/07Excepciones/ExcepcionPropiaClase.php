<?php

class ExcepcionPropiaClase {

    static function testNumber($numero) {
        if ($numero === 0) {
            throw new ExcepcionPropia("El $numero no es un número valido. <br />"); 
        } else {
            echo ("El $numero es un numero correcto <br />");
        }
    }
}