<?php
include './Facultad.php';
switch ($_REQUEST['req_fac'])
{
    case "Enviar":
        
        $nombre = $_POST['txt_nombres'];
        $fechaCreacion = $_POST['txt_creacion'];
                
        $mensaje = Facultad::insertarFacultad($nombre, $fechaCreacion);
     header('Location:../gestiones/gestionarFacultad.php'); 
      exit();
      
      case "eliminar":

         
        $id = $_REQUEST['id'];

        $mensaje = Facultad::eliminar_facultad($id);
        
        header('Location:../gestiones/gestionarFacultad.php');
        exit();
        break;
    
     case "Modificar":

        $nombre = $_POST['txt_nombre'];
        $estado = $_POST['txt_creacion'];
      
        
        
        
        Facultad::editarFacultad($pNombre, $pFechaCreacion);
        header('Location:../gestiones/gestionarFacultad.php');
    
        
}

?>

