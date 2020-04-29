<?php

class ServicioData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

       $this->db = SPDO::singleton();

    }//constructor


    public function insertarServicio($servicio){

        $consulta = $this->db->prepare("
            INSERT INTO tbservicio (servicionombre,serviciodescripcion) 
            
            VALUES ( '".$servicio->getNombre()."'  , '".$servicio->getDescripcion()."');");//  , 1"./*$servicio->getImagen().*/")");//FALTA INSERTAR LA IMAGEN  PRIMERO Y OBTENER EL ID DE LA IMAGEN
            

        $consulta->execute();


    }


    public function obtenerServicios(){

        $consulta = $this->db->prepare('
                                        SELECT s.servicioid, s.servicionombre,s.serviciodescripcion,sm.servicioimagenruta FROM tbservicio s
                                                    JOIN tbservicioimagen sm
                                                        ON s.servicioid = sm.servicioid');
        
        
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
?>