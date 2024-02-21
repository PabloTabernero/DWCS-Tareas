<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8" />
    <title>Menú orientado a obxectos con PHP</title>
</head>
<body>
<?php
    include_once("menu.php");

    // Crea un menú
    $menu1 = new Menu('horizontal');

    // Engade a primeira opción
    $opcion1 = new Opcion('Google', 'http://www.google.com', '#C3D9FF');
    $menu1->insertar($opcion1);

    // Engade a segunda opción
    $opcion2 = new Opcion('Yahoo', 'http://www.yahoo.com', '#CDEB8B');
    $menu1->insertar($opcion2);

    // Engade a terceira opción
    $opcion3 = new Opcion('MSN', 'http://www.msn.com', '#C3D9FF');
    $menu1->insertar($opcion3);
    
    // Renderiza o menú
    $menu1->debuxar();
?>
</body>
</html>