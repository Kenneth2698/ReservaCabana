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
            INSERT INTO tbcliente (clientenombrecompleto,clienteestado) 
            
            VALUES ( '" . $cliente->getNombre() . "',1)");


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

    public function obtenerTelefonosEliminar($id)
    {

        $consulta = $this->db->prepare("
                                        SELECT telefonoid,telefonocriterio,telefonovalor
                                        FROM tbtelefono WHERE telefonoclienteid='".$id."'
                                        ");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerTelefonosActualizar($id)
    {

        $consulta = $this->db->prepare("
                                        SELECT telefonoid
                                        FROM tbtelefono WHERE telefonoclienteid='".$id."'
                                        ");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function eliminarTelefono($criterios,$valores,$telefonoid){
        
        $consulta = $this->db->prepare("
        UPDATE tbtelefono 
        SET telefonocriterio='".$criterios."',
        telefonovalor='".$valores."'
        WHERE telefonoid='".$telefonoid."'
        ;");

    $consulta->execute();
    $consulta->closeCursor();
    }

    public function actualizarTelefono($telefonoid,$valores){
        $consulta = $this->db->prepare("
        UPDATE tbtelefono 
        SET telefonovalor='".$valores."'
        WHERE telefonoid='".$telefonoid."'
        ;");

    $consulta->execute();
    $consulta->closeCursor();
    }
//tbclientecorreo 
    public function insertarCorreoCliente($string_valores,$clienteid){
        $consulta = $this->db->prepare("
            INSERT INTO tbclientecorreo (correovalor,clienteid) 
            
            VALUES ('" . $string_valores . "','" . $clienteid . "')");


        $consulta->execute();
        $consulta->closeCursor();
    }

    public function obtenerCorreos()
    {

        $consulta = $this->db->prepare('
                                        SELECT correoid,correovalor,clienteid
                                        FROM tbclientecorreo');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerCorreosEliminar($id)
    {

        $consulta = $this->db->prepare("
                                        SELECT correoid,correovalor
                                        FROM tbclientecorreo WHERE clienteid='".$id."'
                                        ");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerCorreosActualizar($id)
    {
        print_r($id);
        $consulta = $this->db->prepare("
                                        SELECT correoid
                                        FROM tbclientecorreo WHERE clienteid='".$id."'
                                        ");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function eliminarCorreo($valores,$correoid){
        
        $consulta = $this->db->prepare("
        UPDATE tbclientecorreo 
        SET correovalor='".$valores."'
        WHERE correoid='".$correoid."'
        ;");

    $consulta->execute();
    $consulta->closeCursor();
    }

    public function actualizarCorreo($correoid,$valores){
        $consulta = $this->db->prepare("
        UPDATE tbclientecorreo 
        SET correovalor='".$valores."'
        WHERE correoid='".$correoid."'
        ;");

    $consulta->execute();
    $consulta->closeCursor();
    }
}
?>