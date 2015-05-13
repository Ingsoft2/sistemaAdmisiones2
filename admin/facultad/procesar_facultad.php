<?php
include './Facultad.php';
switch ($_REQUEST['req_fac'])
{
    /**
     * switch para enviar al metodo correspondiente en cada accion 
     */
    case "Enviar":
        
        $nombre = $_POST['txt_nombres'];
        $fechaCreacion = $_POST['txt_creacion'];
        
        if(strlen($nombre)>3 && strlen($nombre)<45)
               
            
             {
        $mensaje = Facultad::insertarFacultad($nombre, $fechaCreacion);
     header('Location:../gestiones/gestionarFacultad.php'); 
      }
            else {echo '<script> alert("el nombre de la facultad debe ser  mayor a 3 letras y menor a 45"); location.href="../facultad/agregarFacultad.php";</script>';  }
         
        
      exit();
      
      case "eliminar":

         
        $id = $_REQUEST['id'];

        $mensaje = Facultad::eliminar_facultad($id);
        
        header('Location:../gestiones/gestionarFacultad.php');
        exit();
        break;
    
      case "Modificar":
if(isset($_POST['txt_id']))
{
    $id= (int)$_POST['txt_id'];
    
    if($id>0)
    {
        
         $nombre = $_POST['txt_nombre'];
        $estado = $_POST['txt_fechaCreacion']; 
        
        if(strlen($nombre)>3 && strlen($nombre)<45)
              {
            Facultad::editarFacultad($id, $nombre, $fechaCreacion);
        header('Location:../gestiones/gestionarFacultad.php');
         }
            else {echo '<script> alert("el nombre de la facultad debe ser  mayor a 3 letras y menor a 45"); location.href="../facultad/agregarFacultad.php";</script>';  }
    }
    else
        echo 'id menor a 0';
}
else
    echo 'no existe la variable id';
       
}

?>

