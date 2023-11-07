<?php
/**************************** */
/** MYSQL Orientado a Objetos */
/**************************** */
/*
//1. Crear la conexión
$conexion = new mysqli('db', 'root', 'test', 'myDB');

//2. Comprobar la conexión
if($conexion->connect_error) {
    die("Fallo en la conexión ".$conexion->connect_error);
}
echo "Conexión POO Correcta.<br />";
/*
//3. Crea base de datos
$sql = "CREATE DATABASE myDB";
if ($conexion->query($sql)) {
    echo "Base de datos creada correctamente.<br />";
}else{
    echo "Error creando la base de datos.".$conexion->error;
}
//Cambio la conexción de dbname a la BD recien creada myDB.
$conexion->select_db('myDB');
echo "Cambio de base de datos.";

//4. Crear una tabla
$sql = "CREATE TABLE clientes(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(30) NOT NULL,
        apellido VARCHAR(30) NOT NULL,
        email VARCHAR(50)
    )";
if ($conexion->query($sql)) {
    echo "Tabla creada correctamente.<br />";
}else{
    echo "Error creando la tabla.".$conexion->error;
}
//5. Insertar datos
$sql = "INSERT INTO clientes (nombre, apellido, email) 
    VALUES ('Pepe', 'Sobrino', 'sabela@iessanclemente.net');";
$sql .=  "INSERT INTO clientes (nombre, apellido, email) 
    VALUES ('Maria', 'Garcia', 'maria@iessanclemente.net');";
$sql .=  "INSERT INTO clientes (nombre, apellido, email) 
    VALUES ('Julia', 'Rode', 'julia@iessanclemente.net');";
if ($conexion->multi_query($sql)) {
    $ultimo_id = $conexion->insert_id;
    echo "Se ha creado un nuevo registro con el id $ultimo_id.";
}else{
    echo "No se pudo crear el registro. ".$conexion->error;
}

//6. Consultas Preparadas.
//6.1 Preparar la consulta.
$stmt = $conexion->prepare("INSERT INTO clientes (nombre, apellido, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $apellido, $email);

//6.2 Estableces parametros y ejecutar.
$nombre = "Alejandro";
$apellido = "Garcia";
$email = "alejandro@edu.com";
$stmt->execute();

$nombre = "Julian";
$apellido = "Garcia";
$email = "julian@edu.com";
$stmt->execute(); 

echo "Nuevos registros creados correctamente.";

$stmt->close();
//6. Cierre de la conexión.
$conexion->close();



/********************** */
/** MYSQL Procedimental */
/********************** */
/*
//1. Crear la conexión
$con = mysqli_connect('db', 'root', 'test', 'myDBProcedimental'); //Ya me conecto a la BD creada en el punto 3.

//2. Comprobar la conexión
if(!$con){
    die("Fallo en la conexión ".mysqli_connect_error());
}
echo "Conexión Procedimental Correcta.<br />";

//3. Crea base de datos
/* 
$sql = "CREATE DATABASE myDBProcedimental";
if(mysqli_query($con, $sql)) {
    echo "Base de datos Procedimental creada correctamente.<br />";
}else{
    echo "Error creando la base de datos procedimental.".mysqli_error($con);
}

//4. Crea una tabla
$sql = "CREATE TABLE clientes(
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50)
    )";

if(mysqli_query($con, $sql)){
    echo "Se creó la tabla correctamente.";
}else{
    echo "Error creando la tabla ".mysqli_error($con);
}

//5. Insertar datos.
$sql = "INSERT INTO clientes (nombre, apellido, email) 
VALUES ('Pepe', 'Sobrino', 'sabela@iessanclemente.net');";
$sql .= "INSERT INTO clientes (nombre, apellido, email) 
VALUES ('Julia', 'Sobrino', 'julia@iessanclemente.net');";
$sql .= "INSERT INTO clientes (nombre, apellido, email) 
VALUES ('Miguel', 'Sobrino', 'miguel@iessanclemente.net');";
if(mysqli_multi_query($con, $sql)) {
    $ultimo_id = mysqli_insert_id($con);
    echo "Se ha creado un nuevo registro con id: $ultimo_id";
}else{
    echo "No se pudo crear el registro. ".mysqli_error($con);
}

//6. Cierre de la conexión.
mysqli_close($con);



/****** */
/** PDO */
/****** */

$servername = "db";
$username = "root";
$password = "test";

try{
    //1. Conexión a BD
    $conPDO = new PDO("mysql:host=$servername;dbname=myDBPDO", $username, $password); //Nos conectamos a la BD creada en el punto 3.
    //2. Forzar excepción
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión PDO Correcta.";
    /*
    //3. Crear una base de datos
    //$sql = "CREATE DATABASE myDBPDO"; //Se comenta para que no de error al volver a crear la BD.
    $sql = "CREATE TABLE clientes(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(30) NOT NULL,
        apellido VARCHAR(30) NOT NULL,
        email VARCHAR(50)
        )";    
    $conPDO->exec($sql);
    echo "La tabla PDO creada correctamente.";
    
    //4. Insertar datos.

    $conPDO->beginTransaction();

    $sql = "INSERT INTO clientes (nombre, apellido, email) VALUES ('Pepe', 'Sobrino', 'sabela@iessanclemente.net');";
    $conPDO->exec($sql);

    $sql .= "INSERT INTO clientes (nombre, apellido, email) VALUES ('Julia', 'Sobrino', 'julia@iessanclemente.net');";
    $conPDO->exec($sql);

    $sql .= "INSERT INTO clientes (nombre, apellido, email) VALUES ('Miguel', 'Sobrino', 'miguel@iessanclemente.net');";
    $conPDO->exec($sql);
   
    $conPDO->commit();

    $ultimo_id = $conPDO->lastInsertId();
    echo "Se ha creado un nuevo registro con ID: $ultimo_id";
*/
    //5. Consulta Preparada
    //5.1 Preparar consulta
    $stmt = $conPDO->prepare("INSERT INTO clientes (nombre, apellido, email) VALUES (:nombre, :apellido, :email)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':email', $email);

    //5.2 Establecer parametros y ejecutar.
    $nombre = "Alejandro";
    $apellido = "Garcia";
    $email = "alejandro@edu.com";
    $stmt->execute();

    $nombre = "Julian";
    $apellido = "Garcia";
    $email = "julian@edu.com";
    $stmt->execute(); 

    echo "Nuevos registros creados correctamente.";


}catch(PDOException $e){

    echo "Fallo en conexión: ".$e->getMessage();
}


//4. Cierre de la conexión.
$conPDO = null;

?>