<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function conectar(){
        //Parametros de conexión
        $servername = "localhost";
        $database = "tienda";
        $username = "Gilberto";
        $password = "Claro";

        // Crear la conexion
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Checar si se realizo la conexion 
        if(!$conn) {
            die("Error: la conexion no se realizo correctamente." .mysqli_connect_error());
        }
        //echo "conexion correcta";
        echo "<p>";
        $cbd = mysqli_select_db($conn, $database);
        if (!$cbd) {
            die("ERROR DE CONEXION CON LA BASE DE DATOS");
        }
        return($conn);
    }
?>

