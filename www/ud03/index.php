<?php
/**************************** */
/** MYSQL Orientado a Objetos */
/**************************** */

//1. Crear la conexión
$conexion = new mysqli('db', 'root', 'test', 'dbname');

//2. Comprobar la conexión
if($conexion->connect_error) {
    die("Fallo en la conexión ".$conexion->connect_error);
}
echo "Conexión POO Correcta.<br />";

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

//4. Cierre de la conexión.
$conexion->close();



/********************** */
/** MYSQL Procedimental */
/********************** */
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
}*/

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


//4. Cierre de la conexión.
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


}catch(PDOException $e){
    echo "Fallo en conexión: ".$e->getMessage();
}





//4. Cierre de la conexión.
$conPDO = null;

?>