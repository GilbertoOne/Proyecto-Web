<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cerrar Sesión</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    
    <body style="text-align: center">
        <h1 style="font-size: 35pt">Tienda xd</h1>
        <?php
            session_start();
            if(@$_GET['salir']==true){
                session_unset();
                session_destroy();
                echo"Cerraste sesion";
                header('Location: index.php');
            }
        ?>
    </body>
</html>
