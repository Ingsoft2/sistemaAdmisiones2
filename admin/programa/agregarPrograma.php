<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        
        <title></title>
    </head>
    <?php include ("Header.php"); ?>
    <body>
        <div id="section">
        <br>
        
        <form method="POST" enctype="multipart/form-data" action="procesar_aspirante.php" >
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Datos Programa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="txt_nom" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Fecha de Registro</td>
                        <td><input type="date" name="txt_fecha" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Acreditacion</td>
                        <td> <select name="acreditacion">
                    <option>Alta</option>
                    <option>Media</option>
                    <option>Baja</option>
                        </select></td>
            </tr>
             
           
                </tbody>
            </table>
            
            <table>
                <tr>
                    <br>
                    <td>
            <input type="submit" value="Enviar" class="boton"/>
            <input type="hidden" value="Enviar" name="req_prog">
            </td>
            <td>
            <input type="submit" value="Regresar" class="boton"/>
            <input type="hidden" value="Regresar" name="req_prog">
            </td>
            </tr>
            </table>
<br>
        </form>
        </div>
    </body>
         <?php
include("fooder.php"); 
?>
    
</html>
