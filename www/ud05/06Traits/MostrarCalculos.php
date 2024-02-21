<?php

trait MostrarCalculos {

    function saludo() {
        echo "Bienvenido al centro de cálculo <br />";
    }

    function showCalculusStudyCenter($aprobados, $suspensos, $media) {
        echo "El centro tiene un total de $aprobados aprobados y $suspensos suspensos, con una nota media total de $media.";
    }
}

