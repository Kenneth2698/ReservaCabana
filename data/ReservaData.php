<?php

class ReservaData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

       $this->db = SPDO::singleton();

    }//constructor



    public function insertarReserva($cabanaid,$reservacodigo,$reservafechainicio,$reservafechafin,$reservahorainicio,$reservahorafin,$reservacantidadpersonas,$reservatipopago,$clienteid){

        $consulta = $this->db->prepare("
            INSERT INTO tbreserva (cabanaid,reservacodigo,reservafechainicio,reservafechafin,reservahorainicio,reservahorafin,reservacantidadpersonas,reservatipopago,reservaclienteid)
             VALUES ( '".$cabanaid."','".$reservacodigo."','".$reservafechainicio."','".$reservafechafin."','".$reservahorainicio."','".$reservahorafin."','".$reservacantidadpersonas."','".$reservatipopago."','".$clienteid."');");

        $consulta->execute();


    }


    public function obtenerReservas(){

        $consulta = $this->db->prepare('select * from tbreserva');
        
        
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        
        return $resultado;

    }

    public function eliminarReserva($reservaid){
        $consulta = $this->db->prepare("DELETE FROM tbreserva WHERE reservaid=$reservaid");

        $consulta->execute();
        $consulta->closeCursor();
    }

    public function obtenerReservaActualizar($reservaid){
        $consulta = $this->db->prepare("
        SELECT reservaid,reservaclienteid,reservafechainicio,reservafechafin,reservahorainicio,reservahorafin,reservacantidadpersonas
        FROM tbreserva WHERE reservaid ='".$reservaid."';");

    $consulta->execute();
    $resultado=$consulta->fetchAll();
    $consulta->closeCursor();
    return $resultado;
    }

    public function actualizarReserva($reservacodigo,$reservafechainicio,$reservafechafin,$reservahorainicio,$reservahorafin,$reservacantidadpersonas,$reservaid){
        $consulta = $this->db->prepare("
        UPDATE tbreserva 
        SET reservacodigo='".$reservacodigo."',
        reservafechainicio='".$reservafechainicio."',
        reservafechafin='".$reservafechafin."',
        reservahorainicio='".$reservahorainicio."',
        reservahorafin='".$reservahorafin."',
        reservacantidadpersonas='".$reservacantidadpersonas."'
        WHERE reservaid='".$reservaid."'
        ;");

    $consulta->execute();
    $consulta->closeCursor();
    }
}
