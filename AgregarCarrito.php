<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    #Utilizamos session_start() para poder utilizar las variables de sesion
    #que modifiquemos o necesitemos.
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body>
        <?php
        // put your code here
        if(@$_SESSION['autentificado']==TRUE){
        include ("ConexiónBD.php");
            $conexion = conectar();
            if(!$conexion){
                echo "ERROR";
            }else{
                //Sentencia para crear un nuevo usuario
            $var=$_GET['id'];
            $cliente= $_SESSION['idusuario'];
            //$producto= $_SESSION['auxpro'];
            $sql = "INSERT INTO carrito ".
                    "VALUES ('$cliente', '$var', '1')";
            if ($conexion->query($sql) == TRUE) {
                echo 'Agregado con éxito';
                header('Location: VerCarrito.php');
                    } else {echo "Error: " . $sql . "<br>" . $conexion->error;}
            }
            
            mysqli_close($conexion);
            }else{
                echo 'Ocurrió un error en el inicio de sesión. Regresarás a la página de inicio';
                echo '<a href="index.php">Inicio</a>';
            }
        ?>
    </body>
</html>
