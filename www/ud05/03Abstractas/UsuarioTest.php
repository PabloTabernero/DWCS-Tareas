<?php

require_once('Persona.php');
require_once('Usuario.php');

$usuario1 = new Usuario('1', 'Pablo', 'Tabernero');
$usuario2 = new Usuario('2', 'Pepe', 'Gil');

//Se muestran los datos de los usuarios.
$usuario1->accion();
$usuario2->accion();

//Se prueban los setters 
$usuario1->setNombre('Paco');
$usuario1->setApellidos('Fernandez');
$usuario1->accion();