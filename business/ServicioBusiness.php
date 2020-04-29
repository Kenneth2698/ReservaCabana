<?php

require 'domain/Servicio.php';
require 'data/ServicioData.php';

class ServicioBusiness
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }
    
    public function cargarCrearServicio(){
        $this->view->show("crearServicio.php");
    }

    public function cargarVerServicios(){


        $servicioData = new ServicioData();

        $resultado['servicios']= $servicioData->obtenerServicios();

        $this->view->show("verServicios.php",$resultado);
    }

    
    public function insertarServicio(){
        
        $servicioData = new ServicioData();


        
        $servicio = new Servicio(0,$_POST['servicionombre'],$_POST['serviciodescripcion'],$_POST['servicioimagenruta']);


        $servicioData->insertarServicio($servicio);

        $this->cargarCrearServicio();

    }

    public function cargarActualizarServicio(){
        
        $servicioData = new ServicioData();

        
        $servicio = new Servicio($_POST['servicioid'],$_POST['servicionombre'],$_POST['serviciodescripcion'],$_POST['servicioimagenruta']);

        $this->view->show("actualizarServicio.php",$servicio);

    }

    public function actualizarServicio(){
        
        $servicioData = new ServicioData();
        
        $servicio = new Servicio($_POST['servicioid'],$_POST['servicionombre'],$_POST['serviciodescripcion'],$_POST['servicioimagenruta']);
        
        $servicioData->actualizarServicio($servicio);

        $resultado['servicios']= $servicioData->obtenerServicios();

        $this->view->show("verServicios.php",$resultado);

    }

    public function eliminarServicio(){
        
        $servicioData = new ServicioData();

        $servicioData->eliminarServicio($_POST['servicioid']);

        $resultado['servicios']= $servicioData->obtenerServicios();

        $this->view->show("verServicios.php",$resultado);

    }
}    
?>