<?php

function get_conexion(){
    //Código para establecer á conexión
    //return $conexion;
}

function seleccionar_bd_tienda($conexion){
    $conexion->select_db("tienda");
}
function crear_bd_tienda(){
    //Código para creación de bd
}