<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="../../css/style.css">
        <link type="text/css" rel="stylesheet" href="../../css/StyleColegio.css">
        <meta charset="UTF-8">
        <title>Gestionar Aspirante</title>
        
    </head> <!--   -->
    <?php include ("Header.php"); ?> <!-- inclucion del header de la pagina  -->
    <body>
        <div id="section"> <!--  div de la seccion  -->
            <div id="info">  <!--  div de las ooopciones a realizar -->
                
                <a href="../colegio/agregarColegio.php"><img src="../../img/aspirante/agregarAspirante.png" width="100" height="90">Agregar colegio</a>
                <a href="../aspirante/buscarAspirante.php"><img src="../../img/aspirante/buscarAspirante.png" width="100" height="90">Buscar Aspirante</a> 
            <br> 
            <br> 
            <!--  inclusion de la lista de colegios y conexion a la base de datos -->
         <?php include '../conexion.php'; 
                include '../colegio/Colegio.php';
                Colegio::lista_colegios('colegio');
                  
                ?>
               </div> 
        </div>
    <?php
include("fooder.php"); 
?>
</html>
