<?php

/*Haz una página que ejecute la función phpinfo() y que muestre las principales variables de servidor mencionadas en teoría.
*/
echo "<p>Variables de Servidor</p>";
echo "SERVER_NAME: ".$_SERVER['SERVER_NAME']."<br />";
echo "SERVER_PORT: ".$_SERVER['SERVER_PORT']."<br />";
echo "SERVER_SOFTWARE: ".$_SERVER['SERVER_SOFTWARE']."<br />";
echo "REMOTE_PORT: ".$_SERVER['REMOTE_PORT']."<br />";
echo "REMOTE_ADDR: ".$_SERVER['REMOTE_ADDR']."<br />";
echo "DOCUMENT_ROOT: ".$_SERVER['DOCUMENT_ROOT']."<br />";
echo "HTTP_USER_AGENT: ".$_SERVER['HTTP_USER_AGENT']."<br />";


?>