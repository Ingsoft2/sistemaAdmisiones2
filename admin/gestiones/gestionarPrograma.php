<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <meta charset="UTF-8">
        <title>Gestionar Programa</title>
        
    </head>
    <?php include ("Header.php"); ?>
    <body>
        <div id="section">
            <div id="info"> 
                <a href="../programa/agregarPrograma.php"><img src="../../img/programa/+.png" width="100" height="80">Agregar Programa</a>
                <a href="../facultad/buscarFacultad.php"><img src="../../img/programa/b.png" width="100" height="80">Buscar Programa</a> 
                <a href="modificarFacultad.php"><img src="../../img/programa/m.png" width="100" height="80">Modificar Programa</a> 
                <a href="eliminarFacultad.php"><img src="../../img/programa/x.png" width="100" height="80">Eliminar Programa</a> 
                 <?php include '../conexion.php';
                include '../programa/Programa.php';
                Programa::lista_programa('programa');
                  
                ?>
               </div> 
        </div>
        
    </body>
    <?php
    
include("fooder.php"); 
?>
</html>
