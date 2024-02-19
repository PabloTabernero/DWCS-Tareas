<?php

class Contacto {
    private $nombre;
    private $apellido;
    private $telefono;

    function __construct($nombre, $apellido, $telefono) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
    }

    //Getters
    function get_nombre() {
        return $this->nombre;
    }

    function get_apellido() {
        return $this->apellido;
    }

    function get_telefono() {
        return $this->telefono;
    }

    //Setters
    function set_nombre($nombre) {
        $this->nombre = $nombre;
    }

    function set_apellido($apellido) {
        $this->apellido = $apellido;
    }

    function set_telefono($telefono) {
        $this->telefono = $telefono;
    }

    //Funcion que muestra la información de contacto.
    function muestraInformacion() {
        echo "nombre: ".$this->nombre."<br />";
        echo "apellido: ".$this->apellido."<br />";
        echo "telefono: ".$this->telefono."<br />";
    }

    //Destructor
    function __destruct() {
        echo "Se destruye el objeto ".$this->nombre."<br />";
    }
}

?>