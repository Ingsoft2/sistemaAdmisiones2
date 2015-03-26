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
        <title>Gestionar Colegio</title>
    </head>
    <?php include ("Header.php"); ?>
    <body>
        <br>
        <form action="procesar_colegio.php" method="post">
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Datos Colegio</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>Nombres:</td>
                        <td><input type="text" name="txt_nombres" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td>Publico<input type="radio" name="estado" value="Publico"/>Privado<input type="radio" name="estado" value="Privado"></td>
                    </tr>
                    <tr>
                        <td>Ciudad:</td>
                        <td><input type="text" name="txt_ciudad" value="" required=""/></td>
                    </tr>
                    
                    
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td>
            <input type="submit" value="Enviar" class="boton"/>
            <input type="hidden" value="Enviar" name="req_col">
            </td>
            </tr>
            </table>

        </form>
    </body>
    <?php
include("fooder.php"); 
?>
</html>
