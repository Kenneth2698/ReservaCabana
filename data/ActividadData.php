<?php

class ActividadData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();
    } //constructor

    public function crearActividad($actividadnombre, $actividaddueno, $actividaddescripcion, $actividadprecio, $actividadimagen1, $actividadimagen2, $actividadestado, $actividadcabana)
    {

        $consulta = $this->db->prepare("
            INSERT INTO tbactividades (actividadnombre,actividaddueno,actividaddescripcion,actividadprecio,actividadimagen1,actividadimagen2,actividadestado, cabanaid)  VALUES ( '" . $actividadnombre . "','" . $actividaddueno . "','" . $actividaddescripcion . "','" . $actividadprecio . "','" . $actividadimagen1 . "','" . $actividadimagen2 . "','" . $actividadestado . "','" . $actividadcabana . "');");

        $consulta->execute();
        $consulta->CloseCursor();
    }

    public function obtenerActividades($cabanaid)
    {
        $consulta = $this->db->prepare("
            SELECT * FROM tbactividades WHERE cabanaid = $cabanaid;");


        $consulta->execute();
        $data = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $data;
    }

    public function eliminarActividad($actividadid)
    {
        $consulta = $this->db->prepare("
            DELETE FROM tbactividades WHERE actividadid = $actividadid");


        $consulta->execute();
        $consulta->CloseCursor();
    }

    public function obtenerActividadesActualizar($actividadid)
    {
        $consulta = $this->db->prepare("
        SELECT * FROM tbactividades WHERE actividadid = $actividadid;");


        $consulta->execute();
        $data = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $data;
    }

    public function cabanas()
    {
        $consulta = $this->db->prepare('select cabanaid,cabananombre from tbcabana');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function actualizarActividad($actividadnombre, $actividaddueno, $actividaddescripcion, $actividadprecio, $actividadimagen1, $actividadimagen2, $cabanaid, $actividadid)
    {
        $consulta = $this->db->prepare("
        UPDATE tbactividades
        SET actividadnombre = '".$actividadnombre."',
        actividaddueno = '".$actividaddueno."',
        actividaddescripcion = '".$actividaddescripcion."',
        actividadprecio = $actividadprecio,
        actividadimagen1 = '".$actividadimagen1."',
        actividadimagen2 = '".$actividadimagen2."',
        cabanaid = '".$cabanaid."'        
        WHERE actividadid = '".$actividadid."';");

        $consulta->execute();
        $consulta->CloseCursor();
    }

    public function obtenerTodasActividades(){
        $consulta = $this->db->prepare("
        SELECT * FROM tbactividades;");


        $consulta->execute();
        $data = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $data;
    }

    public function aceptarORechazar($actividadestado,$actividadid){
        $consulta = $this->db->prepare("
        UPDATE tbactividades
        SET actividadestado = '".$actividadestado."'       
        WHERE actividadid = '".$actividadid."';");

        $consulta->execute();
        $consulta->CloseCursor();
    }
}
