<?php



include './Aspirante.php';
switch ($_REQUEST['req_asp']) {
    case "Enviar":

        $identificacion = $_POST['txt_identificacion'];

        $nombres = $_POST['txt_nombres'];
        $apellidos = $_POST['txt_apellidos'];
        $fecha_nacimiento = $_POST['txt_nacimiento'];
        $lugar_nacimiento = $_POST['txt_lugarnacimiento'];
        $genero = $_POST['genero'];
        $colegio = $_POST['txt_colegio'];
        $promedio = $_POST['txt_promedio'];

        require './conexion.php';

//comprobamos si ha ocurrido un error.
        if (!isset($_FILES["foto"]) || $_FILES["foto"]["error"] > 0) {
            echo "ha ocurrido un error";
        } else {
            //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
            //y que el tamano del archivo no exceda los 16mb
            $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
            $limite_kb = 16384; //16mb es el limite de medium blob

            if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite_kb * 1024) {

                //este es el archivo temporal
                $imagen_temporal = $_FILES['foto']['tmp_name'];
                //este es el tipo de archivo
                $tipo = $_FILES['foto']['type'];
                //leer el archivo temporal en binario
                $fp = fopen($imagen_temporal, 'r+b');
                $data = fread($fp, filesize($imagen_temporal));
                fclose($fp);
                //escapar los caracteres
                $data = mysql_escape_string($data);

                $resultado = mysql_query("INSERT INTO imagenes (imagen, tipo_imagen) VALUES ('$data', '$tipo')");
                if ($resultado) {
                    echo "el archivo ha sido copiado exitosamente";
                } else {
                    echo "ocurrio un error al copiar el archivo.";
                }
            } else {
                echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
            }
        }

        // Aspirante::insertarImagen($data, $tipo);
        $mensaje = Aspirante::insertarAspirante($identificacion, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio, $data, $tipo);
        header('Location:gestionarAspirante.php');
        exit();
        break;

    case "eliminar":

        $id = $_REQUEST['id'];

        $mensaje = Aspirante::eliminar_aspirante($id);
        header('Location:gestionarAspirante.php');
        exit();
        break;

    case "Modificar":

        $identificacion_actual = $_POST['txt_identificacion'];
        $identificacion_nueva = $_POST['txt_nueva_identificacion'];
        $nombres = $_POST['txt_nombres'];
        $apellidos = $_POST['txt_apellidos'];
        $fecha_nacimiento = $_POST['txt_nacimiento'];
        $lugar_nacimiento = $_POST['txt_lugarnacimiento'];
        $genero = $_POST['genero'];
        $colegio = $_POST['txt_colegio'];
        $promedio = $_POST['txt_promedio'];
 
        $id_b;
        
        
        if($identificacion_actual != $identificacion_nueva && $identificacion_nueva!=null){
       $id_b=$identificacion_nueva;
           
        }else{  $id_b=$identificacion_actual; }

 
        require './conexion.php';
        $sql = @mysql_query("SELECT identificacion FROM aspirante WHERE identificacion=".$id_b);
        $campos = mysql_fetch_object($sql);
        if ($campos != null) {
          
            if($identificacion_actual == $identificacion_nueva || $identificacion_nueva == null){
            Aspirante::editarAspirante($identificacion_actual, $identificacion_actual, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio);
        }
            else{
        echo '<script> alert("El numero de identificacion ('.$identificacion_nueva.') ya se encuentra en uso"); location.href="modificarAspirante.php?id='.$identificacion_actual.'&nombre='.$nombres.'&apellido='.$apellidos.'&fecha_nacimiento='.$fecha_nacimiento.'&lugar_nacimiento='.$lugar_nacimiento.'&colegio='.$colegio.'&promedio='.$promedio.'";</script>';
        }}
        else{
              if($identificacion_actual != $identificacion_nueva && $identificacion_nueva!=null){
            Aspirante::editarAspirante($identificacion_actual, $identificacion_nueva, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio);
        }else{
            Aspirante::editarAspirante($identificacion_actual, $identificacion_actual, $nombres, $apellidos, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio);
        }
        }
}
