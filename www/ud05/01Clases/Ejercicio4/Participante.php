<?php

class Participante {
    private $nombre;
    private $edad;

    //Construtor
    function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    //Getter
    function getNombre() {
        return $this->nombre;
    }
    
    function getEdad() {
        return $this->edad;
    }
        
    //Setters
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }
}