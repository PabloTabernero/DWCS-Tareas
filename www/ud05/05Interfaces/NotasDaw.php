<?php

class NotasDaw extends Notas implements CalculosCentrosEstudios {

    function numeroAprobados() {
        return count(array_filter($this->notas, fn($valor) => $valor >= 5));
    }

    function numeroSuspensos() {
        return count(array_filter($this->notas, fn($valor) => $valor < 5));
    }

    function notaMedia() {
        return array_sum($this->notas) / count($this->notas);
    }

    function toString() {
        return implode(' ', $this->notas);
    }
}