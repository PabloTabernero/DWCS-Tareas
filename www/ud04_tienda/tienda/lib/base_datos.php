<?php

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
function crear_tabla_usuarios() { 
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $sql ="CREATE TABLE IF NOT EXISTS usuarios(
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL UNIQUE,
        apellidos VARCHAR(100) NOT NULL,
        password VARCHAR(255) NOT NULL ,
        edad INT NOT NULL,
        provincia VARCHAR(50) NOT NULL
    )";

    $conexion->query($sql);
    $conexion->close();
}

//Función que crea la tabla de productos si no existe.
function crear_tabla_productos() { 
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $sql ="CREATE TABLE IF NOT EXISTS productos(
        id INT AUTO_INCREMENT PRIMARY KEY, 
        nombre VARCHAR(50) NOT NULL,
        descripcion VARCHAR(100) NOT NULL,
        precio FLOAT NOT NULL ,
        unidades FLOAT NOT NULL,
        foto BLOB
    )";

    $conexion->query($sql);
    $conexion->close();
}
    
//Función que da de alta a un usuario en la BD con la información del formulario.
function alta_usuario($nombre, $apellidos, $edad, $provincia, $pass) {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, password, edad, provincia) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssis", $nombre, $apellidos, $pass, $edad, $provincia);
    
    $resultado = $stmt->execute();

    if (!$resultado) {
        registrar_log("No se pudo crear el registro. Error: " . $stmt->error);
    }

    $stmt->close();
    $conexion->close(); 

    return $resultado;        
}

//Funcion que obtiene los datos de los usuarios.
//Devuelve false en caso de error en la consulta
function listar_usuarios() {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    
    //Consulta obtención dos usuarios (array)
    $sql = "SELECT id, nombre, apellidos, edad, provincia FROM usuarios";
    
    if(!$resultados = $conexion->query($sql)){
        registrar_log("Fallo al realizar la consulta a la base de datos. Error: ". $conexion->error);
    }
    $conexion->close();
    return $resultados;
}

//Función que recupera los datos del usuario por id de la base de datos.
//Devuelve un array con todos los datos del usuario.
function recuperar_datos_usuario($id) {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    
    $stmt = $conexion->prepare("SELECT id, nombre, apellidos, edad, provincia FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id);

    $resultado = $stmt->execute();

    if(!$resultado) {
        registrar_log("No se han podido recuperar los datos del usuario de la base de datos. Error: ". $stmt->error);
    }else{
        $resultado = $stmt->get_result();
        $resultado = $resultado->fetch_assoc();
    }

    $stmt->close();
    $conexion->close();
    return $resultado;
}

//Función que actualiza en la base de datos los datos de un usuario.
//Devuelve true si se han podido actualizar los datos.
function actualizar_datos_usuario($id, $nombre, $apellidos, $edad, $provincia) {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $stmt = $conexion->prepare("UPDATE usuarios SET nombre=?, apellidos=?, edad=?, provincia=? WHERE id=?");
    $stmt->bind_param("ssisi", $nombre, $apellidos, $edad, $provincia, $id);
    $resultado = $stmt->execute();

    $stmt->close();
    $conexion->close();  

    if(!$resultado) {
        registrar_log("No se pudo actualizar el registro. Error: " . $stmt->error);
    }
    
    return $resultado;
}

//Funcion que borra a un usuario de la base de datos.
//Devuelve true si la acción se ha podido realizar.
function borrar_usuario($id) {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id);
    $resultado = $stmt->execute();
    $filas_afectadas = $stmt->affected_rows;
    
    if($filas_afectadas == 0 || !$resultado) {
        registrar_log("No se puede eliminar registro de la base de datos. Error: " . $conexion->error);
        $resultado = false;
    }

    $stmt->close();
    $conexion->close(); 

    return $resultado;
}


function comprobar_usuario($usuario) {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $stmt = $conexion->prepare("SELECT nombre, password FROM usuarios WHERE nombre = ?");
    $stmt->bind_param("s", $usuario);
    $resultado = $stmt->execute();

    if(!$resultado) {
        $stmt->close();
        $conexion->close(); 
        return false;
    }

    $datos = $stmt->get_result();
    $stmt->close();
    $conexion->close(); 

    return ($datos->num_rows > 0) ? $datos : false;
}