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

// Función para recoger datos del formulario POST
function recoger_datos_post($campos) {
    $datos_formulario = [];

    foreach ($campos as $campo) {
        if (isset($_POST[$campo])) {
            $datos_formulario[$campo] = test_input($_POST[$campo]);
        }
    }

    return $datos_formulario;
}

//Función para imprimir en html el listado de donantes con los botones para
//registrar y listar donaciones, y borrar donante.
function imprimir_listado_donantes($matriz) {
    echo "<table class='table table-striped'>
            <thead class='table-primary'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Grupo Sanguineo</th>
                <th>Codigo Postal</th>
                <th>Teléfono Movil</th>
                <th class='text-center' colspan='3'>Acciones</th>
            </tr>
            </thead>
            <tbody>";
    
    foreach($matriz->fetchAll() as $linea) {
        echo "<tr>
                <td class='align-middle text-center'>".$linea["id"]."</td>
                <td class='align-middle text-center'>".$linea["nombre"]."</td>
                <td class='align-middle text-center'>".$linea["apellidos"]."</td>
                <td class='align-middle text-center'>".$linea["edad"]."</td>
                <td class='align-middle text-center'>".$linea["grupo_sanguineo"]."</td>
                <td class='align-middle text-center'>".$linea["codigo_postal"]."</td>
                <td class='align-middle text-center'>".$linea["telefono_movil"]."</td>
                <td class='align-middle text-center'><a class='btn btn-primary' href='donar.php?id=".$linea["id"]."' role='button'> Registrar Donación</a></td>
                <td class='align-middle text-center'><a class='btn btn-primary' href='listar_donaciones.php?id=".$linea["id"]."' role='button'> Listar Donaciones</a></td>
                <td class='align-middle text-center'><a class='btn btn-danger' href='borrar_donante.php?id=".$linea["id"]."' role='button'> Eliminar</a></td>      
            </tr>";
    }

    echo "</tbody></table>";
}

//Función para imprimir en html las fechas de las donaciones de cada donante.
function imprimir_donaciones($matriz) {
    echo "<table class='table table-striped'>
            <thead class='table-primary'>
            <tr>
                <th>Fecha Donación</th>
                <th>Fecha Próxima Donación</th>
            </tr>
            </thead>
            <tbody>";

    foreach($matriz->fetchAll() as $linea) {
        echo "<tr>
                <td class='align-middle text-center'>".$linea["fecha_donacion"]."</td>
                <td class='align-middle text-center'>".$linea["fecha_proxima_donacion"]."</td>
              </tr>";
    }

    echo "</tbody></table>";

}

//Funcion para imprimir en html el listado de donantes sin botones.
function imprimir_busqueda_donantes($matriz) {
    echo "<table class='table table-striped'>
            <thead class='table-primary'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Grupo Sanguineo</th>
                <th>Codigo Postal</th>
                <th>Teléfono Movil</th>
            </tr>
            </thead>
            <tbody>";
    
    foreach($matriz->fetchAll() as $linea) {
        echo "<tr>
                <td class='align-middle text-center'>".$linea["id"]."</td>
                <td class='align-middle text-center'>".$linea["nombre"]."</td>
                <td class='align-middle text-center'>".$linea["apellidos"]."</td>
                <td class='align-middle text-center'>".$linea["edad"]."</td>
                <td class='align-middle text-center'>".$linea["grupo_sanguineo"]."</td>
                <td class='align-middle text-center'>".$linea["codigo_postal"]."</td>
                <td class='align-middle text-center'>".$linea["telefono_movil"]."</td>
            </tr>";
    }

    echo "</tbody></table>";
}

?>