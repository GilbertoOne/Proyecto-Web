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
        <title>Registrarse</title>
        <Link rel="stylesheet" href="Estilo.css">
    </head>
    <body style="text-align: center">
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
        <div style="position: absolute; background-color: #F7371C; 
                        width: 200px; left: 50px; top: 250px; font-size: 18pt;
                        text-align: center;">

                       <a href="VerUsuarios.php"><B>Administrar Usuarios</B></a> 

        </div>
        
        <div style="position: absolute; background-color: #D7AB09; 
             width: 200px; left: 50px; top: 350px; font-size: 18pt;
             text-align: center;">
            <?php
            echo "<B>¡Hola! " .$_SESSION['nomUs']."</B>" 
            ?>
        </div>
        
        <?php
        // Paso de datos para editar usuario
        if(@$_SESSION['autentificado']==TRUE && $_SESSION['status']==1){
        $nom=$_POST['nom'];
        $ap=$_POST['ap'];
        $am=$_POST['am'];
        $nomUs=$_POST['nomUs'];
        $pass=$_POST['passUs'];
        $status=$_POST['status'];
        $idusu=$_SESSION['aux'];
        $dom=$_SESSION['dom'];
        $tel=$_SESSION['tel'];
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
                echo "Usuario modificado con éxito <br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
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
