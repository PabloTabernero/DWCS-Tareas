<?php

require_once('Persona.php');

class Usuario extends Persona {

    function __construct($id, $nombre, $apellidos) {
        parent::setId($id);
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function getNombre(): string {
        return $this->nombre;
    }

    function getApellidos(): string {
        return $this->apellidos;
    }

    function accion() {
        echo self::getNombre()." ".self::getApellidos()." es un Usuario <br />";
    }

}