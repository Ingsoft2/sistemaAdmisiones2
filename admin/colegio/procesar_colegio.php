<?php
include './Colegio.php';
switch ($_REQUEST['req_col']){
    case "Enviar":
        
        $nombre = $_POST['txt_nombres'];
        $estado = $_POST['estado'];
        $ciudad = $_POST['txt_ciudad'];
                
        $mensaje = Colegio::insertarColegio($nombre, $estado, $ciudad);
      include './index.php';  
      exit();
      break;
}

?>
