<?php

require_once('MostrarCalculos.php');
require_once('CalculosCentroEstudios.php');
require_once('NotasTrait.php');


$notas = new NotasTrait([6, 7, 4, 5, 9, 1, 8, 4, 6, 2]);

$notas->saludo();
$notas->showCalculusStudyCenter($notas->numeroAprobados(), $notas->numeroSuspensos(), $notas->notaMedia());
