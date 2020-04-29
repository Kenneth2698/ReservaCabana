<?php

require 'domain/Usuario.php';
require 'data/UsuarioData.php';

class UsuarioBusiness
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function cargarVistaLogin()
    {
        //llamar al modelo para traer datos

        $this->view->show('login.php', null);
    }

    function inicioSesion()
    {

        $usuarioData = new UsuarioData();

        $usuario = new Usuario ($_POST['usuario'],$_POST['contra']);
        

        $data['existe'] = $usuarioData->inicioSesion($usuario);

        foreach ($data['existe'] as $items) {
            if ($items[0] == 1) {
                
                $this->view->show('menuServicios.php', null);
            }else{
                echo 'DATOS INCORRECTOS';
            }
        }

    }

    public function cerrarSesion()
    {
        //llamar al modelo para traer datos

        $this->view->show('indexView.php', null);
    }



}