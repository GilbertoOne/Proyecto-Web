<?php
    #Utilizamos session_start() para poder utilizar las variables de sesion
    #que modifiquemos o necesitemos.
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Conexion a la hoja de estilo -->
        <link rel="stylesheet" type="text/css" href="estilo.css" media="all" />
        <title></title>
    </head>
    <body>
        <!-- Contenedor de toda la pagina -->
        <div id="contenedor">
        <!-- Estilo header -->    
        <div id="header">
            <!-- Tabla de header que tambien controla que opciones debe mostrar dependiendo del estado del usuario -->
            <TABLE CELLSPACING=1 CELLPADDING=2  WIDTH=100%>
                <th>
        <!-- Mostramos Inicio de sesion en caso de que la variable de sesion autentificado sea falso (no existe un usuario en la sesion) -->
        <?php if(@$_SESSION['autentificado']==FALSE){ ?>
                <div id="botonInicio"><a href="FormInicio.php">INICIA SESION </a><br></div>
        <!-- Mostramos Cerrar sesion si una sesion ya esta iniciada -->
        <?php } else { ?>
        <div id="botoncerrar"><a href="CerrarSesion.php?salir=true">CIERRA SESION </a></div>
                <!-- Mostramos la opción Administrador de usuarios si el usuario que esta iniciado es administrador -->
        <?php    
            if(@$_SESSION['admin']){
             ?>
        <div id="botonadmin"><a href="AdminUsuarios.php">Administrador de Usuarios </a></div>
        <div id="botonadmin"><a href="AdminProductos.php">Administrador de Productos </a></div>
        <?php
            }
            }
            ?> </th></TABLE></div><BR>
        <div id="form4">
    
        <form name='form1' method='POST' enctype="multipart/form-data" action='AgregarProducto.php'>
            <table border='1' align='center'>
                <tr>
                    <td>Nombre del prodcuto:
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
                    <td><input type="submit" value="Enviar"></td>
                </tr>
            </table>
        </form>
        </div>
            <div id="botonvolver"><a href="AdminProductos.php">&nbsp;Volver</a></div>
    </div>
    </body>
</html>