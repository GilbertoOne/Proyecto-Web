<!DOCTYPE html>

<?php
    session_start();
?>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Modificar Usuario</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    
    <body id="cuerpo">
        
        <?php
            if(@$_SESSION['autentificado']==TRUE && $_SESSION['status']==1){
        ?>
                    <!--Banner--> 
        <div id="Banner">
            <h1 >Symphony</h1>
            <h5 >Music is the answer</h5>
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
        
        <!--//Formulario para modificar un usuario-->
        <form action="MU.php" method="post" id="PanelPrincipal">
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