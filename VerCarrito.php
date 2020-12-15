
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
                    echo "<br><B> Cantidad: </B>" . $rowx["cantidad"] . "<br>";
            
            $sql = "SELECT * FROM productos WHERE id_productos = " .$rowx["id_productos"];
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
                    $total += $row["precio"]*$rowx["cantidad"];
        ?>
            
            <img src="data:<?php echo $mime ?>;base64,<?php echo base64_encode($imagen['binario']); ?>" width="250" height="250">
            <br>
            <br>
            <br>
            <br>
            <br>
            
        <?php
            }} }
            
            echo "<br><B> Total: $total";
            ?>
            <div style="cursor:pointer; left:300px; " onclick="location.href='EnvíoCorreo.php'" id="EstiloBotones">
                    Comprar
            </div>
            <?php
                } 
            else {
                echo "No hay productos aún en el carrito";
            }    
            mysqli_close($conexion);
        ?>
        </div>
        
        
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