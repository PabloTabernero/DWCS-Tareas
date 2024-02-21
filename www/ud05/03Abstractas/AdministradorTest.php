<?php   

require_once('Persona.php');
require_once('Administrador.php');

$administrador1 = new Administrador('1', 'Pablo', 'Perez');
$administrador2 = new Administrador('2', 'Luis', 'Gonzalez');

//Se muestran los datos de los administradores.
$administrador1->accion();
$administrador2->accion();

//Se prueban los setters.
$administrador1->setNombre('Paco');
$administrador1->setApellidos('Gil');
$administrador1->accion();