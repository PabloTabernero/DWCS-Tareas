<?php

//Funcion que comprueba la extension del fichero.
function compruebaExtension ($fichero) {
    $imageFileType = strtolower(pathinfo($fichero,PATHINFO_EXTENSION));
    return ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg" || $imageFileType == "gif" );
}

//Funcion para comprobar el tamaño del fichero. Devuelve true si es menor de 50MB
function comprobaTamanho ($fichero) {
    return $fichero["size"] < 50000000;
}



?>