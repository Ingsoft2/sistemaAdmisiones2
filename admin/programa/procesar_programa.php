<?php
include './Programa.php';
switch ($_REQUEST['req_prog'])
{
    
    /**
     * switch que que envia al metodo solicitado por el administrador
     */
    case "Enviar":
        
        $nombre = $_POST['txt_nom'];
        $fechaAsignacion =$_POST['txt_fecha'];
        $acreditacion = $_POST['acreditacion'];
        $numAdmitidos = $_POST['txt_numAd'];
        $idFacultad = $_POST['txt_idf'];
        $date1 = strtotime(date("d-m-Y H",time()));
        $patron_texto="abcdefghijklmnopqrstuvwxyzABSEFGHIJKLMNOPQRSTUVWXYZ";
        
        
        if(strlen($nombre)>3 && strlen($nombre)<20)
        {
            if($fechaAsignacion<$date1)
            {
          $mensaje = Programa::insetarPrograma($nombre, $fechaAsignacion, $acreditacion, $numAdmitidos, $idFacultad);
           header('Location:../gestiones/gestionarPrograma.php'); 
            }
            else
            {
             echo '<script> alert("La fecha deve ser menor a la fecha actual"); location.href="../programa/agregarPrograma.php";</script>';   
            }
        }
        else
          {
             echo '<script> alert("Nombre demaciado corto o demaciado largo"); location.href="../programa/agregarPrograma.php";</script>';
          }       
       
        
       
        
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
     exit();
        break;
        
        echo 'error de envio';
}

?>
