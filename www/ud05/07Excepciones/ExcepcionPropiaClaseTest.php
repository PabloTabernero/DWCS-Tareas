<?php

require_once('ExcepcionPropiaClase.php');
require_once('ExcepcionPropia.php');

try{
    ExcepcionPropiaClase::testNumber(3);
    ExcepcionPropiaClase::testNumber(100);
    ExcepcionPropiaClase::testNumber(0);
} catch (ExcepcionPropia $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}