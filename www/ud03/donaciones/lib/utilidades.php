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
// Devuelve un array asociativo.
function recoger_datos_post($campos) {
    $datos_formulario = [];
    //Se recorre el array con los nombres de los campos a procesar y se van almacenando
    //en el array asociativo de salida.
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
    echo "<table class='table table-striped table-hover'>
            <thead>
            <tr>
                <th class='text-center'>ID</th>
                <th class='text-center'>Nombre</th>
                <th class='text-center'>Apellidos</th>
                <th class='text-center'>Edad</th>
                <th class='text-center'>Grupo Sanguineo</th>
                <th class='text-center'>Codigo Postal</th>
                <th class='text-center'>Teléfono</th>
                <th class='text-center' colspan='3'>Acciones</th>
            </tr>
            </thead>
            <tbody>";
    
    foreach($matriz as $linea) {
        echo "<tr>
                <td class='align-middle text-center'>".$linea["id"]."</td>
                <td class='align-middle text-center'>".$linea["nombre"]."</td>
                <td class='align-middle text-center'>".$linea["apellidos"]."</td>
                <td class='align-middle text-center'>".$linea["edad"]."</td>
                <td class='align-middle text-center'>".$linea["grupo_sanguineo"]."</td>
                <td class='align-middle text-center'>".$linea["codigo_postal"]."</td>
                <td class='align-middle text-center'>".$linea["telefono_movil"]."</td>
                <td class='align-middle text-center'><a class='btn btn btn-outline-primary' href='donar.php?id=".$linea["id"]."' role='button'> Registrar Donación</a></td>
                <td class='align-middle text-center'><a class='btn btn btn-outline-primary' href='listar_donaciones.php?id=".$linea["id"]."' role='button'> Listar Donaciones</a></td>
                <td class='align-middle text-center'><a class='btn btn-outline-danger' href='borrar_donante.php?id=".$linea["id"]."' role='button'> Eliminar</a></td>      
            </tr>";
    }

    echo "</tbody></table>";
}

//Función para imprimir en html las fechas de las donaciones de cada donante.
function imprimir_donaciones($matriz) {
    echo "<table class='table table-striped'>
            <thead class='table-primary text-center'>
            <tr>
                <th>Fecha Donación</th>
                <th>Fecha Próxima Donación</th>
            </tr>
            </thead>
            <tbody>";

    foreach($matriz as $linea) {
        echo "<tr>
                <td class='align-middle text-center'>".$linea["fecha_donacion"]."</td>
                <td class='align-middle text-center'>".$linea["fecha_proxima_donacion"]."</td>
              </tr>";
    }

    echo "</tbody></table>";

}

//Funcion para imprimir en html el listado de donantes que pueden realizar una donación.
//Cuya fecha de proxima donacion es menor que la fecha actual, incluye a los que no han donado nunca.
function imprimir_busqueda_donantes($matriz) {
    echo "<table class='table table-striped'>
            <thead class='table-primary'>
            <tr>
                <th class='text-center'>ID</th>
                <th class='text-center'>Nombre</th>
                <th class='text-center'>Apellidos</th>
                <th class='text-center'>Edad</th>
                <th class='text-center'>Grupo Sanguineo</th>
                <th class='text-center'>Codigo Postal</th>
                <th class='text-center'>Teléfono</th>
            </tr>
            </thead>
            <tbody>";
    
    foreach($matriz as $linea) {

        $fecha_actual = date("Y-m-d", strtotime(date('Y-m-d')));

     //   if ($linea["fecha_proxima_donacion"] < $fecha_actual) {
            echo "<tr>
            <td class='align-middle text-center'>".$linea["id"]."</td>
            <td class='align-middle text-center'>".$linea["nombre"]."</td>
            <td class='align-middle text-center'>".$linea["apellidos"]."</td>
            <td class='align-middle text-center'>".$linea["edad"]."</td>
            <td class='align-middle text-center'>".$linea["grupo_sanguineo"]."</td>
            <td class='align-middle text-center'>".$linea["codigo_postal"]."</td>
            <td class='align-middle text-center'>".$linea["telefono_movil"]."</td>
        </tr>";
      //  }
    }
    echo "</tbody></table>";
}

?>