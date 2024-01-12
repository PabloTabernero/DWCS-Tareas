<?php

function get_conexion()
{
    $conexion = new mysqli('db', 'root', 'test');
  
    if ($conexion->connect_errno != null) {
        die("Fallo en la conexión: " . $conexion->connect_error . "Con numero" . $conexion->connect_errno);
    }
    
    return $conexion;
}

function seleccionar_bd_tienda($conexion)
{
    return $conexion->select_db("tienda");
}

function ejecutar_consulta($conexion, $sql)
{
    $resultado = $conexion->query($sql);

    if ($resultado == false) {
        die($conexion->error);
    }

    return $resultado;
}

function crear_bd_tienda($conexion)
{
    $sql = "CREATE DATABASE IF NOT EXISTS tienda";
    ejecutar_consulta($conexion, $sql);
}

function crear_tabla_usuarios($conexion)
{

    $sql = "CREATE TABLE IF NOT EXISTS usuarios(
          id INT(6) AUTO_INCREMENT PRIMARY KEY , 
          nombre VARCHAR(50) NOT NULL , 
          password VARCHAR(255) NOT NULL ,
          apellidos VARCHAR(100) NOT NULL ,
          edad INT (3) NOT NULL ,
          provincia VARCHAR(50) NOT NULL)";

    ejecutar_consulta($conexion, $sql);
}

function listar_usuarios($conexion)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}
 
function get_usuario($conexion, $id)
{
    $sql = "SELECT id, nombre, apellidos,edad, provincia
            FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}

function editar_usuario($conexion, $id, $nombre, $apellidos, $edad, $provincia)
{
    $sql = "UPDATE usuarios
            SET nombre='$nombre' ,apellidos='$apellidos' ,edad='$edad',provincia='$provincia'
            WHERE id=$id;";

    $resultado = ejecutar_consulta($conexion, $sql);
    return $resultado;
}


function dar_alta_usuario($conexion, $nombre, $apellidos, $edad, $provincia, $pass)
{
    $sql = $conexion->prepare("INSERT INTO usuarios (nombre,apellidos,edad,provincia,password) VALUES (?,?,?,?,?)");
    $sql->bind_param("sssss", $nombre, $apellidos, $edad, $provincia, $pass);
    return $sql->execute() or die($conexion->error);
}

function borrar_usuario($conexion, $id)
{
    $sql = "DELETE FROM usuarios
            WHERE id=$id";

    $resultado = ejecutar_consulta($conexion, $sql);
}

function cerrar_conexion($conexion)
{
    $conexion->close();
}

function comprobar_usuario($conexion, $usuario) {

    $sql = $conexion->prepare("SELECT nombre, password FROM usuarios WHERE nombre = ?");
    $sql->bind_param("s", $usuario);
    $resultado = $sql->execute();

    if(!$resultado) {
        return false;
    } else {
        $datos = $sql->get_result();

        return ($datos->num_rows > 0) ? $datos : false;
    }
}

