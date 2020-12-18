<!DOCTYPE html>

<?php
    session_start();
?>
<html>
  
    <head>
        <meta charset="UTF-8">
        <title>Modificar Producto</title>
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
        if ($_SESSION['status'] == 1){
                ?>
                    <div id="AdminUsrBtn" style="cursor:pointer;" onclick="location.href='VerUsuarios.php'">
                       <B>Administrar Usuarios</B>
                   </div>
            
                    <!--//Botón de agregar producto-->
                    <div id="AdminProdBtn" style="cursor:pointer;" onclick="location.href='FormAP.php'">
                        <B>Agregar productos</B>
                    </div> 
            <?php
                }
            ?>
        </div>
        <!--/Botonera-->
        <div id="PanelPrincipal">
        <!--//Formulario para agregar tema-->
        <TABLE CELLSPACING=1 CELLPADDING=2  WIDTH=100% >
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
                    <input name='desc' type='text' id='desc' size='30' maxlength='799'></td>
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
                    <td><input type="submit" value="Modificar datos"></td>
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
            </BR>
        </div>
    </body>
</html>
