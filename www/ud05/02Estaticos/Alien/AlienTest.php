<?php

require_once('Alien.php');

//Se crean 5 aliens
for ($i=1; $i < 6; $i++) { 
    $alien = new Alien("Alien$i");
}

echo "El numero de Aliens creados es: ".$alien->getNumberOfAliens();