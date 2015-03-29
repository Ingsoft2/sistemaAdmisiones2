<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aspirante
 *
 * @author MiPc
 */
class Aspirante {

    var $nombre;
    var $apellido;
    var $identificacion;
    var $fecha_nacimiento;
    var $lugar_nacimiento;
    var $genero;
    var $colegio;
    var $promedio;
    var $foto;

    function Aspirante($nombre, $apellido, $identificacion, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio, $foto)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->identificacion = $identificacion;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->lugar_nacimiento = $lugar_nacimiento;
        $this->genero = $genero;
        $this->colegio = $colegio;
        $this->promedio = $promedio;
        $this->foto = $foto;
    }

    static function insertarImagen($data, $tipo) {
        include '../conexion.php';
        $resultado = mysql_query("INSERT INTO imagen (imagen, tipo_imagen) VALUES ('$data', '$tipo')");
        if ($resultado) {
            echo "el archivo ha sido copiado exitosamente";
        } else {
            echo "ocurrio un error al copiar el archivo.";
        }
    }

    static function insertarAspirante($pIdentificacion, $pNombre, $pApellido, $pFecha_nacimiento, $pLugar_nacimiento, $pGenero, $pColegio, $pPromedio, $pFoto, $pTipo_imagen) {
        include '../conexion.php';
        $mensaje = "resultados: ";
//Insertar aspirante en la BD
        echo $pTipo_imagen;
        $sql = @mysql_query("INSERT INTO aspirante(identificacion, nombres, apellidos, fecha_nacimiento, lugar_nacimiento, genero, id_colegio, promedio, foto, tipo_imagen) "
                        . "VALUES('$pIdentificacion','$pNombre','$pApellido','$pFecha_nacimiento','$pLugar_nacimiento','$pGenero', '$pColegio', '$pPromedio','$pFoto','$pTipo_imagen')");
        if (!$sql) {
            $mensaje.="Error Insertando Aspirante en la base de datos: " . mysql_error();
        } else {
            $mensaje.="El aspirante con identificacion: " . $pIdentificacion . " fue agregado al sistema";
        }
        return $mensaje;
    }

    public function lista_aspirante($tabla) {
        
        include '../conexion.php';
        $result = mysql_query("SELECT * FROM aspirante");
        echo "<table border = '3'> \n";
        echo "<tr><td>IDENTIFICACION</td><td>NOMBRES</td><td>APELLIDOS</td><td>FECHA NACIMIENTO</td><td>LUGAR NACIMIENTO</td><td>GENERO</td><td>ID COLEGIO</td><td>PROMEDIO</td><td>OPCIONES</td></tr> \n";
        while ($row = mysql_fetch_row($result)) {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td> <td><a href=../aspirante/procesar_aspirante.php?req_asp=eliminar&id=".$row[0].">Borrar</a><a href=../aspirante/modificarAspirante.php?req_asp=modificar&id=".$row[0]."&nombre=".$row[1].""
                    . "&apellido=".$row[2]."&fecha_nacimiento=".$row[3]."&lugar_nacimiento=".$row[4]."&colegio=".$row[6]."&promedio=".$row[7]."> Modificar</a></td></tr> \n";
           // echo "<td><a href=editar_estudiante.php?id=".$row[$campos[0]].">Editar</a></td>";
            
        }
        echo "</table> \n";
    }
    
    
    
    static function eliminar_aspirante($id)
    {
        include '../conexion.php';
        $mensaje = "resultados:";
        //Insertar usuario en la BD        
        $sql = @mysql_query("DELETE FROM aspirante WHERE identificacion=$id");
        if (!$sql) {
            $mensaje.="Error Eliminando aspirante en la base de datos: " . mysql_error();
        } else {
            $mensaje.="El aspirante con identificacion " . $id . " fue eliminado del sistema";
        }
        return $mensaje;
    }
    
     static function editarAspirante($pIdentificacion_actual, $pIdentificacion, $pNombre, $pApellido, $pFecha_nacimiento, $pLugar_nacimiento, $pGenero, $pColegio, $pPromedio)
    {
       include '../conexion.php';
       /*  $sql = @mysql_query("SELECT identificacion from aspirante WHERE identificacion=$pIdentificacion");
         $consulta = mysql_query($sql);
         while ($registros = mysql_fetch_array($consulta)){
             echo $registros['identificacion'];
         }*/
      echo $pIdentificacion;
     
      /*$sql = "UPDATE aspirante set identificacion=".$pIdentificacion." where identificacion=".$pIdentificacion_actual;
        mysql_query($sql);*/
        
      
      $sql = "UPDATE aspirante SET identificacion".$pIdentificacion.", "
              . "nombres='".$pNombre."', "
              . "apellidos='".$pApellido."', "
              . "fecha_nacimiento='".$pFecha_nacimiento."', "
              . "lugar_nacimiento='".$pLugar_nacimiento."', "
              . "genero='".$pGenero."', "
              . "id_colegio='".$pColegio."', promedio='".$pPromedio."', "
              . "lugar_nacimiento='".$pLugar_nacimiento."' WHERE identificacion=".$pIdentificacion_actual;
        
        mysql_query($sql);
        
        header('Location:../gestiones/gestionAraspirante.php');
       // $campos= mysql_fetch_object($sql);*/

    //  $campos= mysql_fetch_object($sql);
    }

}
