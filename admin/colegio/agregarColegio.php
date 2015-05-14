<!-- from para ageregar el colegio a la base de datos -->
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <meta charset="UTF-8">
        <title>Gestionar Colegio</title> <!--  titulo de la pagina-->
    </head>
    <?php include ("Header.php"); ?>
    <body>
        
        <div id="section">
            <br>
        <form action="procesar_colegio.php" method="post">
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Datos Colegio</th> <!-- titulos de el formulario -->
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>Nombres:</td>
                        <td><input type="text" name="txt_nombres" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td>
                <select name="estado"> 
                    <option> Privado</option>
                    <option selected> Publico</option>
                </select>
                        </td>
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
