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

            $stmt->execute($datos_formulario);
            echo "Se ha creado un nuevo registro en la tabla donantes.";

        } catch(PDOException $e) {
            echo "No se ha podido crear el nuevo registro en la tabla donantes.";
            registrar_log("No se pudo crear el registro en la tabla donantes. Error: " . $e->getMessage());
        
        }
        $stmt = null;
        $conexion = null;
    }

    //Función para listar los donantes de la base de datos.
    function listar_donantes() {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("SELECT id, nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil FROM donantes");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                imprimir_listado_donantes($stmt);
            }else{
                echo "No hay resultados para mostrar.";
            }

        } catch(PDOException $e) {
            echo "No se pudo realizar la busqueda.";
            registrar_log("No se pudo realizar la busqueda en la tabla donantes. Error: " . $e->getMessage());
        
        }
        $stmt = null;
        $conexion = null;
    }

    //Funcion que devuelve los datos de un donante en un array asociativo.
    function recuperar_datos_donante($id) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("SELECT id, nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil 
                                        FROM donantes WHERE id = :id");
            $stmt->bindParam(':id', $id_donante);
            $id_donante = $id;

            if($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $datos_donante = $stmt->fetch();
                
                $stmt = null;
                $conexion = null;

                return $datos_donante;

            }else{
                echo "No se han podido recuperar los datos del usuario.";
                registrar_log("No se han podido recuperar los datos del usuario de la base de datos. Error: ". $stmt->error);
        
                $stmt = null;
                $conexion = null;
            }

        } catch(PDOException $e) {
            echo "No se pudo realizar la busqueda.";
            registrar_log("No se pudo realizar la busqueda en la tabla donantes. Error: " . $e->getMessage());
        
        }
        $stmt = null;
        $conexion = null;
    }


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

            $stmt->execute();
            echo "Donación insertada en el sistema con exito.";

        } catch(PDOException $e) {
            echo "No se pudo registrar la donación.";
            registrar_log("No se pudo registrar la donación en la tabla historico. Error: " . $e->getMessage());
        }
        $stmt = null;
        $conexion = null;
    }

    //Función para listar los donantes de la base de datos.
    function listar_donaciones($id_donante) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);
    
            $stmt = $conexion->prepare("SELECT fecha_donacion, fecha_proxima_donacion FROM historico WHERE id_donante= :id_donante ORDER BY fecha_donacion DESC");
            $stmt->bindParam(':id_donante', $id_donante);
            $stmt->execute();
    
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
                imprimir_donaciones($stmt);
            }else{
                echo "No hay resultados para mostrar.";
            }
    
        } catch(PDOException $e) {
            echo "No se pudo realizar la busqueda.";
            registrar_log("No se pudo realizar la busqueda en la tabla donantes. Error: " . $e->getMessage());
            
        }
        $stmt = null;
        $conexion = null;
    }

    //Función que borra un donante de la base de datos.
    function borrar_donante($id) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("DELETE FROM donantes WHERE id= :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            echo "Registro borrado de la tablas donantes.";


        } catch(PDOException $e) {
            echo "No se pudo borrar al donante.";
            registrar_log("No se pudo realizar el borrado en la tabla donantes. Error: " . $e->getMessage());
            
        }
        $stmt = null;
        $conexion = null;
    }

    //Funcion que busca todos los donantes de la tabla donantes que pertenecen al codigo postal y 
    //tienen el grupo sanguineo que se pasa por argumentos.
    function buscar_donantes($codigo_postal, $grupo_sanguineo) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("SELECT id, nombre, apellidos, edad, grupo_sanguineo, codigo_postal, telefono_movil
                                        FROM donantes WHERE (codigo_postal = :codigo_postal AND grupo_sanguineo = :grupo_sanguineo)");
            $stmt->bindParam(':codigo_postal', $codigo_postal);
            $stmt->bindParam(':grupo_sanguineo', $grupo_sanguineo);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
                return($stmt);
            }else{
                echo "No hay donantes compatibles con los criterios de busqueda.";
            }
    

        } catch(PDOException $e) {
            echo "No se pudo realizar la busqueda.";
            registrar_log("No se pudo realizar la busqueda en la tabla donantes. Error: " . $e->getMessage());
            
        }
        $stmt = null;
        $conexion = null;
    }
    

    function alta_administrador($nombre_admin, $pass) {
        try{
            $conexion = get_conexion();
            seleccionar_bd_donacion($conexion);

            $stmt = $conexion->prepare("INSERT INTO administradores (nombre_usuario, pass)
                                        VALUES (:nombre_usuario, :pass)");
            $stmt->bindParam(':nombre_usuario', $nombre_admin);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();

            echo "Nuevo administrador dado de alta.";

        } catch(PDOException $e) {

            echo "No se pudo realizar el alta del administrador.";
            registrar_log("No se pudo realizar el alta del administrador en la tabla administradores. Error: " . $e->getMessage());
            
        }
        $stmt = null;
        $conexion = null;
    }


?>