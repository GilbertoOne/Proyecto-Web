<!DOCTYPE html>

<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Symphony</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body>
        <!--//Autentificación-->
        <?php
            if(@$_SESSION['autentificado']==TRUE){
        ?>
        <h1 style="font-size: 35pt">Symphony</h1>
        
        <!--//Botón de inicio-->
        <div style="position: absolute;background-color: #97F267; 
             width: 200px; left: 50px; top: 100px; font-size: 18pt;
             text-align: center;">
             
            <a href="index.php"><B>Inicio</B></a>
	
        </div>
        <!--//Botón de cerrar sesión-->
        <div style="position: absolute;background-color: #85A8F6; 
             width: 200px; left: 50px; top: 150px; font-size: 18pt;
             text-align: center;">
            
            <a href="CerrarSesión.php?salir=true"><B>Cerrar Sesión</B></a> 
	
        </div>
 
        <!--//Botón de buscar-->
        <div style="position: absolute; background-color: rgb; 
             width: 200px; left: 50px; top: 550px; font-size: 18pt;
             text-align: center;">
            
            <B>Buscar productos</B>
            <form action="Buscar.php" method="post" style="text-align: center;font-size: 18pt">
            <input type="text" name="tema" size="15"> <br>
            <input type="submit" value="Enviar">
            </form>
	
        </div>
        
        <div style="position: absolute; background-color: #D7AB09; 
             width: 200px; left: 50px; top: 350px; font-size: 18pt;
             text-align: center;">
            <?php
            echo "<B>¡Hola! " .$_SESSION['nomUs']."</B>" 
            ?>
        </div>
        
        <?php
        if ($_SESSION['status'] == 1){
                ?>
                    <div style="position: absolute; background-color: #F7371C; 
                        width: 200px; left: 50px; top: 250px; font-size: 18pt;
                        text-align: center;">

                       <a href="VerUsuarios.php"><B>Administrar Usuarios</B></a> 

                   </div>
                    <!--//Botón de agregar producto-->
                    <div style="position: absolute; background-color: #F685BF; 
                         width: 200px; left: 50px; top: 200px; font-size: 18pt;
                         text-align: center;">

                        <a href="FormAP.php"><B>Agregar productos</B></a> 

                    </div>
            <?php
                }
            ?>
        
        <div style="position: absolute; background-color: khaki;
             left: 300px; top: 100px; text-align: center; font-size: 18pt">
        
        <?php
        // put your code here
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }
            //Sentencia de consulta SQL
            $sql = "SELECT * FROM productos";
            $result = $conexion->query($sql);
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                
                while($row = $result->fetch_assoc()) {
                    
                    $result1 = mysqli_query($conexion,"Select * from imagenes where id_productos = ".$row["id_productos"]);
                    $imagen = $result1->fetch_assoc();
                    $mime = fObtenerMime($imagen['extension']);//Obtenemos el mime del archivo.
                    echo "<br><B> - Producto: </B>" . $row["producto"] . "<br><B> Descripción: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Categoría: </B>" .$row["categoria"] . "<br> <B>Precio: </B>" . $row["precio"] . "<br>" .
                         "<B>Fecha: </B>" .$row["fechap"] . "<br><br>";
                    ?> 
            <img src="data:<?php echo $mime ?>;base64,<?php echo base64_encode($imagen['binario']); ?>" width="250" height="250">
            <br>
            <a href="view.php"/>Comentarios</a>
            <br>
            
                    <?php
                }
            } else {
                echo "No hay productos aún en la tienda";
            }
           
            
            mysqli_close($conexion);
        ?>
        </div>
        <?php
            }
            else
            {
        ?>
         
        <h1 style="font-size: 35pt">Symphony</h1>
        
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
        
        <div style="position: absolute; background-color: rgb; 
             width: 200px; left: 50px; top: 550px; font-size: 18pt;
             text-align: center;">
            
            <B>Buscar productos</B>
            <form action="Buscar.php" method="post" style="text-align: center;font-size: 18pt">
            <input type="text" name="tema" size="15"> <br>
            <input type="submit" value="Enviar">
            </form>
	
        </div>
        
        <div style="position: absolute; background-color: khaki;
             left: 300px; top: 100px; text-align: center; font-size: 18pt">
        
        <?php
        // put your code here
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }
            //Sentencia de consulta SQL
            $sql = "SELECT * FROM productos";
            $result = $conexion->query($sql);
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                
                while($row = $result->fetch_assoc()) {
                    
                    $result1 = mysqli_query($conexion,"Select * from imagenes where id_productos = ".$row["id_productos"]);
                    $imagen = $result1->fetch_assoc();
                    $mime = fObtenerMime($imagen['extension']);//Obtenemos el mime del archivo.
                    echo "<br><B> - Producto: </B>" . $row["producto"] . "<br><B> Descripción: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Categoría: </B>" .$row["categoria"] . "<br> <B>Precio: </B>" . $row["precio"] . "<br>" .
                         "<B>Fecha: </B>" .$row["fechap"] . "<br><br>";
                    ?> 
            <img src="data:<?php echo $mime ?>;base64,<?php echo base64_encode($imagen['binario']); ?>" width="250" height="250">
            <br>
            <a href="view.php"/>Comentarios</a>
            <br>
            
                    <?php
                }
            } else {
                echo "No hay productos aún en la tienda";
            }
            
            mysqli_close($conexion);
        ?>
            
        <?php
            }
        ?>
            
        </div>   
    </body>
</html>