<?php

class UsuarioData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

       $this->db = SPDO::singleton();

    }//constructor

    public function inicioSesion($usuario)
    {
        
        $consulta = $this->db->prepare("
        SELECT IF( EXISTS(
                 SELECT USUARIONOMBRE, USUARIOCONTRASENNA
                 FROM TBUSUARIO
                 WHERE USUARIONOMBRE =  '".$usuario->getNombre()."'  AND USUARIOCONTRASENNA = '".$usuario->getContrasenna()."'), 1, 0)");
        
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }
}

