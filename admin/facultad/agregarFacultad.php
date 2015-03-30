<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <meta charset="UTF-8">
        <title>Gestionar Facultad</title>
    </head>
    <?php include ("Header.php"); ?>
    <body>
            <br>      
            <form action="procesar_facultad.php" method="post">
        <table border="1">
            <thead>
                <tr align="center">
                    
                    <th colspan="2">Datos facultad</th>
                    
                </tr>
            </thead>
            <tbody>    
                
                <tr>
                    <td>Nombre</td>
                    <td><input type="text" name="txt_nombres" value="" required=""/></td>
                </tr>
                <tr>
                    <td>Fecha de creación:</td>
                    <td><input type="date" name="txt_creacion" value="" required=""/></td>
                </tr>
                
            </tbody>
        </table>
         <table>
                <tr>
                    <td>
            <input type="submit" value="Enviar" class="boton"/>
            <input type="hidden" value="Enviar" name="req_fac">
            </td>
            </tr>
            </table>
                
            </form>
    </body>
    <?php
include("fooder.php"); 
?>
</html>
