<?php

include './Aspirante.php';
/**
 * switch que decide la funcion a realizar 
 */
switch ($_REQUEST['req_asp']) {
    case "Enviar":

        $identificacion = $_POST['txt_identificacion'];
        $nombres = $_POST['txt_nombres'];
        $promedio = $_POST['txt_promedio'];
        $apellidos = $_POST['txt_apellidos'];
        $fecha_nacimiento = $_POST['txt_nacimiento'];
        $lugar_nacimiento = $_POST['txt_lugarnacimiento'];
        $genero = $_POST['genero'];
        $colegio = $_POST['txt_colegio'];
        $saber = $_POST['txt_saber'];
        $prog = $_POST['txt_prog'];
        $nomimagen = rand(0, 1000) . "p" . rand(100, 1000) . "_" . rand(999, 200000000) . $_FILES['foto']['name'];
        $ruta = "admin/aspirante/Fotos/" . $nomimagen;
        $temp = $_FILES['foto']['tmp_name'];
        //$date1 = strtotime(date("d-m-Y H",time()));

    
        
        if (is_numeric($identificacion)) {
            if (strlen($identificacion) <= 10) {
                if (is_double($promedio) || is_numeric($promedio)) {
                    if($promedio <= 10){
                        if (is_double($saber) || is_numeric($saber)) {
                            //if($fecha_nacimiento<$date1){
                            
                           
                require 'admin/conexion.php';

//comprobamos si ha ocurrido un error.
                if ($_FILES["foto"]["error"] > 0) {
                    echo "ha ocurrido un error";
                } else {
                    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                    $limite_kb = 300;
                    if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite_kb * 1024) {
                        if (!file_exists($ruta)) {
                            $resultado = move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
                            if ($resultado) {
                                echo "el archivo ha sido movido exitosamente";
                                $mensaje = Aspirante::insertarAspirante($identificacion, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $saber, $nomimagen, $prog, $promedio);
                                if ($mensaje) {
                                    echo "<script>alert('Datos registrados');location.href='index.php';</script>";
                                }
                            } else {
                                echo "ocurrio un error al mover el archivo.";
                                echo "$nomimagen y $ruta";
                            }
                        } else {
                            echo $_FILES['imge']['name'] . ", este archivo existe";
                            echo"<script>alert('archivo ya existe en la cartelera')</script>";
                        }
                        
                    } else {
                        echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
                    }
                }
               }
               //else{
               //echo '<script> alert("La fecha debe ser menor a la fecha actual"); window.location="agregarAspirante.php";</script>';}
               //}
               else{ echo '<script language="javascript">alert("El resultado (prueba saber) debe ser numérico"); window.location="agregarAspirante.php"; </script>'; }
              }else{ echo '<script language="javascript">alert("El promedio debe estar en el rango de 0-10"); window.location="agregarAspirante.php"; </script>'; }
               }else{ echo '<script language="javascript">alert("El promedio debe ser numérico"); window.location="agregarAspirante.php"; </script>'; }
            } else {
                echo '<script language="javascript">alert("La identificacion debe tener maximo 10 números"); window.location="agregarAspirante.php"; </script>';
            }
        } else {
            echo '<script language="javascript">alert("La identificacion debe ser numúrica"); window.location="agregarAspirante.php"; </script>';
        }
        

        
        


        // Aspirante::insertarImagen($data, $tipo);


        exit();
        
}

