<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar Tema</title>
        <Link rel="stylesheet" href="Estilo.css">
    </head>
    <body style="text-align: center">
        <?php
            if(@$_SESSION['autentificado']==TRUE){
        ?>
        <h1 style="font-size: 35pt">Tienda xd</h1>
        <div style="position: absolute;background-color: #97F267; 
             width: 200px; left: 50px; top: 100px; font-size: 18pt;
             text-align: center;">
             
            <a href="index.php"><B>Inicio</B></a>
	
        </div>
        
        <div style="position: absolute;background-color: #85A8F6; 
             width: 200px; left: 50px; top: 150px; font-size: 18pt;
             text-align: center;">
            
            <a href="CerrarSesión.php?salir=true"><B>Cerrar Sesión</B></a> 
	
        </div>
        
        <div style="position: absolute; background-color: #D7AB09; 
             width: 200px; left: 50px; top: 350px; font-size: 18pt;
             text-align: center;">
            <?php
            echo "<B>¡Hola! " .$_SESSION['nomUs']."</B>" 
            ?>
        </div>
        
        <?php
        date_default_timezone_set("America/Mexico_City");
            include ("ConexiónBD.php");
            #conexion
            $conexion = conectar();
            $fecha = date('Y-m-d');
            $desc=$_POST['desc'];
            $desc= mysqli_escape_string($conexion, $desc);
            $nompro=$_POST['nomp'];
            $nompro= mysqli_escape_string($conexion, $nompro);
            $precio=$_POST['precio'];
            $precio= mysqli_escape_string($conexion, $precio);
            $cat=$_POST['cat'];
            $cat= mysqli_escape_string($conexion, $cat);
            $idPro= $_SESSION['auxpro'];
             if(!$conexion && isset($_FILES['miArchivo']) && ($_FILES['miArchivo'] !='')){
                echo "ERROR";
            }else{
                #Consulta para insertar una nueva consulta en la tabla de consultas
                #Con los datos que nos llegaron de la pagina anterior y la fecha como date.
                $sql="UPDATE productos set descripcion = '$desc',fechap = '$fecha',producto = '$nompro',"
                        . "precio = '$precio',categoria = '$cat' WHERE id_productos = '$idPro'";
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
                    $query = "UPDATE imagenes set fileName = '$fileName',extension = '$fileExtension', binario = '$contenido'"
                            . "WHERE id_productos = '$idPro'";
                    //Ejecutando el Query
                    $result = mysqli_query($conexion, $query);
                    mysqli_close($conexion);//cerramos la conexiÃ³n
                    header('Location: index.php');
                    } else {echo "Error: " . $sql . "<br>" . $conexion->error;}
                    mysqli_close($conexion);
            }
        ?>
        <?php
        // put your code here
        }
            else
            {
        ?>
        
        <p>Ocurrió un error en el inicio de sesión. Regresaras a la página de inicio</p>
        <a href="index.php">Inicio</a>
        
            <?php
            }
        ?>
    </body>
</html>
