<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Correo</title>
    </head>
    <body>
        <?php
        // put your code here
        $para      = 'pgilberto484@gmail.com';
        $asunto    = 'Correo de prueba';
        $descripcion   = 'Este es el cuerpo del correo'
                . '<html>
                    <head>
                      <title>Recordatorio de cumpleaños para Agosto</title>
                    </head>
                    <body>
                      <p>¡Estos son los cumpleaños para Agosto!</p>
                      <table>
                        <tr>
                          <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
                        </tr>
                        <tr>
                          <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
                        </tr>
                        <tr>
                          <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
                        </tr>
                      </table>
                    </body>
                    </html>';
        $de =   'MIME-Version: 1.0' . "\r\n";
        $de .=   'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $de .=   'From: symphonymg2000@gmail.com';
        
        if (mail($para, $asunto, $descripcion, $de))
           {
        echo "Correo enviado satisfactoriamente";
        }
        ?>
    </body>
</html>
