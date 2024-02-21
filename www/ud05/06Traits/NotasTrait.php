<?php

require_once(__DIR__.'/../05Interfaces/Notas.php');

class NotasTrait extends Notas {
    use CalculosCentroEstudios;
    use MostrarCalculos;

    function toString() {
        return implode(' ', $this->notas);
    }
}