<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cerrar Sesión</title>
        <Link rel="stylesheet" href="Estilo.css">
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
