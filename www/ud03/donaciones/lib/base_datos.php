<?php

    //Funcion que obtiene la conexión a la Base de datos.
    function get_conexion() {
        $servername = "db";
        $username = "root";
        $password = "test";

        try {
            $conexion = new PDO("mysql:host=$servername", $username, $password);
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
                FOREIGN KEY (id_donante) REFERENCES donantes(id)
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







?>