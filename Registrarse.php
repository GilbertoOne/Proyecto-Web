<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Registrarse</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    
    <body id="cuerpo">
        
            <div id="Banner">
            <h1 >Symphony</h1>
            <h5 >Music is the answer</h5>
        </div>
        
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
        
        
        <!--//Formulario para registrar nuevo usuario-->
        <form action="R.php" method="post" id="PanelPrincipal">
            Nombre(s): <input type="text" name="nom" required> <br> <br>
            Apellidos: <input type="text" name="ap" required> <br> <br>
            Fecha de nacimiento:<input type="date" name="fechan" required> <br> <br>
            Email: <input type="email" name="nomUs" required> <br> <br>
            Contraseña: <input type="password" name="passUs" required> <br> <br>
            Domicilio: <input type="text" name="dom" required> <br> <br>
            Teléfono: <input type="tel" name="tel" required> <br> <br>
            <input type="submit" value="Enviar Datos">
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
