
        <?php
        /**
         * php que se encarga de la modificacion de el colegio en la base de datos
         */
            //Verificamos si se ha definido la variable @id que tiene el id del registro
if(isset($_POST['id']))
    {
 //Transformamos a entero y lo asignamos a una variable
 $id=(int)$_POST['id'];
  
 //Verificamos que el id es un numero mayor a 0
 if($id > 0 )
 {
      if(strlen($nombre)>3 && strlen($nombre)<20)
         {      
             if(strlen($ciudad)>3 && strlen($ciudad)<20)
             {
     include_once '../conexion.php';
     $nombre=$_POST['txt_nombre'];
     $estado=$_POST['txt_estado'];
     $ciudad=$_POST['txt_ciudad'];
     echo "cod='$id' y nombre='$nombre' y estado='$estado' y ciudad='$ciudad'";
     
     $query = "update colegio set nombre='$nombre', estado='$estado', ciudad='$ciudad' WHERE id_colegio=$id";
     
     //Ejecutamos la consutla
        mysql_query($query) or die('Error al procesar consulta: ' . mysql_error());
        echo 'colegio modificado';
        header('Location:../gestiones/gestionarColegio.php');
         }
         else {echo '<script> alert("el nombre de la ciudad debe se completo mayor a 3 letras y menor a 20"); location.href="../gestiones/gestionarColegio.php";</script>';  }
             }
             else
         {
              echo '<script> alert("el nombre del colegio debe se completo mayor a 3 letras y menor a 20"); location.href="../gestiones/gestionarColegio.php";</script>';   
         }
         
     
 }
     
 }
 else
     echo 'alert(id no existe)';
        ?>

