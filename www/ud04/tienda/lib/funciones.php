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

    //Funcion que devuelve la ruta de subida de los archivos en función de su tipo.
    function obtenerDestino ($tipo) {
        switch ($tipo) {
            case "application/pdf":
                return "uploads/pdf/";
                break;
            case "text/plain":
                return "uploads/texto/";
                break;
            case "image/jpeg" || "image/png" || "image/jpg" || "image/gif":
                return "uploads/imagen/";
                break;
            default:
                return "uploads/otros/";
                break;
        }
    }
?>