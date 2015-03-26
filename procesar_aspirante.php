<?php
include './Aspirante.php';
switch ($_REQUEST['req_asp']){
    case "Enviar":
        
      $identificacion =  $_POST['txt_identificacion'];
      
      $nombres = $_POST['txt_nombres'];
      $apellidos = $_POST['txt_apellidos'];
      $fecha_nacimiento = $_POST['txt_nacimiento'];
      $lugar_nacimiento = $_POST['txt_lugarnacimiento'];
      $genero = $_POST['genero'];
      $colegio = $_POST['txt_colegio'];
      $promedio = $_POST['txt_promedio'];
    //  $foto = $_POST['foto'];
      
      $ruta = $_FILES['foto']['tmp_name'];
      //$lectura_imagen = getimagesize($ruta_imagen);
      //$imagen_tipo=$lectura_imagen['mime'];
     // $imagen_tamanio = getSizeFile($ruta_imagen);
      $imagen_binario = addslashes(file_get_contents($ruta));
      
      
            
      $mensaje = Aspirante::insertarAspirante($identificacion, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio, $imagen_binario);
      include './index.php';  
      exit();
      break;
} 

