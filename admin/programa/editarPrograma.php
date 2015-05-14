<?php

/**
 * metodo que modifica un programa de la base de datos
 */
//Verificamos si se ha definido la variable @id que tiene el id del registro
if(isset($_POST['txt_id']))
    {
        //Transformamos a entero y lo asignamos a una variable
        $id=(int)$_POST['txt_id'];
  
         //Verificamos que el id es un numero mayor a 0
        if($id > 0 )
        {
            
            include_once '../conexion.php';
            $nombre = $_POST['txt_nom'];
            $fechaAsignacion =$_POST['txt_fecha'];
            $acreditacion = $_POST['txt_acre'];
            $numAdmitidos = $_POST['txt_numAd'];
            $idFacultad = $_POST['txt_idf'];
             //$date1 = strtotime(date("d-m-Y H",time()));
            if(strlen($nombre)>3 && strlen($nombre)<20)
            {
                //if($fechaAsignacion<$date1)
               // {
     echo "cod='$id' y nombre='$nombre' y fechaAs='$fechaAsignacion' y acreditacion ='$acreditacion' y numAd ='$numAdmitidos' y idFacultad='$idFacultad'";
     
     $query = "update programa set nombre='$nombre', fechaRegistro='$fechaAsignacion', estadoAcreditacion ='$acreditacion', TotalAspirantes ='$numAdmitidos', facultad_idfacultad='$idFacultad' WHERE idprograma=$id";
               
     //Ejecutamos la consutla
        mysql_query($query) or die('Error al procesar consulta: ' . mysql_error());
        echo 'programa modificado';
        header('Location:../gestiones/gestionarPrograma.php');
               /* }
                else
                {
                 echo '<script> alert("La fecha debe ser menor a la fecha actual"); location.href="../gestiones/gestionarPrograma.php";</script>';      
                }*/
            }
            else
            {
                  echo '<script> alert("el nombre debe ser mas largo e 3 letras y menos a 20 letras"); location.href="../gestiones/gestionarPrograma.php";</script>';   
            }
 }
     
 }
 else
     echo 'alert(id no existe)';
        ?>

