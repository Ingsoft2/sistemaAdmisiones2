<?php 
include '../conexion.php';
$id=$_GET['id'];
if($id==0)
{
$sql =("select aspirante.identificacion as 'identificacion', aspirante.nombres as 'nombres', aspirante.apellidos as 'apellidos', aspirante.fecha_nacimiento as 'fecha_nacimiento', aspirante.lugar_nacimiento as 'lugar_nacimiento', aspirante.genero as 'genero', colegio.nombre as 'nomCol', aspirante.promedio as 'promedio', aspirante.id_colegio as 'id_colegio', programa.nombre as 'nomProg'  from aspirante, colegio, programa where aspirante.id_colegio = colegio.id_colegio and programa.idprograma= aspirante.idprograma");
$consulta=  mysql_query($sql);
}
 else 
{
$sql =("select aspirante.identificacion as 'identificacion', aspirante.nombres as 'nombres', aspirante.apellidos as 'apellidos', aspirante.fecha_nacimiento as 'fecha_nacimiento', aspirante.lugar_nacimiento as 'lugar_nacimiento', aspirante.genero as 'genero', colegio.nombre as 'nomCol', aspirante.promedio as 'promedio', aspirante.id_colegio as 'id_colegio', programa.nombre as 'nomProg'  from aspirante, colegio, programa where aspirante.id_colegio = colegio.id_colegio and programa.idprograma= aspirante.idprograma and aspirante.idprograma=$id ");
$consulta=  mysql_query($sql);    
}
$sql= ("select programa.TotalAspirantes as 'total' from programa where idprograma=$id");
$consulta2= mysql_query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <script src="pruebA.js"></script>
        <title></title>
    </head>
    <?php  include ("Header.php"); /** inclucion del header
     *  
     */
    ?>
    <body>
        <div id="section">
        <br>
        
        <form method="POST" enctype="multipart/form-data" action="procesos.php" >
            <table border="1">
                <thead>
                <tr align ="center">                       
                <th colspan="2">Programas</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>Seleccionar programa</td>
                <td> 
                <?php $result = mysql_query("SELECT * FROM programa"); ?>
                    <select name="txt_prog" onchange="mostrar(this.value)">
               <option value="0">Seleccione un programa</option>   
                
                <?php  while ($campo = mysql_fetch_object($result)) 
                {  ?>
                <option value="<?php echo $campo->idprograma; ?>"><?php echo $campo->nombre; ?></option>
                <?php } ?> {
                </select></td>
                </tr>
                </tbody>
                </table>
                
                
            <br>
            <br>
                <table border="1">          
                <thead>
                    <tr align ="center">                       
                        <th colspan="9">Lista de admitidos por programas</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Identificación</td>
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>Fecha de nacimiento</td>
                        <td>Lugar de nacimiento</td>
                        <td>Género</td>
                        <td>Colegio</td>
                        <td>Programa</td>
                        <td>Estado</td>
                    </tr>
                    <?php $campos2 = mysql_fetch_object($consulta2); $total=$campos2->total; $cont=1;?>
                   <?php while ($campos = mysql_fetch_object($consulta)) {?>
                    <tr>
                       
                        <td><?php echo $campos->identificacion?></td>
                        <td><?php echo $campos->nombres;?></td>
                        <td><?php echo $campos->apellidos;?></td>
                        <td><?php echo $campos->fecha_nacimiento;?></td>
                        <td><?php echo $campos->lugar_nacimiento;?></td>
                        <td><?php echo $campos->genero;?></td>
                        <td><?php echo $campos->nomCol;?></td>
                        <td><?php echo $campos->nomProg;?></td>
                        <?php if($cont<$total)
                        {?>
                        <td>Admitido</td>
                        <?php } else if($cont<$total){ ?>
                         <td>No admitido</td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            

        </form>
        </div>
    </body>
         <?php
include("fooder.php"); 
?>
    
</html>
