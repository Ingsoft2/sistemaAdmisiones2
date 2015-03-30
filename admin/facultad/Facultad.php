<?php

/**
 * Description of Aspirante
 *
 * @author MiPc
 */
class Facultad {

    var $nombre;
    var $fechaCreacion;
 

    function Facultad($nombre, $fechaCreacion)
    {
        $this->nombre = $nombre;
        $this->fechaCreacion = $fechaCreacion;
    }

    static function insertarFacultad($pNombre, $pFechaCreacion) {
        include '../conexion.php';
        $mensaje = "resultados: ";
        //Insertar facultad en la BD
        $sql = @mysql_query("INSERT INTO facultad(nombre, fechaCreacion) "
                        . "VALUES('$pNombre','$pFechaCreacion')");
        if (!$sql) {
            $mensaje.="Error Insertando Facultad en la base de datos: " . mysql_error();
        } else {
            $mensaje.="La facultad con nombre: " . $pNombre . " fue agregado al sistema";
        }
        return $mensaje;
    }

    public function lista_facultad($tabla) {
        
        include '../conexion.php';
        $result = mysql_query("SELECT * FROM facultad");
        echo "<table border = '3'> \n";
        echo "<tr><td>IDENTIFICACION</td><td>NOMBRE</td><td>FECHA CREACION</td><td>OPCIONES</td></tr> \n";
        while ($row = mysql_fetch_row($result)) 
                {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>". "<td><a href=../facultad/procesar_facultad.php?req_fac=eliminar&id=".$row[0].">Borrar</a><a href=../facultad/modificarFacultad.php?req_fac=modificar&id=".$row[0].
                    "&nombre=".$row[1]."". "&fechaCreacion=".$row[2]."> Modificar</a></td></tr> \n";
        
        }
        echo "</table> \n";
    }
    
    
    
    static function eliminar_facultad($id)
    {
        include '../conexion.php';
        $mensaje = "resultados:";
        //Eliminar facultad de la BD       
        $sql = @mysql_query("DELETE FROM facultad WHERE id_facultad=$id");
        if (!$sql) {
            $mensaje.="Error Eliminando facultad en la base de datos: " . mysql_error();
        } else {
            $mensaje.="La facultad con " . $id . " fue eliminada del sistema";
        }
        return $mensaje;
    }
    
     static function editarFacultad($pNombre_actual, $pNombre, $pFechaCreacion){
    {
       include '../conexion.php';
      echo $pNombre;    
      
      $sql = "UPDATE facultad SET nombre".$pNombre.", "
              . "fechaCreacion='".$pFechaCreacion."' WHERE nombre=".$pNombre_actual;
        
        mysql_query($sql);
        
        header('Location:../gestiones/gestionarFacultad.php');

    }
    
}
}