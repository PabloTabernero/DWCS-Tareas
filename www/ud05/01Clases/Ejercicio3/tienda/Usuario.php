<?php

class Usuario {
    private $nombre;
    private $apellidos;
    private $edad;
    private $provincia;
    private $pass;

    //Constructor
    function __construct($nombre, $apellidos, $edad, $provincia, $pass) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->provincia = $provincia;
        $this->pass = $pass;
    }

    //Getters
    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEdad()  {
        return $this->edad;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getPass() {
        return $this->pass;
    }

    //Setters
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }
}
