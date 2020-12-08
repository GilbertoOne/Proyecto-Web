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
        <title>ForoGil</title>
        <Link rel="stylesheet" href="Estilo.css">
    </head>
    <body>
        <?php
            if(@$_SESSION['autentificado']==TRUE){
        ?>
        <h1 style="font-size: 35pt">Tienda xd</h1>
        
        <div style="position: absolute;background-color: #97F267; 
             width: 200px; left: 50px; top: 100px; font-size: 18pt;
             text-align: center;">
             
            <a href="index.php"><B>Inicio</B></a>
	
        </div>
        
        <div style="position: absolute;background-color: #85A8F6; 
             width: 200px; left: 50px; top: 150px; font-size: 18pt;
             text-align: center;">
            
            <a href="CerrarSesión.php?salir=true"><B>Cerrar Sesión</B></a> 
	
        </div>
        
        <div style="position: absolute; background-color: #F685BF; 
             width: 200px; left: 50px; top: 200px; font-size: 18pt;
             text-align: center;">
            
            <a href="AgregarTema.php"><B>Agregar tema</B></a> 
	
        </div>
        <div style="position: absolute; background-color: #D7AB09; 
             width: 200px; left: 50px; top: 350px; font-size: 18pt;
             text-align: center;">
            <?php
            echo "<B>¡Hola! " .$_SESSION['nomUs']."</B>" 
            ?>
        </div>
        
        <div style="position: absolute; background-color: khaki;
             left: 300px; top: 100px; text-align: center; font-size: 18pt">
        
        <?php
        $var=$_GET['id'];
        $_SESSION['aux']=$var;
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                //echo "Conn ok<BR>";
            }
            //Sentencia de consulta SQL
            $sql = "SELECT * FROM productos WHERE id_productos =  $var";
            $sql1 = "SELECT * FROM comentarios WHERE id_productos =  $var";
            $result = $conexion->query($sql);
            $result1 = $conexion->query($sql1);
            
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row = $result->fetch_assoc()) {
                    $result2 = mysqli_query($conexion,"Select * from imagenes where id_productos = ".$row["id_productos"]);
                    $imagen = $result2->fetch_assoc();
                    $mime = fObtenerMime($imagen['extension']);//Obtenemos el mime del archivo.
                    echo "<br><B> - Producto: </B>" . $row["producto"] . "<br><B> Descripción: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Categoría: </B>" .$row["categoria"] . "<br> <B>Precio: </B>" . $row["precio"] . "<br>" .
                         "<B>Fecha: </B>" .$row["fechap"] . "<br><br>";
                    ?> 
                <img src="data:<?php echo $mime ?>;base64,<?php echo base64_encode($imagen['binario']); ?>" width="250" height="250">
                <br><?php
                    if ($_SESSION['status']==1){
                        echo "<a href=BorrarProducto.php><B>Borrar</B></a><br><br><br>";
                    }
                }
            } else {
                echo "No hay productos aún en la tienda";
            }
            
           if($result1->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row1 = $result1->fetch_assoc()) {
                    echo "<br><B> - Comentario </B><br><B> De: </B>" . $row1["user_id"] .
                           "<br>". $row1["contenido"] . "<br> <B>Fecha: </B>" .$row1["fechac"] . 
                            "<br>";
                    
                    if ($_SESSION['status']==1){
                        $_SESSION['aux']=$row1["id_comentario"];
                        echo "<a href=BorrarComentario.php><B>Borrar</B></a><br>";
                    }
                }
            } else {
                echo "No hay comentarios";
            }
            
            mysqli_close($conexion);
        ?>
                <form action="AC.php" method="post" style="text-align: center">
                Comentar: <br><br><textarea name="respuesta" cols="75" rows="5"></textarea> <br> <br>
                <input type="submit" value="Enviar">
            </form>
        <?php
            }
            else
            {
        ?>
         
        <h1 style="font-size: 35pt">FOROGIL</h1>
        
        <div style="position: absolute;background-color: #97F267; 
             width: 200px; left: 50px; top: 100px; font-size: 18pt;
             text-align: center;">
            
            <a href="index.php"><B>Inicio</B></a>
	
        </div>
        
        <div style="position: absolute;background-color: #85A8F6; 
             width: 200px; left: 50px; top: 150px; font-size: 18pt;
             text-align: center;">
            
            <a href="IniciarSesión.php"><B>Iniciar Sesión</B></a> 
	
        </div>
        
        <div style="position: absolute; background-color: #F685BF; 
             width: 200px; left: 50px; top: 200px; font-size: 18pt;
             text-align: center;">
            
            <a href="Registrarse.php"><B>Registrarse</B></a> 
	
        </div>
        
        <div style="position: absolute; background-color: khaki;
             left: 300px; top: 100px; text-align: center; font-size: 18pt">
        
        <?php
        // put your code here
         $var=$_GET['id'];
        $_SESSION['aux']=$var;
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                //echo "Conn ok<BR>";
            }
            //Sentencia de consulta SQL
            $sql = "SELECT * FROM productos WHERE id_productos =  $var";
            $sql1 = "SELECT * FROM comentarios WHERE id_productos =  $var";
            $result = $conexion->query($sql);
            $result1 = $conexion->query($sql1);
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row = $result->fetch_assoc()) {
                    echo "<br><B> - Producto: </B>" . $row["producto"] . "<br><B> Descripción: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Categoría: </B>" .$row["categoria"] . "<br> <B>Precio: </B>" . $row["precio"] . "<br>" .
                         "<B>Fecha: </B>" .$row["fechap"] . "<br><br>";
                    ?> 
                <img src="data:<?php echo $mime ?>;base64,<?php echo base64_encode($imagen['binario']); ?>" width="250" height="250">
                <br><?php
                    
                }
            } else {
                echo "No hay productos aún en la tienda";
            }
            
           if($result1->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row1 = $result1->fetch_assoc()) {
                    echo "<br><B> - Comentario </B><br><B> De: </B>" . $row1["user_id"] .
                           "<br>". $row1["contenido"] . "<br> <B>Fecha: </B>" .$row1["fechac"] . 
                            "<br>";
                    
                    
                }
            } else {
                echo "No hay comentarios";
            }
            
            mysqli_close($conexion);
        ?>
            
        <?php
            }
        ?>
            
        </div>   
    </body>
</html>
