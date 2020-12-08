<?php
include ("ConexiónBD.php");
$conexion = conectar();
function fObtenerMime($wfParamCadena){//creamos una funciÃ³n que recibira un parametro en este caso la extensiÃ³n del archivo
    $fsExtension = $wfParamCadena;	
    if  ($fsExtension =='bmp'){ $mime = 'image/bmp'; }
    if  ($fsExtension =='gif' ){ $mime ='image/gif' ; }
    if  ($fsExtension =='jpe' ){ $mime ='image/jpeg' ; }
    if  ($fsExtension =='jpeg'){ $mime = 'image/jpeg' ; }
    if  ($fsExtension =='jpg' || $fsExtension =='JPG' ){ $mime ='image/jpeg'; }
    if  ($fsExtension =='png' ){ $mime = 'image/png'; }    
    return $mime;//en base a su extenxiÃ³n la function retornara un tipo de mime 
}
 
 
	#$idImagen = $_GET['id']; //Recuperamos el prametro que contiene el id de la imagen que vamos a consultar.
	
	$result = mysqli_query($conexion,"Select * from imagenes where id_productos = 1");//Realizamos una consulta a la imagen seleccionada
        $imagen =  mysqli_fetch_assoc($result);//recuperamos los registros de la consulta
            $mime = fObtenerMime($imagen['extension']);//Obtenemos el mime del archivo.
	$contenido = $imagen['binario'];//Obtenemos el contenido almacenado en el campo Binario.
	#header("Content-type:$mime");//le indicamos al navegador que tipo de informaciÃ³n mostraremos.
	#print $imagen['binario']; //Imprimimos el contenido.
        echo "$mime";
        ?> <img src="data:image/jpg;base64,<?php echo base64_encode($imagen['binario']); ?>"><?php
	
	
	mysqli_close($conexion);//cerramos la conexión