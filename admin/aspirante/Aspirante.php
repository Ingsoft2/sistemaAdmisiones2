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


/**
 * Description of Aspirante
 *Creasion del aspirante
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

    
  

    //Insertar aspirante en la BD

    /**
 * Description of Aspirante
 *Metodo que agrega un aspirante a la base de datos 
 * @param int $pidentificacion identificacion del aspirante
 * @param String $pNombre nombre del aspirante
     * @param String $pApellidos Apellidos del aspirante
     * @param Date $pfecha fecha nacimiento del aspirante
     * @param String $pGenero genero del aspirante
     * @param String $pColegio colegio del que se graduo el aspirante 
     * @param int $pPromedio promedio del resultado en las pruebas del aspirante
     * @param File $pFoto foto del aspirante
     * @param tipe $pTipo_imagen tipo de la imagen del aspirante
     *  
 * @author MiPc
 */
    static function insertarAspirante($pIdentificacion, $pNombre, $pApellido, $pFecha_nacimiento, $pLugar_nacimiento, $pGenero, $pColegio, $Psaber, $nom_imagen,$prog,$pPromedio) {
        include '../conexion.php';
        $mensaje = "resultados: ";
//Insertar aspirante en la BD
        echo $nom_imagen;
        $sql = @mysql_query("INSERT INTO aspirante(identificacion, nombres, apellidos, fecha_nacimiento, lugar_nacimiento, genero, id_colegio, promedio, nom_imagen,idprograma,prom_resul)VALUES('$pIdentificacion','$pNombre','$pApellido','$pFecha_nacimiento','$pLugar_nacimiento','$pGenero', '$pColegio', '$pPromedio','$nom_imagen','$prog',0)");
        $sql2 = @mysql_query("insert into resultados (res_saber,identificacion) value ($Psaber,$pIdentificacion) ");
        if (!$sql) {
            $mensaje.="Error Insertando Aspirante en la base de datos: " . mysql_error();
        } else {
            $mensaje.="El aspirante con identificacion: " . $pIdentificacion . " fue agregado al sistema";
        }
        return $mensaje;
    }

    /**
     * Crea la lista de aspirates en en mundo
     * @param type $tabla
      * $campos->identificacion
       * $campos->nombres
       * $campos->apellidos
       * $campos->fecha_nacimiento
       * $campos->lugar_nacimiento
       * $campos->genero
       * $campos->id_colegio
       * $campos->promedio
       * $campos->foto
       * $campos->tipo_imagen
       * $campos->idprograma
     */
    public function lista_aspirante($tabla) {
        
        include '../conexioni.php';
        $mysql = new conexioni();
        $mysqli=$mysql->conctar();
        $consulta= "select aspirante.identificacion as 'identificacion', aspirante.nombres as 'nombres', aspirante.apellidos as 'apellidos', aspirante.fecha_nacimiento as 'fecha_nacimiento', aspirante.lugar_nacimiento as 'lugar_nacimiento', aspirante.genero as 'genero', colegio.nombre as 'nomCol', aspirante.promedio as 'promedio', aspirante.id_colegio as 'id_colegio', programa.nombre as 'nomProg'  from aspirante, colegio, programa where aspirante.id_colegio = colegio.id_colegio and programa.idprograma= aspirante.idprograma";
        $result   = $mysqli->query($consulta);
        echo "<table border = '1'>\n";
        echo "<tr align =center> <th colspan=10>Lista de aspirantes</th> </tr>";
        echo "<tr align=center id=tit><td>IDENTIFICACION</td><td>NOMBRES</td><td>APELLIDOS</td><td>FECHA NACIMIENTO</td><td>LUGAR NACIMIENTO</td><td>GENERO</td><td>COLEGIO</td><td>PROMEDIO</td><td>PROGRAMA</td><td>OPCIONES</td></tr> \n";
        while ($campos = mysqli_fetch_object($result)) {
            echo "<tr id=resul><td>$campos->identificacion</td><td>$campos->nombres</td><td>$campos->apellidos</td><td>$campos->fecha_nacimiento</td><td>$campos->lugar_nacimiento</td><td>$campos->genero</td><td>$campos->nomCol</td><td>$campos->promedio</td><td>$campos->nomProg</td> <td><a href=../aspirante/procesar_aspirante.php?req_asp=eliminar&id=".$campos->identificacion."><img src=../../img/Colegio/elmn.png width=25px heigt=25px /></a>&nbsp;&nbsp;&nbsp;<a href=../aspirante/modificarAspirante.php?req_asp=modificar&id=".$campos->identificacion."><img src=../../img/Colegio/mdf.png width=25px heigt=25px /></a>&nbsp;&nbsp;&nbsp;<a <a href='../aspirante/Resultados.php?id=".$campos->identificacion."' target='Resultados' onclick=\"window.open(this.href, this.target, 'width=600, height=400, menubar=no, resizable=NO');return false;\"><img src=../../img/aspirante/resultadosAspirante.png width=25px heigt=25px/></a>&nbsp;&nbsp;&nbsp;"
                    . "<a href='../aspirante/MostrarAspirante.php?id=".$campos->identificacion."' target='MostrarAspirante' onclick=\"window.open(this.href, this.target, 'width=600, height=800, menubar=no, resizable=NO');return false;\"><img src=../../img/aspirante/mostratAspirante.png width=25px heigt=25px /></a></td></tr> \n";
           // echo "<td><a href=editar_estudiante.php?id=".$row[$campos[0]].">Editar</a></td>";
       
        }
        echo "</table> \n";
    }
    
    
    /**
     * elimina el aspirante selecionado de la lista
     * @param type $id
     * @return string
     */
    static function eliminar_aspirante($id)
    {
        include '../conexion.php';
        $mensaje = "resultados:";
         $sql1 ="select * from aspirante where identificacion=$id";
                              $consulta1=  mysql_query($sql1);
                              $campos1=  mysql_fetch_object($consulta1);
                              $nomimagenv = $campos1->nom_imagen;   
                              $rutav="Fotos/";
                              unlink($rutav.$nomimagenv);       
        //Insertar usuario en la BD   
        $sql1= @mysql_query("delete from resultados where identificacion=$id" );
        $sql = @mysql_query("DELETE FROM aspirante WHERE identificacion=$id");
        if (!$sql) {
            $mensaje.="Error Eliminando aspirante en la base de datos: " . mysql_error();
        } else {
            $mensaje.="El aspirante con identificacion " . $id . " fue eliminado del sistema";
        }
        return $mensaje;
    }
    
    
    /**
     * edita el aspirante escogido en la ista 
     * @param type $pIdentificacion_actual
     * @param type $pIdentificacion
     * @param type $pNombre
     * @param type $pApellido
     * @param type $pFecha_nacimiento
     * @param type $pLugar_nacimiento
     * @param type $pGenero
     * @param type $pColegio
     * @param type $pPromedio
     */
     static function editarAspirante($pIdentificacion_actual, $pIdentificacion, $pNombre, $pApellido, $pFecha_nacimiento, $pLugar_nacimiento, $pGenero, $pColegio, $pPromedio)
    {
       include '../conexion.php';
       /*  $sql = @mysql_query("SELECT identificacion from aspirante WHERE identificacion=$pIdentificacion");
         $consulta = mysql_query($sql);
         while ($registros = mysql_fetch_array($consulta)){
             echo $registros['identificacion'];
         }*/
     
     
      /*$sql = "UPDATE aspirante set identificacion=".$pIdentificacion." where identificacion=".$pIdentificacion_actual;
        mysql_query($sql);
       * identificacion
       * nombres
       * apellidos
       * fecha_nacimiento
       * lugar_nacimiento
       * genero
       * id_colegio
       * promedio
       * foto
       * tipo_imagen
       * idprograma
       */
        
      echo $pIdentificacion_actual;
      $sql = "UPDATE aspirante SET identificacion=".$pIdentificacion.", "
              . "nombres='".$pNombre."', "
              . "apellidos='".$pApellido."', "
              . "fecha_nacimiento='".$pFecha_nacimiento."', "
              . "lugar_nacimiento='".$pLugar_nacimiento."', "
              . "genero='".$pGenero."', "
              . "id_colegio='".$pColegio."', "
              . "promedio='".$pPromedio."', "
              . "lugar_nacimiento='".$pLugar_nacimiento."' WHERE identificacion=".$pIdentificacion_actual;
        
        mysql_query($sql);
        
        header('Location:../gestiones/gestionAraspirante.php');
       // $campos= mysql_fetch_object($sql);*/

    //  $campos= mysql_fetch_object($sql);
    }

}
