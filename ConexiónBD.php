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
function fObtenerMime($wfParamCadena){//creamos una funciÃ³n que recibira un parametro en este caso la extensiÃ³n del archivo
    $fsExtension = $wfParamCadena;	
    if  ($fsExtension =='bmp' || $fsExtension=='BMP'){ $mime = 'image/bmp'; }
    if  ($fsExtension =='gif' || $fsExtension=='GIF'){ $mime ='image/gif' ; }
    if  ($fsExtension =='jpe' || $fsExtension=='JPE'){ $mime ='image/jpe' ; }
    if  ($fsExtension =='jpeg' || $fsExtension=='JPEG'){ $mime = 'image/jpeg' ; }
    if  ($fsExtension =='jpg' || $fsExtension =='JPG' ){ $mime ='image/jpg'; }
    if  ($fsExtension =='png' || $fsExtension=='PNG'){ $mime = 'image/png'; }    
    return $mime;//en base a su extenxiÃ³n la function retornara un tipo de mime 
}

function formatearfecha($fecha){
    return date('g: i a', strtotime($fecha));
}
?>

