<?php

class Empleado {

    //PROPIEDADES
    public $nombre;
    public $salario;
    public static $numEmpleados = 0;

    //CONSTRUCTOR - Aumenta en 1 $numEmpleados cada vez que se crea un empleado.
    function __construct($nombre, $salario) {
        $this->nombre = $nombre;
        $this->salario = $salario > 2000 ? 2000 : $salario;
        self::$numEmpleados++;
    }

    //MÉTODOS
    public function setNombre($nombre) {
        $this->nombre=$nombre;  
    }
    public function getNombre(){
        return $this->nombre;
    }

    //Getter para salario.
    public function getSalario() {
        return $this->salario;
    }

}
