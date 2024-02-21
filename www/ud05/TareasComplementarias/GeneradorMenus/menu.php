<?php

/**
 * Clase que genera Menus horizontales o verticales.
 * @author Pablo Taberero
 * @version 1.0
 */
class Menu {
    private $tipo;
    private $opciones = [];

    function __construct($tipo) {
        $this->tipo = $tipo;
        $this->opciones = [];
    }

    function insertar($opcion) {
        array_push($this->opciones, $opcion);
    }

    function debuxar() {

        foreach ($this->opciones as $opcion) {
            $opcion->generarAncla();
            echo $this->tipo === 'vertical' ? "<br />" : " ";
        }
    }

}

/**
 * Clase que almacena los datos de cada opción del menú y genera cada enlace.
 * @author Pablo Tabernero
 * @version 1.0
 */

class Opcion {
    private $titulo;
    private $enlace;
    private $colorFondo;

    function __construct($titulo, $enlace, $colorFondo) {
        $this->titulo = $titulo;
        $this->enlace = $enlace;
        $this->colorFondo = $colorFondo;
    }

    function generarAncla() {
        echo "<a style=\"background-color:{$this->colorFondo};\" href=\"{$this->enlace}\">{$this->titulo}</a>";
    }

}