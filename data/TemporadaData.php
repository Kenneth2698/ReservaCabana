<?php

class TemporadaData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

       $this->db = SPDO::singleton();

    }//constructor


    public function insertarTemporada($temporada){

        $consulta = $this->db->prepare("
            INSERT INTO tbtemporada (tbtemporadanombre,tbtemporadafechainicio,tbtemporadafechafinal) 
            
            VALUES ( '".$temporada->getNombre()."'  , '".$temporada->getFechaInicio()."' , '".$temporada->getFechaFinal()."');");
            

        $consulta->execute();


    }


    public function obtenerTemporadas(){

        $consulta = $this->db->prepare('SELECT tbtemporadaid, tbtemporadanombre,tbtemporadafechainicio,tbtemporadafechafinal FROM tbtemporada');
        
        
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        
        return $resultado;

    }



    public function actualizarTemporada($temporada){

        $consulta = $this->db->prepare("
        UPDATE tbtemporada 
        SET tbtemporadanombre='".$temporada->getNombre()."',
        tbtemporadafechainicio='".$temporada->getFechaInicio()."',
        tbtemporadafechafinal= '".$temporada->getFechaFinal()."'
        WHERE tbtemporadaid='".$temporada->getId()."'
        "); 
            
        $consulta->execute();


    }

    
    public function eliminarTemporada($temporada){
        $consulta = $this->db->prepare("DELETE FROM tbtemporada WHERE tbtemporadaid=$temporada");

        $consulta->execute();


    }

}
?>