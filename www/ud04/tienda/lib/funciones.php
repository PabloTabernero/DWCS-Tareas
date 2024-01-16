<?php
    define("TAMANHO_MAXIMO", 50000000);

    //Funcion que comprueba la extension del fichero.
    function compruebaExtension ($imagen) {
        $extensionImagen = strtolower(pathinfo($imagen,PATHINFO_EXTENSION));
        return ($extensionImagen == "jpg" || $extensionImagen == "png" || $extensionImagen == "jpeg" || $extensionImagen == "gif" );
    }

    //Funcion para comprobar el tamaño del fichero. Devuelve true si es menor de 50MB
    function comprobaTamanho ($tamanho) {
        return $tamanho < TAMANHO_MAXIMO;
    }

?>