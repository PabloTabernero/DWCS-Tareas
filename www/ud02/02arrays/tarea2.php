<?php 

/*
Necesitamos almacenar la siguiente información en un array multidimensional:

- **John**
    - email: `john@demo.com`
    - website: `www.john.com`
    - age: `22`
    - password: `pass`
- **Anna**
    - email: `anna@demo.com`
    - website: `www.anna.com`
    - age: `24`
    - password: `pass`
- **Peter**
    - email: `peter@mail.com`
    - website: `www.peter.com`
    - age: `42`
    - password: `pass`
- **Max**
    - email: `max@mail.com`
    - website: `www.max.com`
    - age: `33`
    - password: `pass`

Almacena e imprime la información. 
*/

$usuarios["John"] = array("email" => "john@demo.com", "website" => "www.john.com", "age" => 22, "password" => "pass");
$usuarios["Anna"] = array("email" => "anna@demo.com", "website" => "www.anna.com", "age" => 24, "password" => "pass");
$usuarios["Peter"] = array("email" => "peter@mail.com", "website" => "www.peter.com", "age" => 42, "password" => "pass");
$usuarios["Max"] = array("email" => "max@mail.com", "website" => "www.max.com", "age" => 33, "password" => "pass");

echo "<pre>";
print_r($usuarios);
echo "</pre>";

?>