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
        include 'admin/conexion.php';
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

    
}
