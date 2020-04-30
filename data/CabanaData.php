<?php

class CabanaData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();
    } //constructor



    public function insertarCabana($cabana)
    {

        $consulta = $this->db->prepare("
            INSERT INTO tbcabana (cabananombre) VALUES ( '" . $cabana->getNombre() . "');");

        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function obtenerCabanas()
    {

        $consulta = $this->db->prepare('select cabanaid,cabananombre from tbcabana');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }



    public function actualizarCabana($cabana)
    {

        $consulta = $this->db->prepare("
        UPDATE tbcabana 
        SET cabananombre='" . $cabana->getNombre() . "'
        WHERE cabanaid='" . $cabana->getId() . "';");

        $consulta->execute();
        
        $consulta->CloseCursor();
    }


    public function eliminarCabana($cabana)
    {
        $consulta = $this->db->prepare("DELETE FROM tbcabana WHERE cabanaid = $cabana");

        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function insertarCabanaCaracteristica($cabanaid,$codigo,$criterio,$valor,$prioridad)
    {

        $consulta = $this->db->prepare("INSERT INTO tbcabanacaracteristica (cabanaid,cabanacaracteristicacodigo,cabanacaracteristicacriterio,cabanacaracteristicavalor,cabanacaracteristicaprioridad) VALUES ( '" . $cabanaid. "','".$codigo."','".$criterio."','".$valor."','".$prioridad."');");

        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function obtenerCaracteristicas()
    {

        $consulta = $this->db->prepare('select * from tbcabanacaracteristica');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    
}
