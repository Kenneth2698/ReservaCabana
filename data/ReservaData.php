<?php

class ReservaData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();
    } //constructor



    public function insertarReserva($cabanaid, $reservacodigo, $reservafechainicio, $reservafechafin, $reservahorainicio, $reservahorafin, $reservacantidadpersonas, $reservatipopago, $clienteid)
    {

        $consulta = $this->db->prepare("
            INSERT INTO tbreserva (cabanaid,reservacodigo,reservafechainicio,reservafechafin,reservahorainicio,reservahorafin,reservacantidadpersonas,reservatipopago,reservaclienteid)
             VALUES ( '" . $cabanaid . "','" . $reservacodigo . "','" . $reservafechainicio . "','" . $reservafechafin . "','" . $reservahorainicio . "','" . $reservahorafin . "','" . $reservacantidadpersonas . "','" . $reservatipopago . "','" . $clienteid . "');");

        $consulta->execute();
    }


    public function obtenerReservas()
    {

        $consulta = $this->db->prepare('select * from tbreserva');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function eliminarReserva($reservaid)
    {
        $consulta = $this->db->prepare("DELETE FROM tbreserva WHERE reservaid=$reservaid");

        $consulta->execute();
        $consulta->closeCursor();
    }

    public function obtenerReservaActualizar($reservaid)
    {
        $consulta = $this->db->prepare("
        SELECT reservaid,reservaclienteid,reservafechainicio,reservafechafin,reservahorainicio,reservahorafin,reservacantidadpersonas
        FROM tbreserva WHERE reservaid ='" . $reservaid . "';");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function actualizarReserva($reservacodigo, $reservafechainicio, $reservafechafin, $reservahorainicio, $reservahorafin, $reservacantidadpersonas, $reservaid)
    {
        $consulta = $this->db->prepare("
        UPDATE tbreserva 
        SET reservacodigo='" . $reservacodigo . "',
        reservafechainicio='" . $reservafechainicio . "',
        reservafechafin='" . $reservafechafin . "',
        reservahorainicio='" . $reservahorainicio . "',
        reservahorafin='" . $reservahorafin . "',
        reservacantidadpersonas='" . $reservacantidadpersonas . "'
        WHERE reservaid='" . $reservaid . "'
        ;");

        $consulta->execute();
        $consulta->closeCursor();
    }

    public function obtenerTodasLasCaracteristicas()
    {
        $consulta = $this->db->prepare("
        SELECT cabanacaracteristicacriterio
        FROM tbcabanacaracteristica;");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function obtenerTodosLosValores()
    {
        $consulta = $this->db->prepare("
        SELECT cabanacaracteristicavalor
        FROM tbcabanacaracteristica;");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function obtenerResultadosFiltrados($nombre, $fecha1, $fecha2, $cantidad, $criterio)
    {
        $consulta = $this->db->prepare("SELECT c.cabanaid , c.cabananombre, cc.cabanacaracteristicacriterio, cc.cabanacaracteristicavalor, ci.caracteristicaimagenruta ,cc.cabanacaracteristicaprioridad,cd.direccionprovincia, cd.direccioncanton,cd.direcciondistrito,cd.direccionotrasenas FROM tbcabana c
        JOIN tbcabanacaracteristica cc
        ON c.cabanaid = cc.cabanaid
        JOIN tbcabanadireccion cd
        ON c.cabanaid = cd.cabanaid
        JOIN tbcaracteristicaimagen ci
        on cc.tbcabanacaracteristicaid = ci.cabanacaracteristicaid 
        WHERE NOT EXISTS(
					SELECT c.cabanaid FROM tbreserva r2
					JOIN tbcabana c2
					ON c2.cabanaid = r2.cabanaid
					WHERE reservafechainicio >= '$fecha1' AND reservafechafin <= '$fecha2' AND c.cabanaid = c2.cabanaid
					)
        OR  c.cabananombre like '%$nombre%' AND c.cabanacantidad >=10 AND cc.cabanacaracteristicavalor like '%$criterio%'	
        AND NOT EXISTS(
					SELECT c.cabanaid FROM tbreserva r2
					JOIN tbcabana c2
					ON c2.cabanaid = r2.cabanaid
					WHERE reservafechainicio >= '$fecha1' AND reservafechafin <= '$fecha2' AND c.cabanaid = c2.cabanaid
					)
        ");

        $consulta->execute();
        $resultado = $consulta->fetchAll();



        $consulta->closeCursor();
        return $resultado;
    }

    public function verificarCabana($cabanaid, $fecha1, $fecha2, $cantidad)
    {

        $consulta = $this->db->prepare("SELECT c.cabanaid, c.cabananombre FROM tbcabana c
        WHERE  c.cabanaid = $cabanaid
        AND NOT EXISTS(
					SELECT c.cabanaid FROM tbreserva r2
					JOIN tbcabana c2
					ON c2.cabanaid = r2.cabanaid
					WHERE reservafechainicio >= '$fecha1' AND reservafechafin <= '$fecha2' AND c.cabanaid = c2.cabanaid
					)
        ");

        $consulta->execute();
        $resultado = $consulta->fetchAll();

        return $resultado;
    }

    public function obtenerDisponibilidadManana($fecha, $cabanaid)
    {

        $consulta = $this->db->prepare("SELECT NOT EXISTS 
                                        (select * from tbreserva where reservahorainicio < '11:59:00' 
                                        AND ('$fecha' BETWEEN reservafechainicio AND reservafechafin)
                                         AND cabanaid = $cabanaid) as manana");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado[0][0];
    }

    public function obtenerDisponibilidadTarde($fecha, $cabanaid)
    {
        $consulta = $this->db->prepare("SELECT NOT EXISTS 
                                        (select * from tbreserva where reservahorainicio < '17:59:00' 
                                        AND ('$fecha' BETWEEN reservafechainicio AND reservafechafin)
                                        AND  cabanaid = $cabanaid ) as tarde");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado[0][0];
    }

    public function obtenerDisponibilidadNoche($fecha, $cabanaid)
    {
        $consulta = $this->db->prepare("SELECT NOT EXISTS 
                                            (select * from tbreserva where reservahorainicio < '05:59:00' 
                                            AND ('$fecha' BETWEEN reservafechainicio AND reservafechafin)
                                            AND  cabanaid =  $cabanaid ) as noche");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado[0][0];
    }
}
