<!DOCTYPE html>

<?php
    session_start();
?>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">   
    </head>
    
    <body id="cuerpo">
        
        <!--Banner--> 
        <div id="Banner">
            <h1 >Symphony</h1>
            <h5 >Music is the answer</h5>
        </div>
        
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
                        echo "<div id='PanelPrincipal'>";
                        echo 'Ocurrió un error, intenta nuevamente';
                        echo "</div>";
                    }
                    else
                    {
                        if($resultado->num_rows == 0)
                        {
                            echo "<div id='PanelPrincipal'>";
                            echo 'Usuario o contraseña incorrecta, intenta nuevamente';
                            echo "</div>";
                        }
                        else
                        {
                            //Declara variables de sesión del usuario
                           $_SESSION['autentificado'] = TRUE;
                           $row = $resultado->fetch_assoc(); 
                           $_SESSION['idusuario']=$row["user_id"];
                           $_SESSION['nomUs'] = $row["nombre"];
                           $_SESSION['status'] = $row["admin"];
                            echo "<div id='PanelPrincipal'>";
                           echo 'Bienvenido, ' . $_SESSION['nomUs'] . '.<br> <a href="index.php">Regresar a inicio</a>';
                            echo "</div>";
                        }
                    }
                }
            }
        ?>
        
    </body>
</html>
