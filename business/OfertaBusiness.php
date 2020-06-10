<?php

require 'data/OfertaData.php';

class OfertaBusiness
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }
    
    public function cargarCrearOferta(){
        $this->view->show("crearOfertaView.php");
    }

    public function verOfertas(){


        $ofertaData = new OfertaData();

        $resultado['ofertas']= $ofertaData->obtenerOfertas();

        $this->view->show("verOfertasView.php",$resultado);
    }

    
    public function insertarOferta(){
        $ofertanombre=$_POST["ofertanombre"];
        $ofertafechainicio=$_POST["ofertafechainicio"];
        $ofertafechafin=$_POST["ofertafechafin"];
        $ofertaprecio=$_POST["ofertaprecio"];
        
        $ofertaData = new OfertaData();

        $ofertaData->insertarOferta($ofertanombre,$ofertafechainicio,$ofertafechafin,$ofertaprecio);

        $resultado['ofertas']= $ofertaData->obtenerOfertas();

        $this->view->show("verOfertasView.php",$resultado);

    }

    public function cargarActualizarOferta(){
        
        $ofertaData = new OfertaData();

        $resultado["ofertas"] = array();
        array_push($resultado["ofertas"],$_POST['ofertaid']);
        array_push($resultado["ofertas"],$_POST['ofertanombre']);
        array_push($resultado["ofertas"],$_POST['ofertafechainicio']);
        array_push($resultado["ofertas"],$_POST['ofertafechafin']);
        array_push($resultado["ofertas"],$_POST['ofertaprecio']);

        $this->view->show("actualizarOfertaView.php",$resultado);

    }

    public function actualizarOferta(){
        
        $ofertaData = new OfertaData();
        
        $ofertaData->actualizarOferta($_POST['ofertaid'],$_POST['ofertanombre'],$_POST['ofertafechainicio'],$_POST['ofertafechafin'],$_POST['ofertaprecio']);

        $resultado['ofertas']= $ofertaData->obtenerOfertas();

        $this->view->show("verOfertasView.php",$resultado);

    }

    public function eliminarOferta(){
        
        $ofertaData = new OfertaData();

        $ofertaData->eliminarOferta($_POST['ofertaid']);

        $resultado['ofertas']= $ofertaData->obtenerOfertas();

        $this->view->show("verOfertasView.php",$resultado);

    }



  


}    
?>