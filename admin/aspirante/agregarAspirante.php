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
    <?php  include ("Header.php"); /** inclucion del header
     *  
     */
    ?>
    <?php include ("../conexion.php"); ?>
    <body>
        <div id="section">
        <br>
       
        <form method="POST" enctype="multipart/form-data" action="procesar_aspirante.php" >
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Datos aspirante</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Identificación:</td>
                        <td><input type="text" name="txt_identificacion" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Nombres:</td>
                        <td><input type="text" name="txt_nombres" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Apellidos:</td>
                        <td><input type="text" name="txt_apellidos" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Fecha de nacimiento:</td>
                        <td><input type="date" name="txt_nacimiento" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Lugar de nacimiento</td>
                        <td><input  type="text" name="txt_lugarnacimiento" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Género:</td>
                        <td>Masculino<input  type="radio" name="genero" value="Masculino"/>Femenino<input type="radio" name="genero" value="Femenino"></td>
                    </tr>
                    <tr>
                         <td>*Colegio:</td>
                        <td> 
                            <?php $result = mysql_query("SELECT * FROM colegio"); ?>
                            <select name="txt_colegio" > 
                                <?php  while ($campo = mysql_fetch_object($result)) 
                                     {  ?>
                                        
                                        <option value="<?php echo $campo->id_colegio; ?>"><?php echo $campo->nombre ?></option>
                                    <?php } ?>
                                     {
                         
                        
                            </select></td>
                    </tr>
                    <tr>
                        <td>Resultado Pruebas Saber:</td>
                        <td><input type="text" name="txt_saber" value="" required=""/> </td>
                    </tr>
                     <tr>
                        <td>promedio del colegio:</td>
                        <td><input type="text" name="txt_promedio" value="" required=""/> </td>
                    </tr>
                    <tr>
                        <td>Programa:</td>
                        <td> 
                            <?php $result = mysql_query("SELECT * FROM programa"); ?>
                            <select name="txt_prog"> 
                                <?php  while ($campo = mysql_fetch_object($result)) 
                                     {  ?>
                                        
                                        <option value="<?php echo $campo->idprograma; ?>"><?php echo $campo->nombre; ?></option>
                                    <?php } ?>
                                     {
                         
                        
                            </select></td>
                    </tr>
                    <tr>
                        <td>Foto:</td>
                        <td><input type="file" name="foto" id="foto" /></td>
                    </tr>
                    
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td>
            <input type="submit" value="Enviar" class="boton"/>
            <input type="hidden" value="Enviar" name="req_asp">
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
