<?php
$id=$_GET['id'];
include ("../conexion.php");
$sql ="select * from aspirante where identificacion = $id";
$consulta=  mysql_query($sql);
$campos=  mysql_fetch_object($consulta);
/*
  * $campos->identificacion
       * $campos->nombres
       * $campos->apellidos
       * $campos->fecha_nacimiento
       * $campos->lugar_nacimiento
       * $campos->genero
       * $campos->id_colegio
       * $campos->promedio
       * $campos->foto
       * $campos->tipo_imagen
       * $campos->idprograma
     */
 
?>
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
    <?php include ("../conexion.php"); ?>
    <body>
        <div id="section">
        <br>
       <!-- formulario para modificar aspirante -->
        <form name="formu" id="formu" method="POST" enctype="multipart/form-data" action="procesar_aspirante.php" >
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Modificarm aspirante</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>*Identificación actual:</td>
                        <td><input type="text" name="txt_identificacion" readonly="" value="<?php echo $campos->identificacion; ?>" required=""/>&nbsp; &nbsp; &nbsp; &nbsp;
                           Nueva Identificación: <input type="text" name="txt_nueva_identificacion" /></td>
                    </tr>
                    <tr>
                        <td>*Nombres:</td>
                        <td><input type="text" name="txt_nombres" value="<?php echo $campos->nombres;?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>*Apellidos:</td>
                        <td><input type="text" name="txt_apellidos" value="<?php echo $campos->apellidos;?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>*Fecha de nacimiento:</td>
                        <td><input type="date" name="txt_nacimiento" value="<?php echo $campos->fecha_nacimiento; ?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>*Lugar de nacimiento</td>
                        <td><input type="text" name="txt_lugarnacimiento" value="<?php echo $campos->lugar_nacimiento;?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>*Género:</td>
                        <td>Masculino<input type="radio" name="genero" value="Masculino" checked=""/>Femenino<input type="radio" name="genero" value="Femenino"></td>
                    </tr>
                    <tr>
                        <td>*Colegio:</td>
                        <td> 
                            <?php $result = mysql_query("SELECT * FROM colegio"); ?>
                            <select name="txt_colegio" <?php echo $campos->id_colegio;?>> 
                                <?php  while ($campo = mysql_fetch_object($result)) 
                                     {  ?>
                                        
                                        <option value="<?php echo $campo->id_colegio; ?>"><?php echo $campo->nombre ?></option>
                                    <?php } ?>
                                     {
                         
                        
                            </select></td>
                    </tr>
                    <tr>
                        <td>*Promedio:</td>
                        <td><input type="text" name="txt_promedio" value="<?php echo  $campos->promedio;?>" required=""td>
                    </tr>
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
                    <tr>
                        <td>Foto:</td>
                        <td><input type="file" name="foto" id="foto" /></td>
                    </tr>
                    
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td>
                         <!-- botones de modificacion -->
            <input type="submit" value="Modificar" class="boton"/>
            <input type="hidden" value="Modificar" name="req_asp">
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
