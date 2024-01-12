<?php 
    session_start();
    if (!isset($_SESSION['contador'])) {
        $_SESSION['contador'] = 0;
    } else {
        $_SESSION['contador']++;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador Visitas</title>
</head>

<body>


</body>

</html>