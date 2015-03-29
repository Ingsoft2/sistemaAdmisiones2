<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../../../css/style.css">
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
                        
                        <th colspan="2">Datos Pruebas</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td>Prubeas Saber 11:</td>
                        <td><input type="text" name="txt_saber" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Examen interno:</td>
                        <td><input type="text" name="txt_interno" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Entrevista interna:</td>
                        <td><input type="text" name="txt_enrevista" value="" required=""/></td>
                    </tr>
                    
                    
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td>
            <input type="submit" value="Enviar" class="boton"/>
            <input type="hidden" value="Enviar" name="req_col" >
            </td>
            </tr>
            </table>

        </form>
    </body>
    <?php
include("fooder.php"); 
?>
</html>
