<?php

class Revista extends Documento {
    private $titulo;
    private $numeroPaginas;
    private $fechaPublicacion;

    function __construct($id, $formato, $titulo, $numeroPaginas, $fechaPublicacion) {
        parent::__construct($id, $formato);
        $this->titulo = $titulo;
        $this->numeroPaginas = $numeroPaginas;
        $this->fechaPublicacion = $fechaPublicacion;
    } 

    function mostrarDatos() {
        echo "Formato Documento: {$this->getFormato()} <br />";
        echo "Nombre Revista: {$this->titulo} <br />";
        echo "Numero Páginas: {$this->numeroPaginas} <br />";
        echo "Año Publicación: {$this->fechaPublicacion} <br />";
        echo "<br />";
    }

    function modificarFechaPublicacion($nuevaFecha) {
        $this->fechaPublicacion = $nuevaFecha;
    }


}