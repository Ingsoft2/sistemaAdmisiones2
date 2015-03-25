<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php include ("Header.php"); ?>
    <body>
        
        <div id="section">
            <br>
        <form action="">
        <table border="1">
            <thead>
                <tr align="center">
                    <th colspan="2">Datos facultad</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Id facultad:</td>
                    <td><input type="text" name="txt_id_facultad" value="" required=""/></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" name="txt_nombre_facultad" value="" required=""/></td>
                </tr>
                <tr>
                    <td>Fecha de creación:</td>
                    <td><input type="date" name="txt_fecha_creacion" value="" required=""/></td>
                </tr>
                
            </tbody>
        </table>
         <table>
                <tr>
                    <td>
            <input type="submit" value="Agregar" class="boton"/>
            </td>
            </tr>
            </table>
</form>
            </div>
    </body>
    <?php
include("fooder.php"); 
?>
</html>
