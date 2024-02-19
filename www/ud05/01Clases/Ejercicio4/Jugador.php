<?php

class Jugador extends Participante {
    private $posicion;

    //Constructor
    function __construct($nombre, $edad, $posicion) {
        parent::__construct($nombre, $edad);
        $this->posicion = $posicion;
    }

    //Getter
    function getPosicion() {
        return $this->posicion;
    }

    //Setter
    function setPosicion($posicion) {
        $this->posicion = $posicion;
    }


}