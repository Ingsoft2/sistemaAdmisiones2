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
        $prog=$_POST['txt_prog'];
        $nomimagen = rand(0,1000)."p".rand(100,1000)."_".rand(999,200000000).$_FILES['foto']['name'];   
        $ruta="Fotos/". $nomimagen;
        $temp=$_FILES['foto']['tmp_name'];
           
        

        require '../conexion.php';

//comprobamos si ha ocurrido un error.
        if ($_FILES["foto"]["error"] > 0){
 echo "ha ocurrido un error";
}
else { $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
       $limite_kb = 300;
       if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite_kb * 1024)
       {
        if (!file_exists($ruta)){
        $resultado = move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
	if ($resultado){
            echo "el archivo ha sido movido exitosamente";
             $mensaje = Aspirante::insertarAspirante($identificacion, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $saber, $nomimagen,$prog,$promedio);
            if ($mensaje){
               echo "<script>alert('Datos registrados');location.href='../gestiones/gestionAraspirante.php';</script>";
                }                     
                } 
                else {
		echo "ocurrio un error al mover el archivo.";
                echo "$nomimagen y $ruta";
                }
                }
                else {
		echo $_FILES['imge']['name'] . ", este archivo existe";
                echo"<script>alert('archivo ya existe en la cartelera')</script>"; 
		}
                }
                else{
                echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
                }
                }
       

        // Aspirante::insertarImagen($data, $tipo);
       
     
        exit();
        break;
        
    case "eliminar":

        $id = $_REQUEST['id'];        
        $mensaje = Aspirante::eliminar_aspirante($id);
        header('Location:../gestiones/gestionAraspirante.php');
        exit();
        break;
    
     case "resultados":

        $id = $_REQUEST['id'];        
        $mensaje = Aspirante::eliminar_aspirante($id);
        header('Location:../gestiones/gestionAraspirante.php');
        exit();
        break;

    case "Modificar":
/**
 * accion de modificar el aspirante
 */     $foto = $_FILES['foto']['name'];
        $identificacion_actual = $_POST['txt_identificacion'];
        $identificacion_nueva = $_POST['txt_nueva_identificacion'];
        $nombres = $_POST['txt_nombres'];
        $apellidos = $_POST['txt_apellidos'];
        $fecha_nacimiento = $_POST['txt_nacimiento'];
        $lugar_nacimiento = $_POST['txt_lugarnacimiento'];
        $genero = $_POST['genero'];
        $colegio = $_POST['txt_colegio'];
        $promedio = $_POST['txt_promedio'];
 
       /* echo $nombres;
        echo $apellidos;
        echo $fecha_nacimiento;
        echo $lugar_nacimiento;
        echo $genero;
        echo $colegio;
        echo $promedio;*/
        if($foto != NULL)
        {
            include ("../conexion.php");
             $sql1 ="select * from aspirante where identificacion=$identificacion_actual";
                              $consulta1=  mysql_query($sql1);
                              $campos1=  mysql_fetch_object($consulta1);
                              $nomimagenv = $campos1->nom_imagen;   
                              $rutav="Fotos/";
                             
                              
        $nomimagen = rand(0,1000)."p".rand(100,1000)."_".rand(999,200000000).$_FILES['foto']['name'];   
        $ruta="Fotos/". $nomimagen;
        $temp=$_FILES['foto']['tmp_name'];
        
           if ($_FILES['foto']["error"] > 0)
            {
            echo "ha ocurrido un error";
            }
            else {
                $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
                $limite_kb = 300;
                if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite_kb * 1024)
                {
                if (!file_exists($ruta)){
                             
                $resultado = move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
			if ($resultado)
                            {
                              $sql1 ="update aspirante set nom_imagen='$nomimagen' where identificacion = $identificacion_actual";
                              $consulta1=  mysql_query($sql1);
                              $campos1=  mysql_fetch_object($consulta1);
                                unlink($rutav.$nomimagenv);       
                              
                                  
                                
                            } else {
				echo "ocurrio un error al mover el archivo.";
                                echo "$nomimagen y $ruta";
                                
                                }
                             }
                             else {
			echo $_FILES['foto']['name'] . ", este archivo existe";
		}
                     }
                     else
                     {
                         echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
                     }
                     }
        }
        $id_b;
        
        
        if($identificacion_actual != $identificacion_nueva && $identificacion_nueva!=null){
       $id_b=$identificacion_nueva;
           
        }else{  $id_b=$identificacion_actual; }
/**
 * cambia la identificacion 
 */
 
        require '../conexion.php';
        $sql = @mysql_query("SELECT identificacion FROM aspirante WHERE identificacion=".$id_b);
        $campos = mysql_fetch_object($sql);
        if ($campos != null) {
          
            if($identificacion_actual == $identificacion_nueva || $identificacion_nueva == null){
            Aspirante::editarAspirante($identificacion_actual, $identificacion_actual, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio);
        }
            else{
        echo '<script> alert("El numero de identificacion ('.$identificacion_nueva.') ya se encuentra en uso"); location.href="../aspirante/modificarAspirante.php?id='.$identificacion_actual.'&nombre='.$nombres.'&apellido='.$apellidos.'&fecha_nacimiento='.$fecha_nacimiento.'&lugar_nacimiento='.$lugar_nacimiento.'&colegio='.$colegio.'&promedio='.$promedio.'";</script>';
        }}
        else{
    
              if($identificacion_actual != $identificacion_nueva && $identificacion_nueva!=null){
            Aspirante::editarAspirante($identificacion_actual, $identificacion_nueva, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio);
        }else{
            Aspirante::editarAspirante($identificacion_actual, $identificacion_actual, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio);
        }
        }
}
