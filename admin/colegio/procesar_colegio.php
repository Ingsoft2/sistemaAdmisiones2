<?php
/**
 * switch que ayuda a definir el proceso que deve seguir segun la respuesta enviada
 */
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
if(isset($_POST['txt_id']))
{
    $id= (int)$_POST['txt_id'];
    
    if($id>0)
    {
        
         $nombre = $_POST['txt_nombre'];
        $estado = $_POST['txt_estado'];
        $ciudad = $_POST['txt_ciudad'];  
        Colegio::editarColegio($id, $nombre, $estado, $ciudad);
        header('Location:../gestiones/gestionarColegio.php');
    }
    else
        echo 'id menor a 0';
}
else
    echo 'no existe la variable id';
       
}

?>
