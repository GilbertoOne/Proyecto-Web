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
        <title>Administrar Usuarios</title>
        <Link rel="stylesheet" href="Estilo.css">
    </head>
    <body style="text-align: center">
        <?php
            if(@$_SESSION['autentificado']==TRUE && $_SESSION['status']==1){
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
        
        <div style="position: absolute; background-color: #D7AB09; 
             width: 200px; left: 50px; top: 350px; font-size: 18pt;
             text-align: center;">
            <?php
            echo "<B>¡Hola! " .$_SESSION['nomUs']."</B>" 
            ?>
        </div>
        
        
        <?php
        
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }
            //Sentencia de consulta SQL
            $sql = "SELECT * FROM usuario";
            
            $result = $conexion->query($sql);
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row = $result->fetch_assoc()) {
                    $_SESSION['aux']=$row["idusuario"];
                    echo "<B>Id usuario</B> ". $row["idusuario"] . "<br><B> Nombre de usuario: </B>" .
                            $row["usr"] . "<br><B> Contraseña</B> <br>" . $row["pwd"] . 
                            "<br> <B>Nombre: </B>" .$row["nombre"] . "<br> <B>Apellido Paterno:</B> " . $row["ape_pat"] .
                            "<br> <B>Apellido Materno: </B>" . $row["ape_mat"]. "<br><B>Status: </B>" . $row["status"] . 
                            "<br>";
                    echo "<a href=ModificarUsuario.php>Modificar      </a>";
                    echo "<a href=BorrarUsuario.php>     Borrar</a><br><br><br>";
                }
            } else {
                echo "No hay usuarios";
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
