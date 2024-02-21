<?php

class DVD extends Documento {
    private $titulo;
    private $numeroUnidades;
    private $formatoDVD;
    private $fechaPublicacion;

    function __construct($id, $formato, $numeroUnidades, $titulo, $formatoDVD, $fechaPublicacion) {
        parent::__construct($id, $formato);
        $this->titulo = $titulo;
        $this->numeroUnidades = $numeroUnidades;
        $this->formatoDVD = $formatoDVD;
        $this->fechaPublicacion = $fechaPublicacion;
    } 

    function mostrarDatos() {
        echo "Formato Documento: {$this->getFormato()} <br />";
        echo "Título: {$this->titulo} <br />";
        echo "Numero Unidades: {$this->numeroUnidades} <br />";
        echo "Formato DVD: {$this->formatoDVD} <br />";
        echo "Año Publicación: {$this->fechaPublicacion} <br />";
        echo "<br />";
    }

    function modificarFechaPublicacion($nuevaFecha) {
        $this->fechaPublicacion = $nuevaFecha;
    }

}