<?php

require_once('Participante.php');
require_once('Arbitro.php');

$arbitro1 = new Arbitro('Pablo', 40, 10);
$arbitro2 = new Arbitro('Pepe', 25, 5);

$arbitros = [$arbitro1, $arbitro2];

echo 'Datos iniciales de los arbitros: <br />';

foreach ($arbitros as $value) {
    echo 'Nombre: '.$value->getNombre().'<br />';
    echo 'Edad: '.$value->getEdad().'<br />';
    echo 'Años Arbitrando: '.$value->getTiempoArbitrando().'<br />';
    echo '<br />';
}

//Modificar datos de los arbitroes
$arbitro1->setNombre('Iturralde');
$arbitro1->setTiempoArbitrando(15);
$arbitro2->setNombre('Marcos');
$arbitro2->setEdad(42);

echo 'Datos modificados de los arbitros: <br />';

foreach ($arbitros as $value) {
    echo 'Nombre: '.$value->getNombre().'<br />';
    echo 'Edad: '.$value->getEdad().'<br />';
    echo 'Años Arbitrando: '.$value->getTiempoArbitrando().'<br />';
    echo '<br />';
}