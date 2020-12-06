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
        <title>ForoGil</title>
        <Link rel="stylesheet" href="Estilo.css">
    </head>
    <body>
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
        
        <div style="position: absolute; background-color: #F685BF; 
             width: 200px; left: 50px; top: 200px; font-size: 18pt;
             text-align: center;">
            
            <a href="AgregarTema.php"><B>Agregar tema</B></a> 
	
        </div>
        <div style="position: absolute; background-color: #D7AB09; 
             width: 200px; left: 50px; top: 350px; font-size: 18pt;
             text-align: center;">
            <?php
            echo "<B>¡Hola! " .$_SESSION['nomUs']."</B>" 
            ?>
        </div>
        
        <div style="position: absolute; background-color: khaki;
             left: 300px; top: 100px; text-align: center; font-size: 18pt">
        
        <?php
        $var=$_GET['id'];
        $_SESSION['aux']=$var;
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                //echo "Conn ok<BR>";
            }
            //Sentencia de consulta SQL
            $sql = "SELECT * FROM consulta WHERE idconsulta =  $var";
            $sql1 = "SELECT * FROM respuesta WHERE id_consulta =  $var";
            $result = $conexion->query($sql);
            $result1 = $conexion->query($sql1);
            
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row = $result->fetch_assoc()) {
                    echo "<br><B> - Tema: </B>" . $row["titulo"] . "<br><B> Comentario: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Fecha: </B>" .$row["fecha_hora"] . "<br> <B>Autor: </B>" . $row["autor"] . "<br>";
                    if ($_SESSION['nomUs']==$row["autor"] | $_SESSION['status']==1){
                        echo "<a href=BorrarConsulta.php><B>Borrar</B></a><br><br><br>";
                    }
                }
            } else {
                echo "No hay temas aún en el foro";
            }
            
           if($result1->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row1 = $result1->fetch_assoc()) {
                    echo "<br><B> - Respuesta </B><br><B> De: </B>" . $row1["autor"] .
                           "<br>". $row1["respuesta"] . "<br> <B>Fecha: </B>" .$row1["fecha_hora"] . 
                            "<br>";
                    
                    if ($_SESSION['nomUs']==$row1["autor"] | $_SESSION['status']==1){
                        $_SESSION['aux']=$row1["idrespuesta"];
                        echo "<a href=BorrarRespuesta.php><B>Borrar</B></a><br>";
                    }
                }
            } else {
                echo "No hay respuestas";
            }
            
            mysqli_close($conexion);
        ?>
            <form action="AR.php" method="post" style="text-align: center">
                Respuesta: <br><br><textarea name="respuesta" cols="75" rows="5"></textarea> <br> <br>
                <input type="submit" value="Enviar">
            </form>
        <?php
            }
            else
            {
        ?>
         
        <h1 style="font-size: 35pt">FOROGIL</h1>
        
        <div style="position: absolute;background-color: #97F267; 
             width: 200px; left: 50px; top: 100px; font-size: 18pt;
             text-align: center;">
            
            <a href="index.php"><B>Inicio</B></a>
	
        </div>
        
        <div style="position: absolute;background-color: #85A8F6; 
             width: 200px; left: 50px; top: 150px; font-size: 18pt;
             text-align: center;">
            
            <a href="IniciarSesión.php"><B>Iniciar Sesión</B></a> 
	
        </div>
        
        <div style="position: absolute; background-color: #F685BF; 
             width: 200px; left: 50px; top: 200px; font-size: 18pt;
             text-align: center;">
            
            <a href="Registrarse.php"><B>Registrarse</B></a> 
	
        </div>
        
        <div style="position: absolute; background-color: khaki;
             left: 300px; top: 100px; text-align: center; font-size: 18pt">
        
        <?php
        // put your code here
         $var=$_GET['id'];
        $_SESSION['aux']=$var;
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                //echo "Conn ok<BR>";
            }
            //Sentencia de consulta SQL
            $sql = "SELECT * FROM consulta WHERE idconsulta =  $var";
            $sql1 = "SELECT * FROM respuesta WHERE id_consulta =  $var";
            $result = $conexion->query($sql);
            $result1 = $conexion->query($sql1);
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row = $result->fetch_assoc()) {
                    echo "<br><B> - Tema: </B>" . $row["titulo"] . "<br><B> Comentario: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Fecha: </B>" .$row["fecha_hora"] . "<br> <B>Autor: </B>" . $row["autor"] . "<br><br>";
                }
            } else {
                echo "No hay temas aún en el foro";
            }
            
            if($result1->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row1 = $result1->fetch_assoc()) {
                    echo "<br><B> - Respuesta </B><br><B> De: </B>" . $row1["autor"] .
                           "<br>". $row1["respuesta"] . "<br> <B>Fecha: </B>" .$row1["fecha_hora"] . 
                            "<br><br>";
                }
            } else {
                echo "No hay respuestas";
            }
            
            mysqli_close($conexion);
        ?>
            
        <?php
            }
        ?>
            
        </div>   
    </body>
</html>
