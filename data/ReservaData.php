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

    public function obtenerTodasLasCaracteristicas(){
        $consulta = $this->db->prepare("
        SELECT cabanacaracteristicacriterio
        FROM tbcabanacaracteristica;");

    $consulta->execute();
    $resultado=$consulta->fetchAll();
    $consulta->closeCursor();
    return $resultado;
    }

    public function obtenerTodosLosValores(){
        $consulta = $this->db->prepare("
        SELECT cabanacaracteristicavalor
        FROM tbcabanacaracteristica;");

    $consulta->execute();
    $resultado=$consulta->fetchAll();
    $consulta->closeCursor();
    return $resultado;
    }

    public function obtenerResultadosFiltrados($nombre,$fecha1,$fecha2,$cantidad,$criterio){
        $consulta = $this->db->prepare("SELECT c.cabanaid , c.cabananombre FROM tbcabana c
        JOIN tbcabanacaracteristica cc
        ON c.cabanaid = cc.cabanaid
        JOIN tbcabanadireccion cd
        ON c.cabanaid = cd.cabanaid
        WHERE cc.cabanacaracteristicavalor LIKE '%".$criterio."%'
            AND c.cabanacantidad >= $cantidad
            AND NOT EXISTS(
                            SELECT * FROM tbreserva r2
                            JOIN tbcabana c2
                            ON c2.cabanaid = r2.cabanaid
                            WHERE reservafechainicio >= '".$fecha1."' AND reservafechafin <= '".$fecha2."' 
                            )
            AND c.cabananombre LIKE '%".$nombre."%';
        ");

    $consulta->execute();
    $resultado=$consulta->fetchAll();
    $consulta->closeCursor();
    return $resultado;
    }
}
