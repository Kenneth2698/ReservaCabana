<?php

session_start();

if (!isset($_SESSION['idTemporada'])) {
    $_SESSION['idTemporada'] = array();
}
if (!isset($_SESSION['indice'])) {
    $_SESSION['indice'] = 0;
}



require 'data/PlanData.php';
require 'data/TemporadaData.php';
class PlanBusiness
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function mostrarCrearPlan()
    {

        $temporadaData = new TemporadaData();
        $resultado['temporadas'] = $temporadaData->obtenerTemporadas();

        $this->view->show("crearPlanView.php", $resultado);
    }

    public function agregarRestriccion()
    {
        $idTemporada = $_POST['idTemporada'];

        $_SESSION['idTemporada'][$_SESSION['indice']] = $idTemporada;

        $_SESSION['indice']++;
    }

    public function insertarPlan()
    {
        $cantidadDias = $_POST['plancantidaddias'];

        $planmonto = $_POST['planmonto'];

        $plannumerocuotas = $_POST['plannumerocuotas'];

        $montocuota = $planmonto / $plannumerocuotas;

        $restricciones = "";


        foreach ($_SESSION['idTemporada'] as $restriccion) {
            $restricciones = $restricciones . ',' . $restriccion;
        }


        $restricciones = substr($restricciones, 1, strlen($restricciones));

        $_SESSION['idTemporada'] = array();
        $_SESSION['indice'] = 0;

        $planData = new PlanData();
        $planData->insertarPlan($cantidadDias, $planmonto, $plannumerocuotas, $restricciones);

        $resultado['temporadas'] = $planData->obtenerTemporadas();

        $this->view->show("crearPlanView.php", $resultado);
    }

    public function mostrarVerPlan()
    {
        $planData = new PlanData();
        $resultado['planes'] = $planData->obtenerPlanes();



        $contador = 0;
        $restriccionesArray = array();

        foreach ($resultado['planes'] as $restricciones) {
            $restriccionesArray[$contador] = explode(',', $restricciones['planrestricciones']);
            $contador++;
        }

        $fechas = array();
        $contadorRestricciones = 0;
        foreach ($restriccionesArray as $restricciones) {
            $contadorFechas=0;
            foreach ($restricciones as $r) {
                $fechas[$contadorRestricciones][$contadorFechas] = array();
                $fechas[$contadorRestricciones][$contadorFechas]= $planData->obtenerFechasTemmporada($r);
                $contadorFechas++;
            }
            $contadorRestricciones++;
        }
        $resultado['fechas']=$fechas;

        
       $this->view->show("verPlanesView.php", $resultado);
    }
}




