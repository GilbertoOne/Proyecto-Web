<?php
    #Utilizamos session_start() para poder utilizar las variables de sesion
    #que modifiquemos o necesitemos.
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Estilo.css">
    </head>
    
    <body id="cuerpo">    
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
            <!-- Estilo header -->    
            <div >
                
                <TABLE CELLSPACING=1 CELLPADDING=2  WIDTH=100%>
                    <th>
                        
            <?php if(@$_SESSION['autentificado']==FALSE){ ?>
            <?php } else { ?>
   
        <?php    
            if(@$_SESSION['admin']){
             ?>
        
        <?php
            }
            }
            ?> </th></TABLE></div><BR>
        <div>
    
        <form name='form1' method='POST' enctype="multipart/form-data" action='AgregarProducto.php'>
            <table align='center'  style= "background: rgba(0,0,0,.09);">
                <tr>
                    <td>Nombre del producto:
                    <input name='nomp' type='text' id='nomp' size='30' maxlength='30'></td>
                </tr>
                <tr>
                    <td>Descripcion:
                    <input name='desc' type='text' id='desc' size='30' maxlength='30'></td>
                </tr>
                <tr>
                    <td>Precio:
                    <input name='precio' type='text' id='precio' size='30' maxlength='30'></td>
                </tr>
                <tr>
                    <td>Categoria:
                    <input name='cat' type='text' id='cat' size='30' maxlength='30'></td>
                </tr>
                <tr>
                    <td>Imagen: 
                    <input type="file" name="miArchivo"></td>
                </tr> 
                <tr>
                    <td align="center"><input type="submit" value="Agregar producto"></td>
                </tr>
            </table>
        </form>
        </div>
            </BR>
        </div>
    </body>
</html>