<?php

$rectangulo = new class(5, 3) {
    private $base;
    private $altura;

    function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    function area() {
        return ($this->base * $this->altura) / 2;
    }

    function perimetro() {
        return 2 * $this->base + 2 * $this->altura;
    }
    
};

echo "El area del rectangulo es: ".$rectangulo->area()."<br />";
echo "El perimetro del rectangulo es: ".$rectangulo->perimetro();
