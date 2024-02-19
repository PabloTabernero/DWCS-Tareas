<?php

require_once('Empleado.php');

//Se crean 2 empleados con salarios menor y mayor a 2000.
$empleado1 = new Empleado('Pablo', 1500);
$empleado2 = new Empleado('Pepe', 2500);

$empleados = [$empleado1, $empleado2];

//Se muestran los datos de los empleados.
foreach ($empleados as $value) {
    echo 'Nombre: '.$value->getNombre().'<br />';
    echo 'Salario: '.$value->getSalario().'<br />';
    echo '<br />';
}

echo 'El numero de empleados es '.Empleado::$numEmpleados;
