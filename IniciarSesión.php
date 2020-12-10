<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Iniciar Sesión</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">            
    </head>
    
    <body id="cuerpo">
        <!--Banner--> 
        <div id="Banner">
            <h1 >Symphony</h1>
            <h5 >Music is the answer</h5>
        </div>
        
        <!--Botonera-->
        <div id="Botonera">
            <!--Btn inicio-->
            <div style="cursor:pointer;" onclick="location.href='index.php'" id="InicioBtn">
                <B>Inicio</B>
            </div>
            
            <!--Btn Sesión-->
            <div id="InicioSesionBtn" style="top:150px; cursor:pointer;" onclick="location.href='IniciarSesión.php'">
                <B>Iniciar Sesión</B> 
            </div>
        
            <!--Btn Registro-->
            <div style=" top: 200px; cursor:pointer;" id="RegistrarseBtn" onclick="location.href='Registrarse.php'">
                <B>Registrarse</B> 
            </div>
        </div>
        <!--//Formulario para iniciar sesión-->
        
            <form action="IS.php" method="post" id="PanelPrincipal">  
                
                Correo: <input type="text" name="nomUs"> 
                <br> <br>
                Contraseña: <input type="password" name="passUs" width="20"> <br> <br>
                
            <input type="submit" value="Iniciar sesión">
        </form>
        <?php
        ?>
    </body>
</html>
