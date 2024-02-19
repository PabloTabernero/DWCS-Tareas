<?php

class Operario extends Empleado {
    private $turno;

    function __construct($nombre, $salario, $turno) {
        parent::__construct($nombre, $salario);
        $this->setTurno($turno);
    }

    //Setter para la propiedad turno, en caso de que el turno no sea valido se pasa a null.
    function setTurno($turno) {
        $this->turno = ($turno === "diurno" || $turno === "nocturno") ? $turno : null;
    }

    function getTurno() {
        return $this->turno;
    }

}







?>

