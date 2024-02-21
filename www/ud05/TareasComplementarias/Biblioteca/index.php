<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>

<body>
    <?php
        require_once('Biblioteca.php');
        require_once('Documento.php');

        $biblioteca1 = new Biblioteca("Fonseca", "Rua Fonseca s/n", 981525878);
        $biblioteca1->mostrarInfoBiblioteca();
        $biblioteca1->numeroBibliotecas();

        $libro = new Libro(1, "libro", "Ajax in Action", "Marcelino", 520, 2012);
        $biblioteca1->registrarDocumento($libro);
        $libro = new Libro(2, "libro", "jQuery para novatos", "Pepe Perez", 150, 2010);
        $biblioteca1->registrarDocumento($libro);
        $libro = new Libro(3, "libro", "PHP5 OO", "Arturo", 99, 2011);
        $biblioteca1->registrarDocumento($libro);

        $dvd = new Dvd(4, "dvd", 1, "Debian 6.0", "ISO", 2005);
        $biblioteca1->registrarDocumento($dvd);
        $dvd = new Dvd(5, "dvd", 1, "Mecano", "mp3", 2006);
        $biblioteca1->registrarDocumento($dvd);

        $revista = new Revista(6, "revista", "Hola", 56, 2004);
		$biblioteca1->registrarDocumento($revista);
		//$biblioteca1->listarDocumentos();

        $biblioteca2 = new Biblioteca("Fonseca II", "Rua Fonseca s/n", 981525878);
        $biblioteca2->mostrarInfoBiblioteca();
        echo "El número de bibliotecas creadas es: ".Biblioteca::$contadorBibliotecas."<br />";

        $biblioteca1->borrarDocumento(2);
        $biblioteca1->listarDocumentos();
        $biblioteca1->listarDocumentos("dvd");

    ?>
</body>

</html>