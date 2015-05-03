<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Programa
 *
 * @author Fernanda
 */
class Programa {
    //put your code here
    
    var $nombre;
    var $fechaAsignacion;
    var $acreditacion;
    var $numAdmitidos;
    var $idFacultad;
            
    /**
     * metodo q inisialisa los programas
     * @param type $nombre
     * @param type $fechaAsignacion
     * @param type $acreditacion
     * @param type $numAdmitidos
     * @param type $idFacultad
     */
    function Programa($nombre, $fechaAsignacion, $acreditacion,$numAdmitidos,$idFacultad)
    {
        $this->nombre = $nombre;
        $this->fechaAsignacion = $fechaAsignacion;
        $this->acreditacion = $acreditacion;
        $this->numAdmitidos = $numAdmitidos;
        $this->idFacultad =$idFacultad;
        
    }    
    
    /**
     * metodo que inserta los programas en la base de datos
     * @param type $pNombre
     * @param type $pFecha
     * @param type $pAcreditacion
     * @param type $pNumAdmitidos
     * @param type $pIdfacultad
     * @return string
     */
    static function insetarPrograma($pNombre, $pFecha, $pAcreditacion,$pNumAdmitidos,$pIdfacultad)
    {
        include '../conexion.php';
        $mensaje = "resultados: ";
        //Insertar Programa en la BD
        $sql = @mysql_query("INSERT INTO programa(nombre,fechaRegistro,estadoAcreditacion, totalAspirantes, facultad_idfacultad)"
                ."VALUES('$pNombre','$pFecha','$pAcreditacion','$pNumAdmitidos','$pIdfacultad')");
        if (!$sql)
        {
            $mensaje.="error Insertando Programa en la base de datos: ".mysql_error();
        }
        else
            {
            $mensaje.="El Programa con el nombre: ". $pNombre. "fue agregado al sistema";
            }
            return $mensaje;
        }
        /**
         * metodo q lista los programas para ser vistos en el from de gestion
         * @param type $tabla
         */
        public function lista_programa($tabla)
        {
            include '../conexion.php';
            $result = mysql_query("select programa.idprograma, programa.nombre, programa.fechaRegistro, programa.estadoAcreditacion, programa.TotalAspirantes, facultad.nombre as 'nomfacu', programa.facultad_idfacultad from programa, facultad where programa.facultad_idfacultad = facultad.id_facultad  ");
            echo "<table border = '3' id=res > \n";
            echo "<tr id=tit><td >&nbsp;ID_PROGRAMA&nbsp;</td><td>&nbsp;NOMBRE&nbsp;</td><td>&nbsp;FECHA REGISTRO&nbsp;</td><td>&nbsp;ACREDITACION&nbsp;</td><td>&nbsp;NUMERO ADMITIDOS&nbsp;</td><td>&nbsp;FACULTAD&nbsp;</td><td>&nbsp;OPCIONES&nbsp;</td></tr> \n";
            while ($campos = mysql_fetch_object($result)) 
                {
                echo "<tr id=resul><td>$campos->idprograma</td><td>$campos->nombre</td><td>$campos->fechaRegistro</td><td>$campos->estadoAcreditacion</td><td>$campos->TotalAspirantes</td><td>$campos->nomfacu</td>". "<td><a href=../programa/procesar_programa.php?req_prog=eliminar&id=".$campos->idprograma."><img src=../../img/Colegio/elmn.png width=25px heigt=25px /></a>" 
                    . "&nbsp;&nbsp;&nbsp;  <a href=../programa/modificarPrograma.php?req_prog=modificar&id=$campos->idprograma&nombre=".$campos->nombre."&fechaAsignacion=$campos->fechaRegistro&acreditacion=$campos->estadoAcreditacion&numAdmitidos=$campos->TotalAspirantes&idFacultad=$campos->facultad_idfacultad> <img src=../../img/Colegio/mdf.png width=25px heigt=25px /></a></td> "  . "</tr> \n";
           // echo "<td><a href=editar_estudiante.php?id=".$row[$campos[0]].">Editar</a></td>";
            
            
                }
            echo "</table> \n";
        }
        
        /**
         * metodo que elimina el programa de la base de datos
         * @param type $id
         * @return string
         */
        static function eliminar_programa($id)
    {
        include '../conexion.php';
        $mensaje = "resultados:";
        //Insertar usuario en la BD        
        $sql = @mysql_query("DELETE FROM programa WHERE idprograma=$id");
        if (!$sql) {
            $mensaje.="Error Eliminando programa en la base de datos: " . mysql_error();
        } else {
            $mensaje.="El programa con identificacion " . $id . " fue eliminado del sistema";
        }
        return $mensaje;
    }
}

