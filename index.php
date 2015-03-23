<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <meta charset="UTF-8">
        <title>Sistema de admisiones</title>
    </head>
    <body>
        <header>
            <div id="header">
               <h1>Universidad la Gorgona</h1>
                <div id="logo">
                     <a href="./">
                         <img src="img/logo.png" width="450" height="140">
                         
                    </a>
                </div>
            </div>
            
        </header>  
        <nav>
                <div id="nav">
                    <ul>
                        <li><a href="#">Gestionar facultad</a></li>
                           <li> <a href="#">Gestionar programa</a></li>
                           <li> <a href="#">Gestionar colegio</a></li>
                           <li> <a href="#">Gestionar aspirante</a></li>
                           <li> <a href="#">Consultar admitidos</a></li>
                           <li> <a href="#">Registrar resultados</a></li>
                           <li> <a href="#">Ingresar aspirante</a></li>
                          
                         
                    </ul>
                </div>
            </nav>
        
        <section>
            <div id="section">
                <?php
include("gestionarFacultad.php"); 
?>
            </div>
        </section>
        
        <footer>
            <div id="footer">
                <h3 align="center">Univerdidad Mariana</h3>
                <h3 align="center">Web Solutions</h3>
                <h3 align="center">2015</h3>
            </div>
        </footer>
    </body>
</html>
