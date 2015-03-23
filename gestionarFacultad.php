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
                        <td>Apellidos:</td>
                        <td><input type="text" name="txt_apellidos" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Fecha de nacimiento:</td>
                        <td><input type="date" name="txt_nacimiento" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Lugar de nacimiento</td>
                        <td><input type="text" name="txt_lugarnacimiento" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Género:</td>
                        <td>Masculino<input type="radio" name="genero" value="Masculino"/>Femenino<input type="radio" name="genero" value="Femenino"></td>
                    </tr>
                    <tr>
                        <td>Colegio:</td>
                        <td><input type="text" name="txt_colegio" value="" required=""/></td>
                    </tr>
                    <tr>
                        <td>Promedio:</td>
                        <td><input type="text" name="txt_promedio" value="" required=""td>
                    </tr>
                    <tr>
                        <td>Foto:</td>
                        <td><input type="file" name="foto" value="" /></td>
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
