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
        <title>Modificar Producto</title>
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
        
        <div style="position: absolute; background-color: #D7AB09; 
             width: 200px; left: 50px; top: 350px; font-size: 18pt;
             text-align: center;">
            <?php
            echo "<B>¡Hola! " .$_SESSION['nomUs']."</B>" 
            ?>
        </div>
        <!--//Formulario para agregar tema-->
        <TABLE CELLSPACING=1 CELLPADDING=2  WIDTH=100%>
                <th>
        </th></TABLE><BR>
        <div id="form4">
    
            <form name='form1' method='POST' enctype="multipart/form-data" action='MP.php'>
            <table border='1' align='center'>
                <tr>
                    <td>Nombre del producto:
                    <input name='nomp' type='text' id='nomp' size='30' maxlength='30'></td>
                </tr>
                <tr>
                    <td>Descripcion:
                    <input name='desc' type='text' id='desc' size='30' maxlength='30'></td>
                </tr>
                <tr>
                    <td>Precio:
                    <input name='precio' type='text' id='precio' size='30' maxlength='30'></td>
                </tr>
                <tr>
                    <td>Categoria:
                    <input name='cat' type='text' id='cat' size='30' maxlength='30'></td>
                </tr>
                <tr>
                    <td>Imagen: 
                    <input type="file" name="miArchivo"></td>
                </tr> 
                <tr>
                    <td><input type="submit" value="Enviar"></td>
                </tr>
            </table>
        </form>
        </div>
            <div id="botonvolver"><a href="index.php">&nbsp;Volver</a></div>
        
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
