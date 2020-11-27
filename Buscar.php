<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    $busqueda=$_POST['tema'];
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
        <h1 style="font-size: 35pt">FOROGIL</h1>
        
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
        
        <div style="position: absolute; background-color: rgb; 
             width: 200px; left: 50px; top: 550px; font-size: 18pt;
             text-align: center;">
            
            <B>Buscar tema</B>
            <form action="Buscar.php" method="post" style="text-align: center;font-size: 18pt">
            <input type="text" name="tema" size="15"> <br>
            <input type="submit" value="Enviar">
            </form>
	
        </div>
        
        <div style="position: absolute; background-color: #D7AB09; 
             width: 200px; left: 50px; top: 350px; font-size: 18pt;
             text-align: center;">
            <?php
            echo "<B>¡Hola! " .$_SESSION['nomUs']."</B>" 
            ?>
        </div>
        
        <?php
        if ($_SESSION['status'] == 1){
                ?>
                    <div style="position: absolute; background-color: #F7371C; 
                        width: 200px; left: 50px; top: 250px; font-size: 18pt;
                        text-align: center;">

                       <a href="VerUsuarios.php"><B>Administrar Usuarios</B></a> 

                   </div>
            <?php
                }
            ?>
        
        <div style="position: absolute; background-color: khaki;
             left: 300px; top: 100px; text-align: center; font-size: 18pt">
        
        <?php
        // put your code here
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                //echo "Conn ok<BR>";
            }
            //Sentencia de consulta SQL
            $sql = "SELECT * FROM consulta WHERE titulo = '$busqueda'";
            $result = $conexion->query($sql);
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row = $result->fetch_assoc()) {
                    echo "<br><B> - Tema: </B>" . $row["titulo"] . "<br><B> Comentario: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Fecha: </B>" .$row["fecha_hora"] . "<br> <B>Autor: </B>" . $row["autor"] . "<br>";
                    ?> <a href="Tema.php?id=<?php echo $row["idconsulta"]?>">Ver respuestas</a><br><br><br>
                    <?php
                }
            } else {
                echo "No hay temas con ese nombre";
            }
           
            
            mysqli_close($conexion);
        ?>
        </div>
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
        
        <div style="position: absolute; background-color: rgb; 
             width: 200px; left: 50px; top: 550px; font-size: 18pt;
             text-align: center;">
            
            <B>Buscar tema</B>
            <form action="Buscar.php" method="post" style="text-align: center;font-size: 18pt">
            <input type="text" name="tema" size="15"> <br>
            <input type="submit" value="Enviar">
            </form>
	
        </div>
        
        <div style="position: absolute; background-color: khaki;
             left: 300px; top: 100px; text-align: center; font-size: 18pt">
        
        <?php
        // put your code here
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                //echo "Conn ok<BR>";
            }
            //Sentencia de consulta SQL
            $sql = "SELECT * FROM consulta WHERE titulo = '$busqueda'";
            $result = $conexion->query($sql);
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row = $result->fetch_assoc()) {
                    echo "<br><B> - Tema: </B>" . $row["titulo"] . "<br><B> Comentario: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Fecha: </B>" .$row["fecha_hora"] . "<br> <B>Autor: </B>" . $row["autor"] . "<br>";
                    ?> <a href="Tema.php?id=<?php echo $row["idconsulta"]?>">Ver respuestas</a><br><br><br>
                    <?php
                }
            } else {
                echo "No hay temas con ese nombre";
            }
            
            mysqli_close($conexion);
        ?>
            
        <?php
            }
        ?>
            
        </div>   
    </body>
</html>
