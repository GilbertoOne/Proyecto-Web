<?php
session_start();

$idpro=$_GET['id'];
$cant=$_POST['cantidad'];

 include ("ConexiónBD.php");
            $conexion = conectar();
            if(!$conexion){
                echo "ERROR";
            }else{
                
            }//Actualizando el usuario
            $sql = "UPDATE carrito SET cantidad = '$cant'"
                    . "WHERE id_productos = '$idpro'";  

            if ($conexion->query($sql) == TRUE) {
                echo "Cantidad agregada con éxtito";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
            }
header("Location:VerCarrito.php");