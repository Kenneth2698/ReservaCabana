<?php

class PlanData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();
    } //constructor

    public function insertarPlan($cantDias, $monto, $cantCuotas, $restricciones)
    {

        $consulta = $this->db->prepare("
            INSERT INTO tbplan (plancantidaddias,planmonto,plannumerocuotas,planrestricciones)  VALUES ( $cantDias,$monto,$cantCuotas,'$restricciones');");


        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function obtenerTemporadas()
    {

        $consulta = $this->db->prepare('SELECT tbtemporadaid, tbtemporadanombre,tbtemporadafechainicio,tbtemporadafechafinal FROM tbtemporada');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerPlanes()
    {

        $consulta = $this->db->prepare('SELECT planid,plancantidaddias,planmonto,plannumerocuotas,planrestricciones FROM tbplan');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerFechasTemmporada($r){
        $consulta = $this->db->prepare("SELECT tbtemporadafechainicio,tbtemporadafechafinal FROM tbtemporada WHERE tbtemporadaid = $r");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return "Del ".$resultado[0][0]." al ".$resultado[0][1];
    }
}
