<?php
function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
}

// Función para registrar mensajes de error en un archivo de logs.
function registrar_log($mensaje){
    $archivo_log = 'error_log.txt';
    $fecha_hora = date('Y-m-d H:i:s');
    $mensaje_formato = "[$fecha_hora] $mensaje\n";
    error_log($mensaje_formato, 3, $archivo_log);
}

function imprimir_listado_usuarios($listado) {
    echo "<table class='table table-striped table-hover'>
                <thead>
                    <tr class='text-center'>
                        <th scope='col'>ID</th>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Apellidos</th>
                        <th scope='col'>Edad</th>
                        <th scope='col'>Provincia</th>
                        <th scope='col'>Acciones</th>
                    </tr>
                </thead>
                <tbody>";

    while ($linea = $listado->fetch_assoc()) {
        echo "<tr class='align-middle text-center'>
                <td>{$linea["id"]}</td>
                <td>{$linea["nombre"]}</td>
                <td>{$linea["apellidos"]}</td>
                <td>{$linea["edad"]}</td>
                <td>{$linea["provincia"]}</td>
                <td>
                    <a class='btn btn-outline-primary me-4' href='editar.php?id={$linea["id"]}' role='button'>Editar</a>
                    <a class='btn btn-outline-danger' href='borrar.php?id={$linea["id"]}' role='button'>Borrar</a>
                </td>
            </tr>";
    }

    echo "</tbody></table>";
}



?>