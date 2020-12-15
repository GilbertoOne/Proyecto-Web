<!DOCTYPE html>

<?php
    session_start();
    $var=$_GET['id'];
    $_SESSION['auxidcliente'] = $var;
?>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Avisos</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    
    <body id="cuerpo">
        <?php
            if(@$_SESSION['autentificado']==TRUE && $_SESSION['status']==1){
        ?>
        <!--Banner--> 
        <div id="Banner">
            <h1 >Symphony</h1>
            <h5 >Music is the answer</h5>
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
            }else{
                
            }
            //Sentencia de consulta SQL
            $id = $_SESSION['auxidcliente'];
            $sql = "SELECT * FROM users WHERE user_id = $id";
            
            $result = $conexion->query($sql);
            
            if($result->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                while($row = $result->fetch_assoc()) {
                    $_SESSION['aux']=$row["user_id"];
                    $_SESSION['auxidcliente']=$row["user_id"];
                    $_SESSION['auxnomcliente']=$row["nombre"];
                    echo "<B>Id usuario</B> ". $row["user_id"] . "<br><B> Email: </B>" .
                            $row["email"] . "<br><B> Contraseña</B> <br>" . $row["password"] . 
                            "<br> <B>Nombre: </B>" .$row["nombre"] . "<br> <B>Apellidos:</B> " . $row["apellido"] .
                            "<br><B>Status: </B>" . $row["admin"] . "<br> <B>Fecha de nacimiento:</B> " . $row["fechan"] .
                            "<br> <B>Teléfono: </B>" . $row["telefono"]. "<br><B>Dirección: </B>" . $row["domicilio"] .
                            "<br>";
                    
                    
                    $cat = $row["gustos"];
                    $sqlpro = "SELECT * FROM productos WHERE categoria = '$cat' ";
                    $resultpro = $conexion->query($sqlpro);
            
            if($resultpro->num_rows > 0) {
                //Recorremos cada registro y obtenemos los valores de las columnas especificadas
                
                while($rowpro = $resultpro->fetch_assoc()) {
                    
                    $result1 = mysqli_query($conexion,"Select * from imagenes where id_productos = ".$rowpro["id_productos"]);
                    $imagen = $result1->fetch_assoc();
                    $mime = fObtenerMime($imagen['extension']);//Obtenemos el mime del archivo.
                    echo "<br><B> Producto: </B>" . $rowpro["producto"] . "<br><B> Descripción: </B><br>" . $rowpro["descripcion"] . 
                         "<br> <B>Categoría: </B>" .$rowpro["categoria"] . "<br> <B>Precio: </B>" . $rowpro["precio"] . "<br>" .
                         "<B>Fecha: </B>" .$rowpro["fechap"] . "<br><br>";
                ?> 
            <img src="data:<?php echo $mime ?>;base64,<?php echo base64_encode($imagen['binario']); ?>" width="250" height="250">
            <br>
            <div style="cursor:pointer; left:100px;" onclick="location.href='Sugerencia.php?id=<?php echo $rowpro["id_productos"]?>'" id="EstiloBotones">Enviar</div>
            <?php
                }
            } else {
                echo 'No hay gustos';
            }
            ?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php
                }
            } else {
                echo "No hay usuarios";
            }
            
            
            mysqli_close($conexion);
        ?>
        
        <?php
        // put your code here
        }
            else
            {
        ?>
        
        <p>Ocurrió un error en el inicio de sesión. Regresaras a la página de inicio</p>
        <a href="index.php">Inicio</a>
        
            <?php
            }
        ?>
        </div>
    </body>
</html>
