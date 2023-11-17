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
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Grupo Sanguineo</th>
                <th>Codigo Postal</th>
                <th>Teléfono Movil</th>
            </tr>";
    
    foreach($matriz->fetchAll() as $linea) {
        echo "<tr>
                <td>".$linea["id"]."</td>
                <td>".$linea["nombre"]."</td>
                <td>".$linea["apellidos"]."</td>
                <td>".$linea["edad"]."</td>
                <td>".$linea["grupo_sanguineo"]."</td>
                <td>".$linea["codigo_postal"]."</td>
                <td>".$linea["telefono_movil"]."</td>
                <td><a class=\"btn btn-primary\" href=\"donar.php?id=".$linea["id"]."\" role=\"button\"> Registrar Donación</a></td>
                <td><a class=\"btn btn-primary\" href=\"borrar_donante.php?id=".$linea["id"]."\" role=\"button\"> Eliminar</a></td>
                <td><a class=\"btn btn-primary\" href=\"listar_donaciones.php?id=".$linea["id"]."\" role=\"button\"> Listar Donaciones</a></td>
            </tr>";
    }

    echo "</table>";
}

//Función para imprimir en html las fechas de las donaciones de cada donante.
function imprimir_donaciones($matriz) {
    echo "<table>
            <tr>
                <th>Fecha Donación</th>
                <th>Fecha Próxima Donación</th>
            </tr>";

    foreach($matriz->fetchAll() as $linea) {
        echo "<tr>
                <td>".$linea["fecha_donacion"]."</td>
                <td>".$linea["fecha_proxima_donacion"]."</td>
              </tr>";
    }

    echo "</table>";

}

//Funcion para imprimir en html el listado de donantes sin botones.
function imprimir_busqueda_donantes($matriz) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
                <th>Grupo Sanguineo</th>
                <th>Codigo Postal</th>
                <th>Teléfono Movil</th>
            </tr>";
    
    foreach($matriz->fetchAll() as $linea) {
        echo "<tr>
                <td>".$linea["id"]."</td>
                <td>".$linea["nombre"]."</td>
                <td>".$linea["apellidos"]."</td>
                <td>".$linea["edad"]."</td>
                <td>".$linea["grupo_sanguineo"]."</td>
                <td>".$linea["codigo_postal"]."</td>
                <td>".$linea["telefono_movil"]."</td>
            </tr>";
    }

    echo "</table>";
}

?>