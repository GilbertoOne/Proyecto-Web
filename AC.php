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
        <title>Agregar Respuesta</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    
    <body id="cuerpo">
        <?php
            if(@$_SESSION['autentificado']==TRUE){
        ?>
        <div id="Banner">
            <h1>Symphony</h1>
            <h5>Music is the answer</h5>
        </div>

        <!--Botonera-->
        <div id="Botonera">
        
            <!--//Botón de inicio-->
        <div style="cursor:pointer;" onclick="location.href='index.php'" id="InicioBtn">
                <B>Inicio</B>
        </div>
        <!--//Botón de cerrar sesión-->
        <div id="InicioSesionBtn" style="top:150px; cursor:pointer;" onclick="location.href='CerrarSesión.php?salir=true'">
                <B>Cerrar Sesión</B> 
            </div>
        <div style="position: absolute; width: 200px; left: 50px; top: 40px; font-size: 18pt; text-align: center; color:white;">
            <?php
            echo "<B>¡Hola, " .$_SESSION['nomUs']."!</B>" 
            ?>
        </div>
        
        <?php
        // put your code here
        date_default_timezone_set("America/Mexico_City");
        $autorResp=$_SESSION['nomUs'];
        $idusuario=$_SESSION['idusuario'];
        $resp=$_POST['respuesta'];
        $idPro=$_SESSION['aux'];
            include ("ConexiónBD.php");
            $conexion = conectar();
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }
            $resp= mysqli_escape_string($conexion, $resp);
            //Sentencia para agregar una respuesta
            $sql = "INSERT INTO comentarios (id_comentario, user_id, contenido, fechac,id_productos)".
                    "VALUES (null,$idusuario, '$resp', '".date('Y-m-d')."',$idPro)";           
            echo "<p>";
            
            echo "<p>";
            if ($conexion->query($sql) == TRUE) {
                echo "<div id='PanelPrincipal'>Respuesta agregada con éxito </div>";
                header('Location: Producto.php?id='.$idPro);
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
            
            mysqli_close($conexion);
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
