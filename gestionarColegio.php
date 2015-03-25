<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <br>
        <form action="">
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
                        <td>Estado:</td>
                        <td>
                            <select>
                                <option selected> Privado </option>
                                <option> Publico </option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Ciudad:</td>
                        <td><input type="date" name="txt_nacimiento" value="" required=""/></td>
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
</html>
