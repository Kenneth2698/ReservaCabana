<?php
class ClienteData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();
    } //constructor


    public function insertarCliente($cliente)
    {
        $consulta = $this->db->prepare("
            INSERT INTO tbcliente (clientenombrecompleto) 
            
            VALUES ( '" . $cliente->getNombre() . "')");


        $consulta->execute();
        $consulta->closeCursor();
    }


    public function obtenerClientes()
    {

        $consulta = $this->db->prepare('
                                        SELECT clienteid,clientenombrecompleto
                                        FROM tbcliente');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function eliminarCliente($clienteid)
    {
        $consulta = $this->db->prepare("DELETE FROM tbcliente WHERE clienteid=$clienteid");

        $consulta->execute();
        $consulta->closeCursor();
    }

    public function actualizarServicio($cliente){

        $consulta = $this->db->prepare("
        UPDATE tbcliente 
        SET clientenombrecompleto='".$cliente->getNombre()."'
        WHERE clienteid='".$cliente->getId()."'
        "); 
            
        $consulta->execute();
        $consulta->closeCursor();

    }
}
