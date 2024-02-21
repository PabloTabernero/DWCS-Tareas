<?php

abstract class Figura {
    private $color;

    function setColor($color) {
        $this->color = $color;
    }

    function getColor() {
        return $this->color;
    }

    abstract function describe();
}

class Triangulo extends Figura {
    function describe() {
        echo "Son un triangulo de color ".$this->getColor()."<br />";
    }
}

class Rectangulo extends Figura {
    function describe() {
        echo "Son un rectangulo de color ".$this->getColor()."<br />";
    }
}

$triangulo = new Triangulo();
$triangulo->setColor('Verde');
echo $triangulo->describe(); // Mostra: "Son un triángulo de cor verde"

$rectangulo = new Rectangulo();
$rectangulo->setColor('Vermello');
echo $rectangulo->describe(); // Mostra: "Son un rectángulo de cor vermello"