<!DOCTYPE html>

<?php
    session_start();
    $var=$_GET['id'];
    $_SESSION['auxidcliente'] = $var;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrarse</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    <body id="cuerpo">
        
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
        
        <?php
        // Paso de datos para editar usuario
        if(@$_SESSION['autentificado']==TRUE && $_SESSION['status']==1){
        $nom=$_POST['nom'];
        //$nom= mysqli_escape_string($conexion, $nom);
        $ap=$_POST['ap'];
        //$ap= mysqli_escape_string($conexion, $ap);
        $nomUs=$_POST['nomUs'];
        $pass=$_POST['passUs'];
        //$pass= mysqli_escape_string($conexion, $pass);
        $status=$_POST['status'];
       // $status= mysqli_escape_string($conexion, $status);
        $idusu=$_SESSION['auxidcliente'];
        $dom=$_POST['dom'];
        //$dom= mysqli_escape_string($conexion, $dom);
        $tel=$_POST['tel'];
        //$tel=mysqli_escape_string($conexion, $tel);
        $fn=$_POST['fechan'];
            include ("ConexiónBD.php");
            $conexion = conectar();
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }//Actualizando el usuario
            $sql = "UPDATE users SET email = '$nomUs', password = sha1('$pass'), nombre = '$nom',".
                    "apellido = '$ap', admin = '$status', telefono = '$tel', domicilio = '$dom', fechan = '$fn'"
                    . "WHERE user_id = '$idusu'";           
            echo "<p>";
            
            echo "<p>";
            if ($conexion->query($sql) == TRUE) {
                echo"<div id='PanelPrincipal'>";
                echo "Usuario modificado con éxito <br>";
                echo"</div>";
            } else {
                echo"<div id='PanelPrincipal'>";
                echo "Error: " . $sql . "<br>" . $conexion->error;
                echo"</div>";
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
    </body>
</html>
