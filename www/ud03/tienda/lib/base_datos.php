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
        nombre VARCHAR(50),
        apellidos VARCHAR(100),
        edad INT,
        provincia VARCHAR(50)
    )";

    $conexion->query($sql);
    $conexion->close();
}
    
//Función que da de alta a un usuario en la BD con la información del formulario.
function alta_usuario($nombre, $apellidos, $edad, $provincia) {

    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, edad, provincia) VALUES (?,?,?,?)");
    $stmt->bind_param("ssis", $nombre, $apellidos, $edad, $provincia);
    if ($stmt->execute()) {
        echo "Se ha creado un nuevo registro en la tabla usuarios.";
    } else {
        echo "No se ha podido crear el nuevo registro en la tabla usuarios.";
        registrar_log("No se pudo crear el registro. Error: " . $stmt->error);
    }

    $stmt->close();
    $conexion->close();     
}

//Funcion que lista los usuario de la base de datos.
function listar_usuarios() {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    
    //Consulta obtención dos usuarios (array)
    $sql = "SELECT id, nombre, apellidos, edad, provincia FROM usuarios";
    
    if(!$resultados = $conexion->query($sql)){
        registrar_log("Fallo al realizar la consulta a la base de datos. Error: ". $conexion->error);
    }
    
    //Si la consulta devuelve alguna linea, se crea un tabla para imprimir los resultados.
    //Se crean en cada linea los botones editar y borrar utilizando el id de la BD para formar la url.
    if ($resultados->num_rows > 0) {
        echo "<table class=\"m-4\"><tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Edad</th><th>Provincia</th></tr>";
        while($row = $resultados->fetch_assoc()){
            echo "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."</td><td>".$row["apellidos"]."</td><td>".$row["edad"]."</td><td>".$row["provincia"]."</td>
            <td><a class=\"btn btn-primary\" href=\"editar.php?id=".$row["id"]."\" role=\"button\"> Editar</a></td>
            <td><a class=\"btn btn-primary\" href=\"borrar.php?id=".$row["id"]."\" role=\"button\"> Borrar</a></td>
            </tr>";
        }
        echo "</table>";
    }else{
        echo "No hay resultados para mostrar.";
    }
}

//Función que recupera los datos del usuario por id de la base de datos y devuelve un array con todos los datos del usuario.
function recuperar_datos_usuario($id) {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);
    
    $stmt = $conexion->prepare("SELECT id, nombre, apellidos, edad, provincia FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
        echo "Datos de usuario recuperados correctamente.";

        $resultado = $stmt->get_result();
        $datos_usuario = $resultado->fetch_assoc();

        $stmt->close();
        $conexion->close();

        return $datos_usuario;

    }else{
        echo "No se han podido recuperar los datos del usuario.";
        registrar_log("No se han podido recuperar los datos del usuario de la base de datos. Error: ". $stmt->error);

        $stmt->close();
        $conexion->close();
    }
}

//Función que actualiza en la base de datos los datos de un usuario.
function actualizar_datos_usuario($id, $nombre, $apellidos, $edad, $provincia) {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $stmt = $conexion->prepare("UPDATE usuarios SET nombre=?, apellidos=?, edad=?, provincia=? WHERE id=?");
    $stmt->bind_param("ssisi", $nombre, $apellidos, $edad, $provincia, $id);

    if ($stmt->execute()) {
        echo "Se ha actualizado el registro en la tabla usuarios.";
    }else{
        echo "No se ha podido crear el nuevo registro en la tabla usuarios.";
        registrar_log("No se pudo actualizar el registro. Error: " . $stmt->error);
    }

    $stmt->close();
    $conexion->close();  
}

//Funcion que borra a un usuario de la base de datos.
function borrar_usuario($id) {
    $conexion = get_conexion();
    seleccionar_bd_tienda($conexion);

    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id=?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
        echo "Usuario eliminado correctamente.";
    }else{
        echo "Error eliminando usuario.";
        registrar_log("No se puede eliminar registro de la base de datos. Error: " . $conexion->error);
    }

    $conexion->close();
}