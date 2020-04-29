<?php

require 'domain/Servicio.php';
require 'data/ServicioData.php';
require 'domain/Cabana.php';
require 'data/CabanaData.php';

class CabanaBusiness
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function cargarCrearCabana(){
        $this->view->show("crearCabanaView.php");
    }


    public function cargarVerCabanas(){


        $cabanaData = new CabanaData();

        $resultado['cabanas']= $cabanaData->obtenerCabanas();

        $this->view->show("verCabanasView.php",$resultado);
    }

    public function insertarCabana(){
        
        $cabanaData = new CabanaData();

        $cabana = new Cabana(0,$_POST['cabananombre']);

        $cabanaData->insertarCabana($cabana);

        $this->cargarCrearCabana();

    }

    public function 




}


?>
