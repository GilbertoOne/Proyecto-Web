<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrarse</title>
        <Link rel="stylesheet" href="Estilo.css">
    </head>
    <body style="text-align: center;font-size: 18pt">
        <h1 style="font-size: 35pt">FOROGIL</h1>
        <?php
        // put your code here
        $nom=$_POST['nom'];
        $ap=$_POST['ap'];
        $am=$_POST['am'];
        $nomUs=$_POST['nomUs'];
        $pass=$_POST['passUs'];
            include ("ConexiónBD.php");
            $conexion = conectar();
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }
            //Sentencia para crear un nuevo usuario
            $sql = "INSERT INTO usuario ".
                    "VALUES (null,'$nomUs', sha1('$pass'), '$nom', '$ap', '$am',null)";           
            echo "<p>";
            
            echo "<p>";
            if ($conexion->query($sql) == TRUE) {
                echo "Usuario creado con éxito <br>";
                echo "<a href=index.php>Inicio  </a>";
                echo "<a href=IniciarSesión.php>   Iniciar Sesión</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
            
            mysqli_close($conexion);
        ?>
    </body>
</html>