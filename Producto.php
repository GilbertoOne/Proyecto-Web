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
        <title>Producto</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    
    <body id="cuerpo">
        <!--Loggeado-->
        <?php
            if(@$_SESSION['autentificado']==TRUE){
        ?>
        
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
        
        <!--//Botón de cerrar sesión-->
        <div id="InicioSesionBtn" style="top:150px; cursor:pointer;" onclick="location.href='CerrarSesión.php?salir=true'">
                <B>Cerrar Sesión</B> 
            </div>
 
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
                    <input type="text" name="tema" size="15"> <br>
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
        <!--/Botonera-->
        
        <div id="PanelPrincipal">
        
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
                <br>
                    <div style="cursor:pointer; left:410px; " onclick="location.href='AgregarCarrito.php?id=<?php echo $row["id_productos"]?>'" id="EstiloBotones">
                    Agregar al carrito
                    </div>
            <br>
            <br>
            <br>
                <?php
                
                $idusu=$_SESSION['idusuario'];
                $cat = $row["categoria"];
                 $sqlgus = "UPDATE users SET gustos = '$cat' WHERE user_id = '$idusu'"; 
                 $resultgus = $conexion->query($sqlgus);
                
                
                    $_SESSION['auxprecio']=$row["precio"];
                    if ($_SESSION['status']==1){
                        ?>
                        <div id="EstiloBotones"style="cursor:pointer; left: 200px; top:571px;" onclick="location.href='BorrarProducto.php'"><B>Borrar</B></div>
            <?php
                        $_SESSION['auxpro']=$row["id_productos"];
            ?>
                        <div id="EstiloBotones" style="cursor:pointer; left:620px; top:571px" onclick="href='ModificarProducto.php'"><B>Modificar</B></div><br><br><br>
            <?php
                    }
                }
            } else {
                echo "No hay productos aún en la tienda";
            }
            
           if($result1->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row1 = $result1->fetch_assoc()) {
                    echo "<br><B>  Comentario </B><br><B> De: </B>" . $row1["user_id"] .
                           "<br>". $row1["contenido"] . "<br> <B>Fecha: </B>" .$row1["fechac"] . 
                            "<br>";
                    
                    if ($_SESSION['status']==1){
                        $_SESSION['auxcom']=$row1["id_comentario"];
                        
                        echo "<a href='BorrarComentario.php?id=".$row1["id_comentario"]."'><B>Borrar</B></a><br>";
                        
                        ?>
            <br>
            <br>
            <br>
            <?php
                    }
                }
            } else {
                echo "No hay comentarios";
            }
            
            mysqli_close($conexion);
        ?>
            <br>
            <br>
            <br>
                <form action="AC.php" method="post" style="text-align: center">
                Comentar: <br><br><textarea name="respuesta" cols="75" rows="5"></textarea> <br> <br>
                <input type="submit" value="Enviar">
            </form>
        <?php
            }
            else
            {
        ?>
            </div>
        <div id="Banner">
            <h1>Symphony</h1>
            <h5>Music is the answer</h5>
        </div>
        
        <!--Botonera-->
        <div id="Botonera">
            <!--Btn inicio-->
            <div style="cursor:pointer;" onclick="location.href='index.php'" id="InicioBtn">
                <B>Inicio</B>
            </div>
            
            <!--Btn Sesión-->
            <div id="InicioSesionBtn" style="top:150px; cursor:pointer;" onclick="location.href='IniciarSesión.php'">
                <B>Iniciar Sesión</B> 
            </div>
        
            <!--Btn Registro-->
            <div style=" top: 200px; cursor:pointer;" id="RegistrarseBtn" onclick="location.href='Registrarse.php'">
                <B>Registrarse</B> 
            </div>
            
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
                    <input type="text" name="tema" size="15"> <br>
                    <input type="submit" value="Buscar">
                </form>
            </div>
        </div>
        
        <div id="PanelPrincipal">
        
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
                    $result2 = mysqli_query($conexion,"Select * from imagenes where id_productos = ".$row["id_productos"]);
                    $imagen = $result2->fetch_assoc();
                    $mime = fObtenerMime($imagen['extension']);//Obtenemos el mime del archivo.
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
        </div>   
        <!--No loggeado-->
        
    </body>
</html>
