<?php
 //Verificamos si se ha definido la variable @id que tiene el id del registro
if(isset($_POST['id']))
    {
 //Transformamos a entero y lo asignamos a una variable
 $id=(int)$_POST['id'];
  
 //Verificamos que el id es un numero mayor a 0
 if($id > 0 )
 {
     include_once '../conexion.php';
     $nombre=$_POST['txt_nombre'];
     $fechaCreacion=$_POST['txt_creacion'];
     echo "cod='$id' y nombre='$nombre' y fechaCreacion='$fechaCreacion'";
     
     $query = "update facultad set nombre='$nombre', fechaCreacion='$fechaCreacion' WHERE id_facultad=$id";
     
     //Ejecutamos la consutla
        mysql_query($query) or die('Error al procesar consulta: ' . mysql_error());
        echo 'facultad modificada';
        header('Location:../gestiones/gestionarFacultad.php');
     
 }
     
 }
 else
     echo 'alert(id no existe)';
 ?>

