<?php


session_start();

if (!isset($_SESSION['lista_criterios'])) {
    $_SESSION['lista_criterios'] = array();
}

if (!isset($_SESSION['lista_valores'])) {
    $_SESSION['lista_valores'] = array();
}

if (!isset($_SESSION['lista_prioridad'])) {
    $_SESSION['lista_prioridad'] = array();
}

if (!isset($_SESSION['indice'])) {
    $_SESSION['indice'] = 0;
}


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

    public function cargarCrearCabana()
    {
        $this->view->show("crearCabanaView.php");
    }


    public function cargarVerCabanas()
    {


        $cabanaData = new CabanaData();

        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $this->view->show("verCabanasView.php", $resultado);
    }

    public function insertarCabana()
    {

        $cabanaData = new CabanaData();

        $cabana = new Cabana(0, $_POST['cabananombre']);

        $cabanaData->insertarCabana($cabana);

        $this->cargarCrearCabana();
    }

    public function cargarActualizarCabana()
    {

        $cabana = new Cabana($_POST['cabanaid'], $_POST['cabananombre']);

        $this->view->show("actualizarCabanas.php", $cabana);
    }

    public function actualizarCabana()
    {
        $cabanaData = new CabanaData();


        $cabana = new Cabana($_POST['cabanaid'], $_POST['cabananombre']);
        $cabanaData->actualizarCabana($cabana);

        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $this->view->show("verCabanasView.php", $resultado);
    }

    public function eliminarCabana()
    {

        $cabanaData = new CabanaData();

        $cabanaData->eliminarCabana($_POST['cabanaid']);

        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $this->view->show("verCabanasView.php", $resultado);
    }

    public function cargarCrearCabanaCaracteristicas()
    {


        $cabanaData = new CabanaData();

        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $this->view->show("crearCabanaCaracteristicaView.php", $resultado);
    }

    public function agregarCriterioValorPrioridad()
    {
        $criterio = $_POST['criterio'];
        $valor = $_POST['valor'];
        $prioridad = $_POST['prioridad'];

        $_SESSION['lista_criterios'][$_SESSION['indice']] = $criterio;
        $_SESSION['lista_valores'][$_SESSION['indice']] = $valor;
        $_SESSION['lista_prioridad'][$_SESSION['indice']] = $prioridad;

        $_SESSION['indice']++;
    }

    public function insertarCabanaCaracteristica()
    {
        $_SESSION['lista_criterios'];

        $_SESSION['lista_criterios'];

        $_SESSION['indice'];

        $criterio = "";
        $valor = "";
        $prioridad = "";
        $codigo = "";


        foreach ($_SESSION['lista_criterios'] as $criterios) {
            $criterio = $criterio . ',' . $criterios;
        }

        foreach ($_SESSION['lista_valores'] as $valores) {
            $valor = $valor . ',' . $valores;
        }

        foreach ($_SESSION['lista_prioridad'] as $prioridades) {
            $prioridad = $prioridad . ',' . $prioridades;
        }

        for ($i = 1; $i < $_SESSION['indice'] + 1; $i++) {
            $codigo = $codigo . ',' . $_POST['cabanaid'] . '-' . $i;
        }


        unset($_SESSION['lista_criterios']);
        unset($_SESSION['lista_valores']);
        unset($_SESSION['lista_prioridad']);

        unset($_SESSION['indice']);



        $cabanaData = new CabanaData();

        $cabanaData->insertarCabanaCaracteristica($_POST['cabanaid'], ltrim($codigo, ','), ltrim($criterio, ','), ltrim($valor, ','), ltrim($prioridad, ','));

        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $this->view->show("crearCabanaCaracteristicaView.php", $resultado);
    }

    public function cargarVerCaracteristicas()
    {

        $cabanaData = new CabanaData();


        $resultado = $cabanaData->obtenerCaracteristicas();
        
     
        $this->view->show("verCaracteristicasView.php", $resultado);  
    }

    public function eliminarCaracteristica(){
        $caracteristicaid = $_POST['caracteristicaid'];
        
        $cabanaData = new CabanaData();


        $resultado = $cabanaData->eliminarCaracteristicas($caracteristicaid);


        $resultado = $cabanaData->obtenerCaracteristicas();
        
     
        $this->view->show("verCaracteristicasView.php", $resultado);  

    }

    public function actualizarCriterioValor(){
        $criterio = $_POST['criterio'];
        $valor = $_POST['valor'];
        $caracteristicaid = $_POST['caracteristicaid'];


        $cabanaData = new CabanaData();


        $cabanaData->actualizarCriterioValor($criterio,$valor,$caracteristicaid);

        $resultado = $cabanaData->obtenerCaracteristicas();
        
     
        $this->view->show("verCaracteristicasView.php", $resultado);  
    }

};
