<?php

//Función que realiza la conexión a la BD y devuelve el objeto conexion.
function get_conexion(){
    $conexion = new mysqli('db', 'root', 'test');
    $error = $conexion->connect_errno;
    if ($error != null) {
        die("Fallo en la conexión: ".$conexion->connect_error." con numero ".$error."<br />");
    }
    return $conexion;
}

//Función que selecciona la bd tienda, deveulve true o false.
function seleccionar_bd_tienda($conexion){
    return $conexion->select_db("tienda");
};

function crear_bd_tienda($conexion){
    $sql = "CREATE DATABASE tienda";
    return $conexion->query($sql);
}

//Función que comprueba si existe la tabla de usuarios, devuelve true o false.
function comprobar_tabla_usuarios($conexion){
    $sql = "SHOW TABLES LIKE 'usuarios'";
    $result = $conexion->query($sql);
    return $result->num_rows > 0;
}

//Función que crea la tabla de usuarios.
function crear_tabla_usuarios($conexion){
    $sql ="CREATE TABLE usuarios(
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50),
        apellidos VARCHAR(100),
        edad INT,
        provincia VARCHAR(50)
    )";

    return $conexion->query($sql);
}
    
    
