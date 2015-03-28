<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Colegio
 *
 * @author MiPc
 */
class Colegio {
   var $nombre;
   var $estado;
   var $ciudad;
   
   function Colegio($nombre, $estado, $ciudad) {
       $this->nombre = $nombre;
       $this->estado = $estado;
       $this->ciudad = $ciudad;
   }
   
    static function insertarColegio($pNombre, $pEstado, $pCiudad) {
        include '../conexion.php';
        $mensaje = "resultados: ";
        //Insertar Colegio en la BD
        $sql = @mysql_query("INSERT INTO colegio(nombre, estado, ciudad) "
                        . "VALUES('$pNombre','$pEstado','$pCiudad')");
        if (!$sql) {
            $mensaje.="Error Insertando Colegio en la base de datos: " . mysql_error();
        } else {
            $mensaje.="El Colegio con nombre: " . $pNombre . " fue agregado al sistema";
        }
        return $mensaje;
    }

}
