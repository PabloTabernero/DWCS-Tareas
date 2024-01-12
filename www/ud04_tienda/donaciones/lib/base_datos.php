<?php

    define('DB_SERVER', 'db');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'test');

    //Funcion que obtiene la conexión a la Base de datos.
    function get_conexion() {
        try {
            $conexion = new PDO("mysql:host=" . DB_SERVER, DB_USERNAME, DB_PASSWORD);
            //  Forzar excepciones
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo "No se puede conectar en estos momentos. Pruebe más tarde.";
            registrar_log("Fallo en conexión: " . $e->getMessage());
        }
 
        return $conexion;
    }

    //Función que selecciona la Base de datos donacion y devuelve la conexión.
    function seleccionar_bd_donacion($conexion) {
        try {
            $conexion->exec("USE donacion");

        } catch(PDOException $e) {
            registrar_log("Falla al seleccionar BD: ". $e->getMessage());
        }
    }

    //Funcion que crea la Base de datos donación.
    function crear_bd_donacion() {
        try {
            $conexion = get_conexion();
            $sql = "CREATE DATABASE IF NOT EXISTS donacion";
            $conexion->exec($sql);

        } catch(PDOException $e) {
            registrar_log("Fallo al crear la BD: ". $e->getMessage());
        }
        
        $conexion = null;
    }

    //Función que crea la tabla donantes.
    function crear_tabla_donantes() {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $sql = "CREATE TABLE IF NOT EXISTS donantes(
                id INT AUTO_INCREMENT PRIMARY KEY, 
                nombre VARCHAR(50) NOT NULL,
                apellidos VARCHAR(100) NOT NULL,
                edad INT CHECK (edad > 18) NOT NULL,
                grupo_sanguineo VARCHAR(3) CHECK (grupo_sanguineo IN ('O-', 'O+', 'A-', 'A+', 'B-', 'B+', 'AB-', 'AB+')) NOT NULL,
                codigo_postal INT(5) CHECK (LENGTH(codigo_postal) = 5) NOT NULL,
                telefono_movil INT(9) CHECK (LENGTH(telefono_movil) = 9) NOT NULL    
            )";

            $conexion->exec($sql);

        } catch(PDOException $e) {
            registrar_log("Fallo al crear la tabla donacion: ". $e->getMessage());
        }
        $conexion = null;
    }

    //Función que crea la tabla donantes.
    function crear_tabla_historico() {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $sql = "CREATE TABLE IF NOT EXISTS historico (
                id INT AUTO_INCREMENT PRIMARY KEY, 
                id_donante INT NOT NULL,
                fecha_donacion DATE NOT NULL,
                fecha_proxima_donacion DATE NOT NULL,
                FOREIGN KEY (id_donante) REFERENCES donantes(id) ON DELETE CASCADE
            )";

            $conexion->exec($sql);

        } catch(PDOException $e) {
            registrar_log("Fallo al crear la tabla historico: ". $e->getMessage());
        }
        $conexion = null;
    }

    //Función que crea la tabla administradores.
    function crear_tabla_administradores() {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $sql = "CREATE TABLE IF NOT EXISTS administradores (
                nombre_usuario VARCHAR(50) PRIMARY KEY, 
                pass VARCHAR(200) NOT NULL
            )";

            $conexion->exec($sql);

        } catch(PDOException $e) {
            registrar_log("Fallo al crear la tabla administradores: ". $e->getMessage());
        }
        $conexion = null;
    }

    //Función para dar de alta a un donante en la base de datos.
    function dar_alta_donante($datos_formulario) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("INSERT INTO donantes (nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil)
                                        VALUES (:nombre, :apellidos, :edad, :grupo_sanguineo, :codigo_postal, :telefono_movil)");

            $resultado = $stmt->execute($datos_formulario);
            
        } catch(PDOException $e) {
            registrar_log("No se pudo crear el registro en la tabla donantes. Error: " . $e->getMessage());
            //En caso de excepción, se establece explicitamente el valor de $resultado a false.
            $resultado = false;
        }
        
        //Codigo se ejecutará siempre despues del try/catch, cerrando conexiones y devolviendo resultado.
        $stmt = null;
        $conexion = null;
        return $resultado;
    }

    //Función para listar los donantes de la base de datos.
    //Devuelve un array con los datos de los donantes, en caso de que no haya donantes para listar devuelve
    //un array vacio.
    function listar_donantes() {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("SELECT id, nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil FROM donantes");
            $stmt->execute();
            //Se almacena en un array asociativo el resultado de la consulta.
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            //En caso de saltar excepción la función devuelve false.
            registrar_log("No se pudo realizar la busqueda en la tabla donantes. Error: " . $e->getMessage());
            $resultado = false;
        }

        //Codigo se ejecutará siempre despues del try/catch, cerrando conexiones y devolviendo resultado.
        $stmt = null;
        $conexion = null;
        return $resultado;
    }

    //Funcion que devuelve los datos de un donante en un array asociativo.
    function recuperar_datos_donante($id) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("SELECT id, nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil 
                                        FROM donantes WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            registrar_log("No se pudo realizar la busqueda en la tabla donantes. Error: " . $e->getMessage());
        
        }

        //Codigo se ejecutará siempre despues del try/catch, cerrando conexiones y devolviendo resultado.
        $stmt = null;
        $conexion = null;
        return $resultado;
    }

    //Función que registra una donación en la tabla de historico siempre y cuando se pueda realizar.
    //La función devuelve true en caso de realizar la inserción.
    function registrar_donacion($id, $fecha_donacion) {
        try{
            //Calculamos la fecha de la proxima donación permitida.
            $fecha_proxima_donacion = date("Y-m-d", strtotime($fecha_donacion." + 4 month"));

            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("INSERT INTO historico (id_donante, fecha_donacion, fecha_proxima_donacion)
                    VALUES (:id_donante, :fecha_donacion, :fecha_proxima_donacion)");
            $stmt->bindParam(':id_donante', $id);
            $stmt->bindParam(':fecha_donacion', $fecha_donacion);
            $stmt->bindParam(':fecha_proxima_donacion', $fecha_proxima_donacion);

            $donacion = obtener_fecha_proxima_donacion($id);
 
            if($donacion < $fecha_donacion) {
                $resultado = $stmt->execute();
            }else{
                $resultado = false;
            }

        } catch(PDOException $e) {
            registrar_log("No se pudo registrar la donación en la tabla historico. Error: " . $e->getMessage());
            $resultado = false;
        }
        
        //Codigo se ejecutará siempre despues del try/catch, cerrando conexiones y devolviendo resultado.
        $stmt = null;
        $conexion = null;
        return $resultado;
    }

    //Función que recupera el historico de donacione del donante.
    //Devuele un array asociativo con las donaciones o un array vacio si no hay.
    //En caso de error devuelve false.
    function recuperar_donaciones($id) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);
    
            $stmt = $conexion->prepare("SELECT fecha_donacion, fecha_proxima_donacion FROM historico WHERE id_donante= :id_donante ORDER BY fecha_donacion DESC");
            $stmt->bindParam(':id_donante', $id);
            $stmt->execute();
    
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch(PDOException $e) {
            registrar_log("No se pudo realizar la busqueda en la tabla donantes. Error: " . $e->getMessage());
            $resultado = false;
            
        }

        //Codigo se ejecutará siempre despues del try/catch, cerrando conexiones y devolviendo resultado.
        $stmt = null;
        $conexion = null;
        return $resultado;
    }

    //Función que borra un donante de la base de datos.
    //Devuelve un bool en función de si se ha podido realizar la operación.
    function borrar_donante($id) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("DELETE FROM donantes WHERE id= :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            //Se comprueba si la consulta ha afectado a alguna linea de la tabla para
            //establecer si se ha borrado a algún usuario.
            $filas_afectadas = $stmt->rowCount();
            $resultado = ($filas_afectadas > 0);

        } catch(PDOException $e) {
            registrar_log("No se pudo realizar el borrado en la tabla donantes. Error: " . $e->getMessage());
            $resultado = false;
        }

        //Codigo se ejecutará siempre despues del try/catch, cerrando conexiones y devolviendo resultado.
        $stmt = null;
        $conexion = null;
        return $resultado;
    }

    //Funcion que busca todos los donantes de la tabla donantes que pertenecen al codigo postal y 
    //tienen el grupo sanguineo que se pasan por argumentos.
    //Devuelve un array asociativo con el listado de donantes que cumplen las condiciones, si no los hay
    //Devuelve un array vacio, y si la consulta da error devuelve false.
    function buscar_donantes($codigo_postal, $grupo_sanguineo) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            //Consulta para obtener la una tabla con todos los clientes y su fecha a partir de la cual podrían donar(fecha_proxima_donacion).
            $stmt = $conexion->prepare("SELECT d.id, d.nombre, d.apellidos, d.edad, d.grupo_sanguineo, d.codigo_postal, d.telefono_movil, MAX(h.fecha_proxima_donacion) AS fecha_proxima_donacion
                                        FROM donantes d LEFT JOIN historico h ON d.id = h.id_donante 
                                        WHERE (codigo_postal = :codigo_postal 
                                        AND grupo_sanguineo = :grupo_sanguineo)
                                        GROUP BY d.id
                                        HAVING fecha_proxima_donacion IS NULL OR fecha_proxima_donacion < :fecha_actual");

            $stmt->bindParam(':codigo_postal', $codigo_postal);
            $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
            //Se obtiene la fecha actual para poder saber que donantes pueden donar hoy.
            $fecha_actual = date("Y-m-d", strtotime(date('Y-m-d')));
            $stmt->bindParam(':fecha_actual', $fecha_actual);
            $stmt->execute();

            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            registrar_log("No se pudo realizar la busqueda en la tabla donantes. Error: " . $e->getMessage());
            $resultado = false;
        }
        
        //Codigo se ejecutará siempre despues del try/catch, cerrando conexiones y devolviendo resultado.
        $stmt = null;
        $conexion = null;
        return $resultado;
    }
    
    //Funcion que da de alta un administrador en la tabla de administradores.
    //Devuelve un bool con el resultado de la operación.
    function alta_administrador($nombre_admin, $pass) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("INSERT INTO administradores (nombre_usuario, pass)
                                        VALUES (:nombre_usuario, :pass)");
            $stmt->bindParam(':nombre_usuario', $nombre_admin);
            $stmt->bindParam(':pass', $pass);
            $resultado =$stmt->execute();

        } catch(PDOException $e) {
            registrar_log("No se pudo realizar el alta del administrador en la tabla administradores. Error: " . $e->getMessage());
            $resultado = false;
        }

        //Codigo se ejecutará siempre despues del try/catch, cerrando conexiones y devolviendo resultado.
        $stmt = null;
        $conexion = null;
        return $resultado;
    }

    //Función que devuelve la fecha a partir de la cual un donante puede volver a donar.
    function obtener_fecha_proxima_donacion($id) {
        try {
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("SELECT max(fecha_proxima_donacion) FROM historico WHERE id_donante = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $resultado = $stmt->fetchColumn();
   
        } catch(PDOException $e) {
            registrar_log("Error obteniendo la fecha de la proxima donación. Error: " . $e.getMessage());
        }

        //Codigo se ejecutará siempre despues del try/catch, cerrando conexiones y devolviendo resultado.
        $stmt = null;
        $conexion = null;
        return $resultado;
    }

?>