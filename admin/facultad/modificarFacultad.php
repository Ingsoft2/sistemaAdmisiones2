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
        <title>Gestionar Facultad</title>
    </head>
    <?php include ("Header.php"); ?>
    <body>
        <div id="section">
        <br>
       
        <form name="formu" id="formu" method="POST" enctype="multipart/form-data" action="procesar_facultad.php" >
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Modificar facultad</th>
                    </tr>
                </thead>
                <tbody>
                    
                   <tr>
                        <td>*Nombre actual:</td>
                             <td><input type="text" name="txt_nombre" value="<?php echo $_REQUEST['nombre']; ?>" required=""/></td>
                    </tr>
                   
                    <tr>
                        <td>*Fecha de creacion:</td>
                        <td><input type="date" name="txt_creacion" value="<?php echo $_REQUEST['fecha_creacion']; ?>" required=""/></td>
                    </tr>
                   
                    
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td>
            <input type="submit" value="Modificar" class="boton"/>
            <input type="hidden" value="Modificar" name="req_fac">
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
