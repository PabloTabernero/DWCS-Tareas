<?php

require_once('Notas.php');
require_once('CalculosCentrosEstudios.php');
require_once('NotasDaw.php');

$notasDaw = new NotasDaw([6, 7, 4, 5, 9, 1, 8, 4, 6, 2]);

echo "Las notas son: ".$notasDaw->toString()."<br />";
echo "Aprobados: ".$notasDaw->numeroAprobados()."<br />";
echo "Suspensos: ".$notasDaw->numeroSuspensos()."<br />";
echo "Nota media: ".$notasDaw->notaMedia()."<br />";