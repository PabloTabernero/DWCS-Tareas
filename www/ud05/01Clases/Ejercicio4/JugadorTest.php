<?php

require_once('Participante.php');
require_once('Jugador.php');

$jugador1 = new Jugador('Pablo', 40, 'Centrocampista');
$jugador2 = new Jugador('Pepe', 25, 'Delantero');

$jugadores = [$jugador1, $jugador2];

echo 'Datos iniciales de los jugadores: <br />';

foreach ($jugadores as $value) {
    echo 'Nombre: '.$value->getNombre().'<br />';
    echo 'Edad: '.$value->getEdad().'<br />';
    echo 'Posición: '.$value->getPosicion().'<br />';
    echo '<br />';
}

//Modificar datos de los jugadores
$jugador1->setNombre('Cristiano');
$jugador1->setPosicion('Delantero');
$jugador2->setNombre('Leo');
$jugador2->setEdad(42);

echo 'Datos modificados de los jugadores: <br />';

foreach ($jugadores as $value) {
    echo 'Nombre: '.$value->getNombre().'<br />';
    echo 'Edad: '.$value->getEdad().'<br />';
    echo 'Posición: '.$value->getPosicion().'<br />';
    echo '<br />';
}
