<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <!-- from que contiene el formulario para editar un programa-->
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <title></title>
    </head>
    <?php include ("Header.php"); ?>
    <?php include ("../conexion.php"); ?>
    <body>
        <div id="section">
        <br>
       
        <form name="formu" id="formu" method="POST" enctype="multipart/form-data" action="editarPrograma.php" >
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Modificar  programa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Id programa:</td>
                        <td><input type="text" name="txt_id" value="<?php echo $_REQUEST['id'];?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="txt_nom" value="<?php echo $_REQUEST['nombre'];?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>Fecha Registro</td>
                        <td><input type="date" name="txt_fecha" value="<?php echo $_REQUEST['fechaAsignacion'];?>" required=""/></td>
                    </tr>
                    <tr colspan="3">
                        <td>Acreditacion</td>
                        
                        <td> <input type="text"  value="<?php echo $_REQUEST['acreditacion'];?>" readonly=""/>
                            <select name="txt_acre" required >
                    
                    <option>Alta</option>
                    <option>Media</option>
                    <option>Baja</option>
                </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Numero Admitidos</td>
                        <td><input type="number" name="txt_numAd" value="<?php echo $_REQUEST['numAdmitidos'];?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>Facultad</td>
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
                    <td>
            <input type="submit" value="Modificar" class="boton"/>
            <input type="hidden" value="Modificar" name="req_prog">
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

