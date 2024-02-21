<?php

require_once('Documento.php');

class Libro extends Documento {
    private $titulo;
    private $nombreAutor;
    private $numeroPaginas;
    private $fechaPublicacion;

    function __construct($id, $formato, $titulo, $nombreAutor, $numeroPaginas, $fechaPublicacion) {
        parent::__construct($id, $formato);
        $this->titulo = $titulo;
        $this->nombreAutor = $nombreAutor;
        $this->numeroPaginas = $numeroPaginas;
        $this->fechaPublicacion = $fechaPublicacion;
    } 

    function mostrarDatos() {
        echo "Formato Documento: {$this->getFormato()} <br />";
        echo "Titulo: {$this->titulo} <br />";
        echo "Autor: {$this->nombreAutor} <br />";
        echo "Numero Páginas: {$this->numeroPaginas} <br />";
        echo "Año Publicación: {$this->fechaPublicacion} <br />";
        echo "<br />";
    }

    function modificarFechaPublicacion($nuevaFecha) {
        $this->fechaPublicacion = $nuevaFecha;
    }


}



