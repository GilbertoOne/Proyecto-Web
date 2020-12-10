<!DOCTYPE html>

<?php
    session_start();
?>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Symphony</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
        
        <!--Para botones deslizantes-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
    </head>
    
    <body id="cuerpo">
        <!--//Autentificación-->
        
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
        
        <div id="productos">
        
        <?php
        include ("ConexiónBD.php");
            $conexion = conectar();
            
            if(!$conexion){
                echo "ERROR";
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
                    echo "<br><B> Producto: </B>" . $row["producto"] . "<br><B> Descripción: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Categoría: </B>" .$row["categoria"] . "<br> <B>Precio: </B>" . $row["precio"] . "<br>" .
                         "<B>Fecha: </B>" .$row["fechap"] . "<br><br>";
        ?>
            
            <img src="data:<?php echo $mime ?>;base64,<?php echo base64_encode($imagen['binario']); ?>" width="250" height="250">
            <br>
            <a href="Producto.php?id=<?php echo $row["id_productos"]?>">Comentarios</a><br><br><br>

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
        <!--Banner--> 
        <div id="Banner">
            <h1 >Symphony</h1>
            <h5 >Music is the answer</h5>
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
        <!--Productos-->
        <div id="productos" >
        
        <?php
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
                    echo "<br><B> Producto: </B>" . $row["producto"] . "<br><B> Descripción: </B><br>" . $row["descripcion"] . 
                         "<br> <B>Categoría: </B>" .$row["categoria"] . "<br> <B>Precio: </B>" . $row["precio"] . "<br>" .
                         "<B>Fecha: </B>" .$row["fechap"] . "<br><br>";
                ?> 
            <img src="data:<?php echo $mime ?>;base64,<?php echo base64_encode($imagen['binario']); ?>" width="250" height="250">
            <br>

            <a href="Producto.php?id=<?php echo $row["id_productos"]?>">Comentarios</a><br><br><br>

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
        
        <!--BotoneraProductos-->
<!--Gil: Agregar el nombre de la página de los productos que funciona para albumes e instrumentos. Sustituye las xXx. Grasias -->        
        <div id="UnderBannerButtons">
            <div id="AlbumsBtn"   style="cursor:pointer;" onclick="location.href='xXx.php'">
                <b>Albums</b>
            </div>
            <div id="InstrumentBtn"   style="cursor:pointer;" onclick="location.href='xXx.php'">
                <b>Instrumentos</b>
            </div>
        </div>
    </body>

</html>