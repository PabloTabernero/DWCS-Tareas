<?php
function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
}

// Función para registrar mensajes de error en un archivo de logs.
function registrar_log($mensaje){
    $archivo_log = 'error_log.txt';
    $fecha_hora = date('Y-m-d H:i:s');
    $mensaje_formato = "[$fecha_hora] $mensaje\n";
    error_log($mensaje_formato, 3, $archivo_log);
}
?>