<?php

abstract class Persona
{
    private $id;
    protected $nombre;
    protected $apellidos;

    abstract function __construct($id, $nombre, $apellidos);

    function setId($id)
    {
        $this->id = $id;
    }

    function getId(): string
    {
        return $this->id;
    }

    abstract function setNombre($nombre);
    abstract function setApellidos($apellidos);


    abstract function getNombre(): string;
    abstract function getApellidos(): string;

    abstract function accion();
}
