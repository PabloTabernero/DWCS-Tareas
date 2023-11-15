<?php
include("lib/utilidades.php");

//Función que realiza la conexión a la BD y devuelve el objeto conexion.
function get_conexion(){
    $conexion = new mysqli('db', 'root', 'test');
    $error = $conexion->connect_errno;
    if ($error != null) {
        registrar_log("Error de conexión a la base de datos: " . $conexion->connect_error);
        die("No se ha podido establecer la conexión con la Base de Datos, intentelo más tarde.");
    }
    return $conexion;
}

//Función que selecciona la bd tienda, deveulve la conexión.
function seleccionar_bd_tienda($conexion){
    $conexion->select_db("tienda");
    return $conexion;
};

//Funcion que crea la base de datos tienda si no existe.
function crear_bd_tienda(){
    $conexion = get_conexion();
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    $conexion->query($sql);
    $conexion->close();
}

//Función que crea la tabla de usuarios si no existe.
function crear_tabla_usuarios(){
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $sql ="CREATE TABLE IF NOT EXISTS usuarios(
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50),
        apellidos VARCHAR(100),
        edad INT,
        provincia VARCHAR(50)
    )";

    $conexion->query($sql);
    $conexion->close();
}
    
    
