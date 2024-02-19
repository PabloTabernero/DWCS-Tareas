<?php

require_once('Empleado.php');
require_once('Operario.php');

$operario1 = new Operario('Pablo', 1500, 'diurno');
$operario2 = new Operario('Pepe',  2500, 'nocturno');
$operario3 = new Operario('Pedro', 1800, 'rotatorio');

$operarios = [$operario1, $operario2, $operario3];

foreach ($operarios as $value) {
    echo 'Nombre: '.$value->getNombre().'<br />';
    echo 'Salario: '.$value->getSalario().'<br />';
    echo 'Turno: '.$value->getTurno().'<br />';
    echo '<br />';
}

echo 'El numero de empleados es: '.Empleado::$numEmpleados;