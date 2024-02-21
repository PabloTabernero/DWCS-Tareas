<?php

abstract class Documento {
    protected $id;
    protected $formato;

    function __construct($id, $formato) {
        $this->id = $id;
        $this->formato = $formato;
    }   

    abstract function mostrarDatos();
    abstract function modificarFechaPublicacion($nuevaFecha);

    //Getter
    function getId() {
        return $this->id;
    }

    public function getFormato() {
        return $this->formato;
    }
}