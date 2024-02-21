<?php

abstract class Notas {
    protected $notas;

    function __construct($notas) {
        $this->notas = $notas;
    }

    abstract function toString();
}