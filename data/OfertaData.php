<?php

class OfertaData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

       $this->db = SPDO::singleton();

    }//constructor


    public function insertarOferta($ofertanombre,$ofertafechainicio,$ofertafechafin,$ofertaprecio){

        $consulta = $this->db->prepare("
            INSERT INTO tbofertas (ofertanombre,ofertafechainicio,ofertafechafin,ofertaprecio) 
            
            VALUES ( '".$ofertanombre."'  , '".$ofertafechainicio."' , '".$ofertafechafin."','".$ofertaprecio."');");
            

        $consulta->execute();


    }


    public function obtenerOfertas(){

        $consulta = $this->db->prepare('SELECT ofertaid, ofertanombre,ofertafechainicio,ofertafechafin,ofertaprecio FROM tbofertas');
        
        
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        
        return $resultado;

    }



    public function actualizarOferta($ofertaid,$ofertanombre,$ofertafechainicio,$ofertafechafin,$ofertaprecio){

        $consulta = $this->db->prepare("
        UPDATE tbofertas 
        SET ofertanombre='".$ofertanombre."',
        ofertafechainicio='".$ofertafechainicio."',
        ofertafechafin= '".$ofertafechafin."',
        ofertaprecio='".$ofertaprecio."'
        WHERE ofertaid='".$ofertaid."'
        "); 
            
        $consulta->execute();


    }

    
    public function eliminarOferta($ofertaid){
        $consulta = $this->db->prepare("DELETE FROM tbofertas WHERE ofertaid=$ofertaid");

        $consulta->execute();


    }

}
?>