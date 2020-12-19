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
    <body id="cuerproducto">
        <div id="Banner">
            <h1>Symphony</h1>
            <h5>Music is the answer</h5>
        </div>
        
        <!--Botonera-->
        <div id="Botonera">
        
            <!--//Botón de inicio-->
        <div style="cursor:pointer;" onclick="location.href='index.php'" id="InicioBtn">
                <B>Inicio</B>
        </div> 
            
        <div style="cursor:pointer;" onclick="location.href='VerCarrito.php'" id="CarritoBtn">
                <B>Carrito</B>
        </div> 
        
        <!--//Botón de cerrar sesión-->
        <div id="InicioSesionBtn" style="top:150px; cursor:pointer;" onclick="location.href='CerrarSesión.php?salir=true'">
                <B>Cerrar Sesión</B> 
            </div>
        <?php
        if ($_SESSION['status'] != 1){
                ?>
        <div style=" cursor:pointer;" onclick="location.href='Chat.php'" id="Chatbtn">
                <B>Chat</B>
            </div>  
        
            
        <div style=" cursor:pointer;" onclick="location.href='AvisosUsu.php'" id="Avbtn">
                <B>Avisos</B>
            </div>
        <?php
                }
            ?>
 
        <!--//Botón de buscar-->
<!--Slide de busqueda-->
            <script>
                $(document).ready(function(){
                    $("#TextoB").click(function(){
                        $("#Searcher").slideDown("slow");})
                })
            </script>
            
            <div style="top: 350px" id="BuscadorProdBtn">
                <B id="TextoB">Buscador de productos</B>
                <form action="Buscar.php" method="post" id="Searcher">
                    <input type="search" name="tema" size="15" required> <br>
                    <input type="submit" value="Buscar">
                </form>
            </div>
        
        <div style="position: absolute; width: 200px; left: 50px; top: 40px; font-size: 18pt; text-align: center; color:white;">
            <?php
            echo "<B>¡Hola, " .$_SESSION['nomUs']."!</B>" 
            ?>
        </div>
        
        <?php
        if ($_SESSION['status'] == 1){
                ?>
                    <div id="AdminUsrBtn" style="cursor:pointer;" onclick="location.href='VerUsuarios.php'">
                       <B>Administrar Usuarios</B>
                   </div>
            
                    <!--//Botón de agregar producto-->
                    <div id="AdminProdBtn" style="cursor:pointer;" onclick="location.href='FormAP.php'">
                        <B>Agregar productos</B>
                    </div> 
            <?php
                }
            ?>
        </div>
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
            
        ?>
        <script type="text/javascript">
            window.alert("Compra realizada con éxito");
        </script>
        <?php
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
