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
        <title>Correo</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body>
        <?php
            if(@$_SESSION['autentificado']==TRUE){
        ?>
        <?php
        // put your code here
        $idu=$_SESSION['idusuario'];
        $nomu=$_SESSION['nomUs'];
        $total=$_GET["id"];
        $para      = 'symphonymg2000@gmail.com';
        $asunto    = 'Compra realizada';
        $descripcion   = 'Se realizó una compra'
                . '<html>
                    <head>
                      <title>Datos de la compra</title>
                    </head>
                    <body>
                      <B>ID Cliente: </B>' . $idu .
                      '<br><B>Nombre: </B>' . $nomu .
                      '<br><B>Total: </B>' . $total .
                    '</body>
                    </html>';
        
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }
            //Sentencia de consulta SQL
            $total=0;
            
            $sql1 = "SELECT * FROM carrito";
            $resul = $conexion->query($sql1);
            if($resul->num_rows > 0) {
                while($rowx = $resul->fetch_assoc()) {
                    $descripcion .= '<br><B> Cantidad: </B>' . $rowx["cantidad"] . '<br>';
            
            $sql = "SELECT * FROM productos WHERE id_productos = " .$rowx["id_productos"];
            $result = $conexion->query($sql);
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                
                while($row = $result->fetch_assoc()) {
                    $descripcion .= '<B>Nombre: </B>' . $row["producto"] .
                                    '<br><B>Precio: </B>' . $row["precio"] . '<br>';
                    $total += $row["precio"]*$rowx["cantidad"];
        ?>
            
        <?php
            }} }
            ?>
            <?php
                } 
            else {
                echo "No hay productos aún en el carrito";
            }    
            
            
            $descripcion   .= ''
                . '<html>
                    <head>
                    </head>
                    <body>
                      <br><B>Total: </B>' . $total .
                    '</body>
                    </html>';
     
        $de =   'MIME-Version: 1.0' . "\r\n";
        $de .=   'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $de .=   'From: symphonymg2000@gmail.com';
        
        if (mail($para, $asunto, $descripcion, $de))
           {
        echo "Compra realizada con éxito";
        //include ("ConexiónBD.php");
            //$conexion = conectar();
            $sql = "DELETE from carrito";
            $result = $conexion->query($sql);
            mysqli_close($conexion);
        }
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
