<?php
require_once('Contacto.php');

//Se crean los 3 objetos contacto.
$contacto1 = new Contacto("Pablo", "Tabernero", "615427382");
$contacto2 = new Contacto("Abril", "Tabernero", "666555444");
$contacto3 = new Contacto("Marta", "Tabernero", "666777888");

//Se crea un array con los contactos para imprimirlos.
$contactos = [$contacto1, $contacto2, $contacto3];

//Se muestran los valores de los contactos con los metodos get.
echo "=== Mostrar información con get() ===<br />";
foreach ($contactos as $value) {
    echo "nombre: ".$value->get_nombre()."<br />";
    echo "apellido: ".$value->get_apellido()."<br />";
    echo "telefono: ".$value->get_telefono()."<br />";
    echo "<br />";
}

//Se muestran los valores de los contactos con el metodo muestraInformacion().
echo "=== Mostrar información con metodo ===<br />";
foreach ($contactos as $value) {
    $value->muestraInformacion();
    echo "<br />";
}



?>