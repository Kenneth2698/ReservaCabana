<?php

class CabanaData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

       $this->db = SPDO::singleton();

    }//constructor



    public function insertarCabana($cabana){

        $consulta = $this->db->prepare("
            INSERT INTO tbcabana (cabananombre) VALUES ( '".$cabana->getNombre()."');");

        $consulta->execute();


    }


    public function obtenerCabanas(){

        $consulta = $this->db->prepare('select cabanaid,cabananombre from tbcabana');
        
        
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        
        return $resultado;

    }



    public function actualizarServicio($servicio){

        $consulta = $this->db->prepare("
        UPDATE tbservicio 
        SET servicionombre='".$servicio->getNombre()."',
        serviciodescripcion='".$servicio->getDescripcion()."'
        WHERE servicioid='".$servicio->getId()."'
        "); 
            
        $consulta->execute();
   //falta actualizar la imagen 

    }

    
    public function eliminarServicio($servicio){
        $consulta = $this->db->prepare("DELETE FROM tbservicio WHERE servicioid=$servicio");

        $consulta->execute();


    }
}
