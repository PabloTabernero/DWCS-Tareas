<?php

class Alien {
    private $nombre;
    public static $numberOfAliens = 0;

    function __construct($nombre) {
        $this->nombre = $nombre;
        self::$numberOfAliens++;
    }

    function getNumberOfAliens() {
        return self::$numberOfAliens;
    }
}
