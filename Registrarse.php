<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrarse</title>
        <Link rel="stylesheet" href="Estilo.css">
    </head>
    <body>
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
        <h1 style="font-size: 35pt">Tienda xd</h1>
        <!--//Formulario para registrar nuevo usuario-->
        <form action="R.php" method="post" style="text-align: center; font-size: 18pt">
            Nombre(s): <input type="text" name="nom"> <br> <br>
            Apellido Paterno: <input type="text" name="ap"> <br> <br>
            Apellido Materno: <input type="text" name="am"> <br> <br>
            Email: <input type="text" name="nomUs"> <br> <br>
            Contraseña: <input type="password" name="passUs"> <br> <br>
            Domicilio: <input type="text" name="dom"> <br> <br>
            Teléfono: <input type="text" name="tel"> <br> <br>
            <input type="submit" value="Enviar">
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
