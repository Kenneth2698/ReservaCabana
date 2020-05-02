<?php

require 'domain/Temporada.php';
require 'data/TemporadaData.php';

class TemporadaBusiness
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }
    
    public function cargarCrearTemporada(){
        $this->view->show("crearTemporadaView.php");
    }

    public function cargarVerTemporadas(){


        $temporadaData = new TemporadaData();

        $resultado['temporadas']= $temporadaData->obtenerTemporadas();

        $this->view->show("verTemporadasView.php",$resultado);
    }

    
    public function insertarTemporada(){
        
        $temporadaData = new TemporadaData();


        
        $temporada = new Temporada(0,$_POST['tbtemporadanombre'],$_POST['tbtemporadafechainicio'],$_POST['tbtemporadafechafinal']);


        $temporadaData->insertarTemporada($temporada);

        $resultado['temporadas']= $temporadaData->obtenerTemporadas();

        $this->view->show("verTemporadasView.php",$resultado);

    }

    public function cargarActualizarTemporada(){
        
        $temporadaData = new TemporadaData();

        
        $temporada = new Temporada($_POST['tbtemporadaid'],$_POST['tbtemporadanombre'],$_POST['tbtemporadafechainicio'],$_POST['tbtemporadafechafinal']);

        $this->view->show("actualizarTemporadaView.php",$temporada);

    }

    public function actualizarTemporada(){
        
        $temporadaData = new TemporadaData();
        
        $temporada = new Temporada($_POST['tbtemporadaid'],$_POST['tbtemporadanombre'],$_POST['tbtemporadafechainicio'],$_POST['tbtemporadafechafinal']);
        
        $temporadaData->actualizarTemporada($temporada);

        $resultado['temporadas']= $temporadaData->obtenerTemporadas();

        $this->view->show("verTemporadasView.php",$resultado);

    }

    public function eliminarTemporada(){
        
        $temporadaData = new TemporadaData();

        $temporadaData->eliminarTemporada($_POST['tbtemporadaid']);

        $resultado['temporadas']= $temporadaData->obtenerTemporadas();

        $this->view->show("verTemporadasView.php",$resultado);

    }



  


}    
?>