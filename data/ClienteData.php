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

    public function actualizarCliente($cliente){

        $consulta = $this->db->prepare("
        UPDATE tbcliente 
        SET clientenombrecompleto='".$cliente->getNombre()."'
        WHERE clienteid='".$cliente->getId()."'
        "); 
            
        $consulta->execute();
        $consulta->closeCursor();

    }

    public function insertarTelefonoCliente($string_criterios,$string_valores,$clienteid){
        $consulta = $this->db->prepare("
            INSERT INTO tbtelefono (telefonocriterio,telefonovalor,telefonoclienteid) 
            
            VALUES ( '" . $string_criterios . "','" . $string_valores . "','" . $clienteid . "')");


        $consulta->execute();
        $consulta->closeCursor();
    }

    public function obtenerTelefonos()
    {

        $consulta = $this->db->prepare('
                                        SELECT telefonoid,telefonocriterio,telefonovalor,telefonoclienteid
                                        FROM tbtelefono');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }
}
