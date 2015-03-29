<?php
include './Colegio.php';
switch ($_REQUEST['req_col'])
{
    case "Enviar":
        
        $nombre = $_POST['txt_nombres'];
        $estado = $_POST['estado'];
        $ciudad = $_POST['txt_ciudad'];
                
        $mensaje = Colegio::insertarColegio($nombre, $estado, $ciudad);
     header('Location:../gestiones/gestionarColegio.php'); 
      exit();
      
      case "eliminar":

        $id = $_REQUEST['id'];

        $mensaje = Colegio::eliminar_colegio($id);
        header('Location:../gestiones/gestionarColegio.php');
        exit();
        break;
    
     case "Modificar":

         $id=$_POST['txt_id'];
         $nombre = $_POST['txt_nombres'];
        $estado = $_POST['estado'];
        $ciudad = $_POST['txt_ciudad'];
        
        
        
        Colegio::editarColegio($id, $pNombre, $pEstado, $pCiudad);
        header('Location:../gestiones/gestionarColegio.php');
        
        
}

?>
