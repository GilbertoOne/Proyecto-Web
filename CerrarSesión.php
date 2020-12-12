<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cerrar Sesión</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    
    <body id="cuerpo">
         <!--Banner--> 
        <div id="Banner">
            <h1 >Symphony</h1>
            <h5 >Music is the answer</h5>
        </div>
        <?php
            session_start();
            if(@$_GET['salir']==true){
                session_unset();
                session_destroy();
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo"Cerraste sesion";
                header('Location: index.php');
            }
        ?>
    </body>
</html>
