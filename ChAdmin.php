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
        <title></title>
    </head>
    <body>
        <?php
            if(@$_SESSION['autentificado']==TRUE){
        ?>
        <?php
                    // put your code here
                    include ("ConexiónBD.php");
                    $conexion = conectar();

                    if(!$conexion){
                            echo "ERROR";
                        }else{
                            //echo "Conn ok<BR>";
                        }
                        //Sentencia de consulta SQL
                        $idcliente = $_SESSION['auxidcliente'];
                        $nomcliente = $_SESSION['auxnomcliente'];
                        $sql = "SELECT * FROM chat  WHERE user_id = $idcliente OR aux = 1 ORDER BY fecha ASC";
                        $result = $conexion->query($sql);
                        while ($fila = $result->fetch_array()):
                    ?>
                    <div id="datos-chat">
                        <span style="color: #1c62c4;"><?php if ($fila['aux']== 1){echo 'Admin';}else{ echo $_SESSION['auxnomcliente'];} ?></span>
                        <span style="color: #848484;"><?php echo $fila['mensaje']; ?></span>
                        <span style="float: right;"><?php echo formatearfecha($fila['fecha']); ?></span>
                    </div>
                    <?php
                        endwhile;
                        mysqli_close($conexion);
                    ?>
        
                    <?php
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
