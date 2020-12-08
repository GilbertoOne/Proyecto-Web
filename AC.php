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
        // put your code here
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
            //Sentencia para agregar una respuesta
            $sql = "INSERT INTO comentarios (id_comentario, user_id, contenido, id_productos)".
                    "VALUES (null,'$idusuario', '$resp', '$idPro')";           
            echo "<p>";
            
            echo "<p>";
            if ($conexion->query($sql) == TRUE) {
                echo "Respuesta agregada con éxito";
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
