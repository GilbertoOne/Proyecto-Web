<?php
    #Utilizamos session_start() para poder utilizar las variables de sesion
    #que modifiquemos o necesitemos.
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        #Definimos zona horaria
            date_default_timezone_set("America/Mexico_City");
            include ("ConexiónBD.php");
            #conexion
            $conexion = conectar();
             if(!$conexion && isset($_FILES['miArchivo']) && ($_FILES['miArchivo'] !='')){
                echo "ERROR";
            }else{
                #Consulta para insertar una nueva consulta en la tabla de consultas
                #Con los datos que nos llegaron de la pagina anterior y la fecha como date.
                $sql="INSERT INTO productos(descripcion,fechap,producto,precio,categoria) "
                        . "VALUES ('".$_POST['desc']."','".date('Y-m-d')."','"
                        .$_POST['nomp']."',".$_POST['precio'].",'".$_POST['cat']."')";
                #Confirmar si la consulta se pudo realzizar de forma correcta
                if ($conexion->query($sql) == TRUE) {
                    $sql1="select id_productos from productos where producto='".$_POST['nomp']."'";
                    $result = mysqli_query($conexion, $sql1);
                    $row = $result->fetch_assoc();
                    $file = $_FILES['miArchivo']; //Asignamos el contenido del parametro a una variable para su mejor manejo
                    $temName = $file['tmp_name']; //Obtenemos el directorio temporal en donde se ha almacenado el archivo;
                    $fileName = $file['name']; //Obtenemos el nombre del archivo
                    $fileExtension = substr(strrchr($fileName, '.'), 1); //Obtenemos la extensiÃ³n del archivo.
                    //Comenzamos a extraer la informaciÃ³n del archivo
                    $fp = fopen($temName, "rb");//abrimos el archivo con permiso de lectura
                    $contenido = fread($fp, filesize($temName));//leemos el contenido del archivo
                    //Una vez leido el archivo se obtiene un string con caracteres especiales.
                    $contenido = addslashes($contenido);//se escapan los caracteres especiales
                    fclose($fp);//Cerramos el archivo
                    //Insertando los datos
                    //Creando el query
                    $query = "INSERT INTO imagenes (fechaI,id_productos,fileName ,extension ,binario ) VALUES ('".date('Y-m-d')."',".$row["id_productos"].",'$fileName' ,'$fileExtension' ,'$contenido' )";
                    //Ejecutando el Query
                    $result = mysqli_query($conexion, $query);
                    mysqli_close($conexion);//cerramos la conexiÃ³n
                    header('Location: index.php');
                    } else {echo "Error: " . $sql . "<br>" . $conexion->error;}
                    mysqli_close($conexion);
            }
        ?>
        <a href="index.php">Volver</a>
    </body>
</html>