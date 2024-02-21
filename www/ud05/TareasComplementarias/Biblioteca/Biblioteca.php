<?php

require_once('Documento.php');
require_once('Libro.php');
require_once('Revista.php');
require_once('DVD.php');

class Biblioteca {
    private $nombre;
    private $direccion;
    private $telefono;
    private $documentos;
    public static $contadorBibliotecas = 0;

    function __construct($nombre, $direccion, $telefono) {
        $this->nombre =  $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->documentos = [];
        self::$contadorBibliotecas++;
    }
    
    //Getters
    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getDocumentos() {
        return $this->documentos;
    }

    //Setters
    function setNombre($nombre) {
        $this->nombre =  $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setDocumentos($documento) {
        array_push($this->documentos, $documento);
    }
    
    //Metodos

    function registrarDocumento($documento) {
        $formato = $documento->getFormato();

        if ($formato === 'libro' || $formato === 'revista' || $formato === 'dvd') {
            $this->setDocumentos($documento);
            echo "Domumento con id {$documento->getId()} registrado con exito. <br />";
        } else {
            echo "El formato $formato no es correcto. Los formatos validos son: libro, revista o DVD. <br />";
        }
    }

    function listarDocumentos($formato = "*") {
        foreach ($this->documentos as $documento) {
            if ($formato === "*" || $documento->getFormato() === $formato) {
                $documento->mostrarDatos();
            }
        }
    }

    function borrarDocumento($id) {

        foreach ($this->documentos as $clave => $documento) {
            if ($documento->getId() === $id) {
                unset($this->documentos[$clave]);
                return;
            } 
        }

        echo "El $id no se encuentra.";
    }

    function mostrarInfoBiblioteca() {
        echo "Biblioteca: {$this->nombre} <br />";
        echo "Direccion: {$this->direccion} <br />";
        echo "Telefono: {$this->telefono} <br />";
        echo "<br />";
    }

    public static function numeroBibliotecas() {
        echo "El número de bibliotecas creadas es: ".self::$contadorBibliotecas."<br />";
    }

}