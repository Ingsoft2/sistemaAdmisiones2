<?php
include './Programa.php';
switch ($_REQUEST['req_prog'])
{
    case "Enviar":
        
        $nombre = $_POST['txt_nom'];
        $fechaAsignacion =$_POST['txt_fecha'];
        $acreditacion = $_POST['txt_acre'];
        $numAdmitidos = $_POST['txt_numAd'];
        $idFacultad = $_POST['txt_idf'];
                
        $mensaje = Programa::insetarPrograma($nombre, $fechaAsignacion, $acreditacion, $numAdmitidos, $idFacultad);
        header('Location:../gestiones/gestionarPrograma.php'); 
        exit();
      
        case "eliminar":
          
         
        $id = $_REQUEST['id'];

        $mensaje = Programa::eliminar_programa($id);
        
        header('Location:../gestiones/gestionarPrograma.php');
        exit();
        break;
    
        case "Modificar":
        if(isset($_POST['txt_id']))
        {
        $id= (int)$_POST['txt_id'];
    
        if($id>0)
        {
        
        $nombre = $_POST['txt_nom'];
        $fechaAsignacion =$_POST['txt_fecha'];
        $acreditacion = $_POST['txt_acre'];
        $numAdmitidos = $_POST['txt_numAd'];
        $idFacultad = $_POST['txt_idf'];
        Programa::editarColegio($id, $nombre, $estado, $ciudad);
        header('Location:../gestiones/gestionarPrograma.php');
    }
    else
        echo 'id menor a 0';
    }
    else
    echo 'no existe la variable id';
       
}

?>
