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
        <title>Modificar Usuario</title>
        <Link rel="stylesheet" href="Estilo.css">
    </head>
    <body>
        <h1 style="font-size: 35pt">Tienda xd</h1>
        <?php
            if(@$_SESSION['autentificado']==TRUE && $_SESSION['status']==1){
        ?>
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
        <div style="position: absolute; background-color: #F7371C; 
                        width: 200px; left: 50px; top: 250px; font-size: 18pt;
                        text-align: center;">

                       <a href="VerUsuarios.php"><B>Administrar Usuarios</B></a> 

        </div>
        
        <div style="position: absolute; background-color: #D7AB09; 
             width: 200px; left: 50px; top: 350px; font-size: 18pt;
             text-align: center;">
            <?php
            echo "<B>¡Hola! " .$_SESSION['nomUs']."</B>" 
            ?>
        </div>
        <!--//Formulario para modificar un usuario-->
        <form action="MU.php" method="post" style="text-align: center">
            Nombre(s): <input type="text" name="nom"> <br> <br>
            Apellidos: <input type="text" name="ap"> <br> <br>
            Fecha de nacimiento:<input type="date" name="fechan"> <br> <br>
            Email: <input type="text" name="nomUs"> <br> <br>
            Contraseña: <input type="password" name="passUs"> <br> <br>
            Domicilio: <input type="text" name="dom"> <br> <br>
            Teléfono: <input type="text" name="tel"> <br> <br>
            Status: <input type="text" name="status"> <br> <br>
            <input type="submit" value="Enviar">
        </form>
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