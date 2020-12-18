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
        <title>Borrar Consulta</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body id="cuerpo">
        <?php
            if(@$_SESSION['autentificado']==TRUE | $_SESSION['status']==1){
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
        <div id="InicioSesionBtn" style="top:150px; cursor:pointer;" onclick="location.href='CerrarSesión.php?salir=true'">
                <B>Cerrar Sesión</B> 
            </div>
        <div style="position: absolute; width: 200px; left: 50px; top: 40px; font-size: 18pt; text-align: center; color:white;">
            <?php
            echo "<B>¡Hola, " .$_SESSION['nomUs']."!</B>" 
            ?>
        </div>
        
        <?php
        
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }
            //Sentencia de consulta SQL para borrar una consulta
            $aux=$_SESSION['aux'];
            $sql1 = "DELETE FROM imagenes WHERE id_productos = '$aux'";
            $sql2 = "DELETE FROM comentarios WHERE id_productos = '$aux'";
            $sql3 = "DELETE FROM productos WHERE id_productos = '$aux'";
            
            $result1 = $conexion->query($sql1);
            $result2 = $conexion->query($sql2);
            $result3 = $conexion->query($sql3);
            ?>
            
            <div id="PanelPrincipal"> Tema borrado</div>
            <?php
            
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
        </div> 
    </body>
</html>
