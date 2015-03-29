<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <meta charset="UTF-8">
        <title>Gestionar Colegio</title>
    </head>
    <?php include ("Header.php"); ?>
    <body>
        <br>
        <form name="formu" id="formu" method="POST" enctype="multipart/form-data" action="procesar_colegio.php">
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Modifiar Colegio</th>
                    </tr>
                </thead>
                <tbody>
                     <tr>
                        <td>Codigo</td>
                        <td><input  type="text" name="txt_id" readonly value="<?php echo $_REQUEST['id'];?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>Nombres:</td>
                       <td><input type="text" name="txt_nombre" value="<?php echo $_REQUEST['nombre'];?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td>
                            <select name="txt_estado" required>
                    
                    <option  >Privado</option>
                    <option> Publico</option>
                </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ciudad:</td>
                        <td><input type="text" name="txt_ciudad" value="<?php echo $_REQUEST['ciudad'];?>" required=""/></td>
                    </tr>
                    
                    
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td>
            <input type="submit" value="Modificar" class="boton"/>
            <input type="hidden" value="Modificar" name="req_col">
            </td>
            </tr>
            </table>

        </form>
    </body>
    <?php
include("fooder.php"); 
?>
</html>
