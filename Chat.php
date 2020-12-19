<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    //$var=$_GET['id'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chat</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
        <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@200&display=swap" rel="stylesheet">
        <script type="text/javascript">
            function ajax(){
                var req = new XMLHttpRequest();
                
                req.onreadystatechange = function(){
                    if (req.readyState == 4 && req.status == 200){
                        document.getElementById('chat').innerHTML = req.responseText;
                    }
                }
                
                req.open('GET', 'Ch.php',true);
                req.send();
            }
            
            setInterval(function(){ajax();}, 1000);
            
        </script>
    </head>
    <?php
            if(@$_SESSION['autentificado']==TRUE){
        ?>
    
    <body onload="ajax();" id="cuerpo">
        <div id="Banner" style="height: 80px;">
            <h1>Symphony</h1>
            
        </div>
        <div style="position: absolute; top:90px; left:400px;" id="contenedor">
            
            <div id="caja-chat">
                <div id="chat"></div>
            </div>
            <form method="POST" action="Chat.php">
                <textarea name="mensaje" placeholder="Ingresa tu mensaje" required></textarea>
                <input type="submit" name="enviar" value="Enviar">
            </form>
            <?php
            include ("ConexiónBD.php");
            $conexion = conectar();
                if (isset($_POST['enviar'])){
                    if ($_SESSION['status'] == 1){
                    $nombre = $_SESSION['nomUs'];
                    //$id = $_GET['user_id'];
                    $var=$_GET['id'];
                    $id = $_SESSION['auxidcliente'];
                    $mensaje = $_POST['mensaje'];
                    $sql = "INSERT INTO chat (user_id, mensaje, aux) VALUES ('$var', '$mensaje', 1)";
                    $result = $conexion->query($sql);
                    }else{
                    $nombre = $_SESSION['nomUs'];
                    $id = $_SESSION['idusuario'];
                    $mensaje = $_POST['mensaje'];
                    $sql = "INSERT INTO chat (user_id, mensaje) VALUES ('$id', '$mensaje')";
                    $result = $conexion->query($sql);
                    }
                }
            ?>
        </div>
        
        <div style="cursor:pointer;" onclick="location.href='index.php'" id="InicioBtn">
                <B>Inicio</B>
        </div> 
        <?php
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
