<?php 
$id=$_GET['id'];
include ("../conexion.php");
$sql ="select * from resultados where identificacion = $id";
$consulta=  mysql_query($sql);
$campos=  mysql_fetch_object($consulta);

if(isset($_POST['op']))
{
                $saber=$_POST['txt_saber'];
		$examen=$_POST['txt_examen'];
               $entrevista=$_POST['txt_entrevista'];
               
               if($saber>=0 && $saber<=80)
               {
                 if($examen>=0 && $examen<=100)
                 {
                     if($entrevista>=0 && $entrevista<=100)
                     {
                        
     
                         $query = "update resultados set res_saber=$saber, res_examen=$examen,res_entrevista=$entrevista where identificacion = $id";    
                         $prom=($saber+$examen+$entrevista)/3;
                         $prm2=round($prom,2);
                         $query2="update aspirante set prom_resul=$prm2 where identificacion = $id";
                             //Ejecutamos la consutla
                             mysql_query($query2) or die ('Error al procesar consulta: '.mysql_error());
                            mysql_query($query) or die('Error al procesar consulta: ' . mysql_error()); 
                            echo "<script>  alert('Resultados agregados');window.opener.location.reload() ;window.close();</script>";
                     }
                     else
                     {
                       echo "<script>alert('la entrevista interna debe estar entre 0 y 100 ');</script>";  
                     }
                 }
                 else
                 {
                  echo "<script>alert('el examen interno debe estar entre 0 y 100 ');</script>";   
                 }
                }
               else 
               {
                    echo "<script>alert('las pruebas saber debe estar entre 0 y 80 ');</script>";
               }
}

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
             <link type="text/css" rel="stylesheet" href="../../css/styleResultados.css">        
        <meta charset="UTF-8">
        <title>Gestionar Aspirante</title>
        
    </head> <!--   -->
       
       
    
    <header>
            <div id="header2" >
               <h5>Universidad la Gorgona</h5> <!-- titulo de la universidad  -->
                <div id="logo">
                     <a href="./"> 
                         <img id="imgRes" src="../../img/logo.png" width="250" height="80"> <!-- logo de la aplicaccion  -->
                         
                    </a>
                </div>
            </div>
    </header>
    <body>
         <form name="formu" id="formu" method="POST" enctype="multipart/form-data" action="" >
            <table border="1">
                <thead>
                    <tr align ="center">
                        
                        <th colspan="2">Modificarm aspirante</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>*Id estudiante:</td>
                        <td><input type="text" name="txt_identificacion" readonly="" value="<?php echo $campos->identificacion; ?>" required=""/>&nbsp; &nbsp; &nbsp; &nbsp;
                           
                    </tr>
                    <tr>
                        <td>Prueba saber:</td>
                        <td><input type="number" name="txt_saber" value="<?php echo $campos->res_saber;?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>Examen interno:</td>
                        <td><input type="number" name="txt_examen" value="<?php echo $campos->res_examen;?>" required=""/></td>
                    </tr>
                    <tr>
                        <td>Entrevista interna:</td>
                        <td><input type="number" name="txt_entrevista" value="<?php echo $campos->res_entrevista; ?>" required=""/></td>
                    </tr>
                    
                </tbody>
            </table>
            
             <table id="boton">
                <tr>
                    <td>
                         <!-- botones de modificacion -->
            <input type="submit" value="Agregar" class="boton"/>
            <input type="hidden" value="Modificar" name="op">
            </td>
            </tr>
            </table>

        </form>
    </body>
</html>
