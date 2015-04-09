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
        <title>Gestionar Programa</title>    
    </head>
    <?php include ("Header.php"); ?>
    <?php include ("../conexion.php"); ?>
    <body>
        <div id="section">
        <br>
        
        <form method="POST" enctype="multipart/form-data" action="procesar_programa.php" >
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
                    <tr>
                        <td>Numero Admitidos</td>
                        <td><input type="text" name="txt_numAd" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Codigo Facultad</td>
                        <td> 
                            <?php $result = mysql_query("SELECT * FROM facultad"); ?>
                            <select name="txt_idf"> <?php  while ($row = mysql_fetch_row($result)) 
                                     {  ?>
                                        
                                        <option value="<?php echo $row[0]; ?>"><?php echo $row[1] ?></option>
                                    <?php } ?>
                                     {
                        } 
                        ?>
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
