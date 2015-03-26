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
    
    function Aspirante($nombre, $apellido, $identificacion, $fecha_nacimiento, $lugar_nacimiento, $genero, $colegio, $promedio, $foto) {
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
    
    
    static function insertarAspirante($pIdentificacion, $pNombre, $pApellido, $pFecha_nacimiento, $pLugar_nacimiento, $pGenero, $pColegio, $pPromedio, $pFoto) {
        include 'conexion.php';
        $mensaje = "resultados: ";
        //Insertar aspirante en la BD
        $sql = @mysql_query("INSERT INTO aspirante(identificacion, nombres, apellidos, fecha_nacimiento, lugar_nacimiento, genero, id_colegio, promedio, foto) "
                        . "VALUES('$pIdentificacion','$pNombre','$pApellido','$pFecha_nacimiento','$pLugar_nacimiento','$pGenero', '$pColegio', '$pPromedio','$pFoto')");
        if (!$sql) {
            $mensaje.="Error Insertando Aspirante en la base de datos: " . mysql_error();
        } else {
            $mensaje.="El aspirante con identificacion: " . $pIdentificacion . " fue agregado al sistema";
        }
        return $mensaje;
    }

}
