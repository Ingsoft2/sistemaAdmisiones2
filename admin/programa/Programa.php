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
    
    function Programa($nombre, $fechaAsignacion, $acreditacion)
    {
        $this->nombre = $nombre;
        $this->fechaAsignacion = $fechaAsignacion;
        $this->acreditacion = $acreditacion;
    }    
    static function insetarPrograma($pNombre, $pFecha, $pAcreditacion)
    {
        include '../conexion.php';
        $mensaje = "resultados: ";
        //Insertar Programa en la BD
        $sql = @mysql_query("INSERT INTO programa(nombre,fechaAsignacion,acreditacion)"
                ."VALUES('$pNombre','$pFecha','$pAcreditacion')");
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
}
