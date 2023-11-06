<?php

/** MYSQL Orientado a Objetos */
//1. Crear la conexión
$conexion = new mysqli('db', 'root', 'test', 'dbname');
//2. Comprobar la conexión
if($conexion->connect_error) {
    die("Fallo en la conexión ".$conexion->connect_error);
}

echo "Conexión POO Correcta.<br />";

//3. Cierre de la conexión.
$conexion->close();



/** MYSQL Procedimental */
//1. Crear la conexión
$con = mysqli_connect('db', 'root', 'test', 'dbname');
//2. Comprobar la conexión
if(!$con){
    die("Fallo en la conexión ".mysqli_connect_error());
}

echo "Conexión Procedimental Correcta.<br />";

//3. Cierre de la conexión.
mysqli_close($con);


/** PDO */

$servername = "db";
$username = "root";
$password = "test";

try{
    //1. Conexión a BD
    $conPDO = new PDO("mysql:host=$servername;dbname=dbname", $username, $password);
    //2. Forzar excepción
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión PDO Correcta.";

}catch(PDOException $e){
    echo "Fallo en conexión: ".$e->getMessage();
}

//3. Cierre de la conexión.
$conPDO = null;

?>