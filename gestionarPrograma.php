<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php
include("Header.php"); 
?>
        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <br>
        <form action="">
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Datos Programa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nombre del programa:</td>
                        <td><input type="text" name="txt_nom_prog" value="" required/></td>
                    </tr>
                    <tr>
                        <td>Fecha de registro:</td>
                        <td><input type="date" name="txt_nombres" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Estado del programa:</td>
                        <td>Acreditacion Alta<input type="radio" name="estado" value="alta" required/>Acreditacion Media<input type="radio" name="estado" value="media" required/>Acreditacion Baja<input type="radio" name="estado" value="baja" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>Numero de admitidos:</td>
                        <td><input type="text" name="txt_num_admitidos" value="" required=""td>
                    </tr>                                                   
                </tbody>
            </table>
            
            <table>
                <tr>
                    <td>
            <input type="submit" value="Enviar" class="boton"/>
            </td>
            </tr>
            </table>

        </form>
    </body>
    <?php
include("fooder.php"); 
?>
</html>