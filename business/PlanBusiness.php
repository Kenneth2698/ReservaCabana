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
            $contadorFechas = 0;
            foreach ($restricciones as $r) {
                $fechas[$contadorRestricciones][$contadorFechas] = array();
                $fechas[$contadorRestricciones][$contadorFechas] = $planData->obtenerFechasTemmporada($r);
                $contadorFechas++;
            }
            $contadorRestricciones++;
        }
        $resultado['fechas'] = $fechas;


        $this->view->show("verPlanesView.php", $resultado);
    }

    public function mostrarAdquirirPlan()
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
            $contadorFechas = 0;
            foreach ($restricciones as $r) {
                $fechas[$contadorRestricciones][$contadorFechas] = array();
                $fechas[$contadorRestricciones][$contadorFechas] = $planData->obtenerFechasTemmporada($r);
                $contadorFechas++;
            }
            $contadorRestricciones++;
        }
        $resultado['fechas'] = $fechas;


        $resultado['clientes'] = $planData->obtenerClientes();


        $this->view->show("adquirirPlanView.php", $resultado);
    }


    public function adquirirPlan()
    {
        $clienteid = $_POST['select_clientes'];

        $planid =  $_POST['select_planes'];

        $planData = new PlanData();
        $planData->insertarCompraPlan($clienteid, $planid);
        $compraid = $planData->obtenerUltimaCompra($clienteid);
        $montoYCuotas = $planData->obtenerMontoYCuotas($planid);

        $monto = (int) $montoYCuotas[0];
        $cuotas = $montoYCuotas[1];
        $fechaCobro = date("Y-m-d", strtotime(date('Y-m-d') . "+ 1 month"));

        for ($i = 0; $i < $cuotas; $i++) {

            $planData->registrarAbonosPendientes($compraid, $fechaCobro, $monto);

            $fechaCobro = date("Y-m-d", strtotime($fechaCobro . "+ 1 month"));
        }



        ////AQUI ES PARA VOLVER A CARGAR LA VISTA PARA ELEGIR UN PLAN
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
            $contadorFechas = 0;
            foreach ($restricciones as $r) {
                $fechas[$contadorRestricciones][$contadorFechas] = array();
                $fechas[$contadorRestricciones][$contadorFechas] = $planData->obtenerFechasTemmporada($r);
                $contadorFechas++;
            }
            $contadorRestricciones++;
        }
        $resultado['fechas'] = $fechas;


        $resultado['clientes'] = $planData->obtenerClientes();


        $this->view->show("adquirirPlanView.php", $resultado);
    }

    public function seleccionarClienteVerAbonos()
    {


        $planData = new PlanData();
        $resultado['clientes'] = $planData->obtenerClientes();


        $this->view->show("seleccionarClienteVerAbonos.php", $resultado);
    }

    public function verAbonos()
    {

        $clienteid = $_POST['select_clientes'];

        $planData = new PlanData();
        $resultado['abonos'] = $planData->obtenerTodosLosAbonos($clienteid);
        $this->view->show("verAbonosCliente.php", $resultado);
    }


    //Abonos

    public function abonarPlan()
    {
        $abonoplanid = $_GET['planid'];

        $planData = new PlanData();

        $planData->abonarPlan($abonoplanid);

        $resultado['clientes'] = $planData->obtenerClientes();


        $this->view->show("seleccionarClienteVerAbonos.php", $resultado);
    }

    public function abonarPlanRestante()
    {
        $abonoplan = unserialize($_GET["abonos"]);

        $planData = new PlanData();

        foreach ($abonoplan as $abonos) {
            if ($abonos['pagado'] != 1) {
                $planData->abonarPlan($abonos['abonoplanid']);
            }
        }
        $resultado['clientes'] = $planData->obtenerClientes();
        $this->view->show("seleccionarClienteVerAbonos.php", $resultado);
    }

    public function seleccionarClienteTransferir()
    {
        $planData = new PlanData();
        $resultado['clientes'] = $planData->obtenerClientes();

        $this->view->show("seleccionarClienteTransferir.php", $resultado);
    }


    public function mostrarTransferirPlan()
    {
        $cliente_antiguo = $_POST['select_clientes'];

        $planData = new PlanData();
        $resultado['planes'] = $planData->obtenerPlanesCliente($cliente_antiguo);

        $resultado['clientes'] = $planData->obtenerClientes();

        $this->view->show("transferirPlan.php", $resultado);
    }

    public function transferirPlan()
    {


        $compraplanid = $_POST['select_planes'];
        $cliente_nuevo = $_POST['select_clientes'];

        $planData = new PlanData();

        $planData->transferirPlan($cliente_nuevo, $compraplanid);

        $resultado['clientes'] = $planData->obtenerClientes();


        $this->view->show("seleccionarClienteVerAbonos.php", $resultado);
    }

    public function seleccionarClienteVerMorosos()
    {


        $planData = new PlanData();
        $resultado['clientes'] = $planData->obtenerClientes();


        $this->view->show("seleccionarClienteVerMorosos.php", $resultado);
    }

    public function verMorosos()
    {

        $clienteid = $_POST['select_clientes'];

        $planData = new PlanData();
        $resultado['abonos'] = $planData->obtenerTodosLosAbonos($clienteid);
        $this->view->show("verMorosos.php", $resultado);
    }
}
