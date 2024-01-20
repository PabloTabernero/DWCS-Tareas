# Repositorio para la asignatura DWCS

Este repositorio contiene las tareas realizadas para la asignatura "Desenvolvemento web en contorno servidor".


## Tarea Actual: DWES04

### Descripción

Todos los puntos de esta tarea se han realizado sobre la tienda desarrollada en la tarea DWES03. A continuación, se detallan varios puntos sobre cada ejercicio. Se deja el **usuario: vagrant pass: vagrant** en la base de datos para poder loguearse y acceder a la página principal. Se han creado las ramas **ficheros_2** y **ficheros_3** para guardar el resultado de los pasos 2 y 3 del ejercicio de ficheros.

**1. 🍪 COOKIES Y SESIONES**
   - **Ejercicio 1. Contador de visitas**

     Se genera un contador de visitas mediante una cookie🍪 que almacena los valores durante al menos 1 mes y se muestra en el footer de index.php.
   - **Ejercicio 2. Seleccionar idioma 🇵🇹🇪🇸🇬🇧**

     Se genera un selector de idioma que mediante una cookie🍪 permite modificar el título y texto de index.php.

**2. 📂 FICHEROS**
   - **Paso 1. Crear tabla productos**

     Se crea la tabla productos en la base de datos según lo indicado en el ejercicio.
   - **Paso 2. Crear formulario para nuevos productos con una foto📸**

     Se crea un formulario para introducir nuevos productos en la base de datos con un campo type="file" y se recoge el fichero mediante el array $_FILES. Se aplican las restricciones solicitadas mediante las funciones comprobarTamanho() y compruebaExtension(), y no se verifica si el fichero ya existe en el directorio uploads puesto que en caso de que esto suceda se sobreescribe el fichero. Finalmente se carga el contenido del fichero en la base de datos.
     
     Dado que los siguientes pasos modificarían este ejercicio, se deja el resultado en la ⚠️[rama ficheros_2.](https://github.com/PabloTabernero/DWCS-Tareas/tree/ficheros_2)⚠️
   - **Paso 3. Modificar el formulario anterior para permitir múltiples fotos📸📸📸**

     Se modifica el código anterior para permitir subir varias fotos. Para ello se utiliza la opción multiple en el formulario y se recogen los ficheros en el array $_FILES. Se recorre el array $_FILES con un foreach donde se obtiene la clave de cada fichero para poder acceder a sus prodiedades (Menudo lío entender la estructura de $_FILES 🙈). Una vez obtenido esto se procede como en el ejercicio anterior y se van cargando las imagenes.
       
     Dado que los siguientes pasos modificarían este ejercicio, se deja el resultado en la ⚠️[rama ficheros_3.](https://github.com/PabloTabernero/DWCS-Tareas/tree/ficheros_3)⚠️
   - **Paso 4. Modificar el formulario anterior para permitir cualquier tipo de archivo**

     Se modifica el código anterior para permitir subir ficheros de cualquier tipo, ya no se utiliza la función compruebaExtension(). Se crea una nueva función obtenerDestino() que en función del tipo de fichero ($_FILES[]["type"]) sube el fichero a una carpeta diferente. En este caso no se realiza la subida a la
     base de datos.
     
     Dado que ya no hay más modificaciones sobre esta parte de la aplicación, se deja el resultado en la ⚠️[rama main.](https://github.com/PabloTabernero/DWCS-Tareas/tree/main)⚠️

**3. 🚪 LOGIN**
   - **Paso 1. Actualizar la tabla usuarios**

      Se actualiza la tabla de usuarios según lo indicado en el enunciado. A mayores se modifica el campo nombre como "UNIQUE" para evitar que haya dos nombres de usuario iguales en la base de datos.
   - **Paso 2. Crear formulario alta usuarios con password cifrado🔐**

      Se crea un nuevo formulario para dar de alta usuarios donde se incluye el password. Se comprueba si el nombre usuario existe y se cifra el password🔐 antes de darlo de alta en la base de datos.
   - **Paso 3. Generar formulario de login**

     Desde index.php se redirige al fichero login.php en caso de que no haya una sesión activa. En login.php se crea un formulario para introducir el usuario y contraseña que seran comprobados contra la base de datos teniendo que utilizar password_verify() para poder comprobar la contraseña cifrada. Si los datos son correctos se crea una sesión y se redige a la web principal. Se crea también el fichero logout.php para permitir cerrar la sesión.
