<!DOCTYPE html>

<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Registrarse</title>
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    
    <body id="cuerpo">
                
        <div id="Banner">
            <h1>Symphony</h1>
            <h5>Music is the answer</h5>
        </div>
        
        <?php
        $nom=$_POST['nom'];
        $ap=$_POST['ap'];
        $fn=$_POST['fechan'];
        $nomUs=$_POST['nomUs'];
        $pass=$_POST['passUs'];
        $dom=$_POST['dom'];
        $tel=$_POST['tel'];
        
            include ("ConexiónBD.php");
            $conexion = conectar();
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }
            //Sentencia para crear un nuevo usuario
            $sql = "INSERT INTO users ".
                    "VALUES (null,'$nom', sha1('$pass'), '$nomUs', null, '$ap', '$fn', '$tel', '$dom', null)";           
            echo "<p>";
            
            echo "<p>";
            if ($conexion->query($sql) == TRUE) {
                echo "<div id='PanelPrincipal'>";
                echo "Usuario creado con éxito <br>";
                echo "<a href=index.php>Inicio  </a>";
                echo "<a href=IniciarSesión.php>   Iniciar Sesión</a>";
                echo "</div>";
            } else {
                echo "<div id='PanelPrincipal'";
                echo "Error: " . $sql . "<br>" . $conexion->error;
                echo "<div>";
            }
            
            mysqli_close($conexion);
        ?>
    </body>
</html>
