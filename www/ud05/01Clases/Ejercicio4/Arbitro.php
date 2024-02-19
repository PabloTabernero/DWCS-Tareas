<?php

class Arbitro extends Participante {
    private $tiempoArbitrando;

    //Constructor
    function __construct($nombre, $edad, $tiempoArbitrando) {
        parent::__construct($nombre, $edad);
        $this->tiempoArbitrando = $tiempoArbitrando;
    }

    //Getter
    function getTiempoArbitrando() {
            return $this->tiempoArbitrando;
        }
    
    //Setter
    function setTiempoArbitrando($tiempoArbitrando) {
            $this->tiempoArbitrando = $tiempoArbitrando;
        }
}