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
        <title>Inicio de Sesión</title>
        <Link rel="stylesheet" href="Estilo.css">
    </head>
    <body style="text-align: center; font-size: 18pt">
        <h1 style="font-size: 35pt">Tienda xd</h1>
        <?php
        include ("ConexiónBD.php");
            $conexion = conectar();
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }
            if($_POST)
            {
                if(@$_SESSION['autentificado']!=TRUE)
                {   //Consulta para verificar usuario
                    $sql = "SELECT * FROM users
                            WHERE email = '" . ($_POST['nomUs']) . "'
                    AND
                        password = '" . sha1($_POST['passUs']) . "'";
                         
                    $resultado = $conexion->query($sql);
                    if(!$resultado)
                    {
                        echo 'Ocurrió un error, intenta nuevamente';
                    }
                    else
                    {
                        if($resultado->num_rows == 0)
                        {
                            echo 'Usuario o contraseña incorrecta, intenta nuevamente';
                        }
                        else
                        {
                            //Declara variables de sesión del usuario
                           $_SESSION['autentificado'] = TRUE;
                           $row = $resultado->fetch_assoc(); 
                           $_SESSION['idusuario']=$row["user_id"];
                           $_SESSION['nomUs'] = $row["nombre"];
                           $_SESSION['status'] = $row["admin"];
                           echo 'Bienvenido, ' . $_SESSION['nomUs'] . '. <a href="index.php">Regresar a inicio</a>.';
                                
                        }
                    }
                }
            }
        ?>
        
    </body>
</html>
