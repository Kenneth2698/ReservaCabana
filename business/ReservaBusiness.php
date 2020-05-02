<?php
session_start();
if(!isset($_SESSION['datos_prereserva'])){
    $_SESSION['datos_prereserva']=array();
}

require 'data/ReservaData.php';
require 'data/CabanaData.php';
require 'data/ClienteData.php';

class ReservaBusiness
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    //Carga el formulario de Reservas
    public function cargarCrearReserva(){
        $cabanaData = new CabanaData();

        //Obtiene el id y nombre de las cabanas
        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $this->view->show("crearReserva.php",$resultado);
    }

    //Carga la vista para seleccionar el cliente para una reserva
    public function cargarSeleccionarClienteReserva(){
        $clienteData = new ClienteData();
        $cabanaid = $_POST['select_cabanas']; //0
        $fechaInicio = $_POST['fechaInicio']; //1 
        $fechaFinal = $_POST['fechaFinal'];//2
        $horaInicio = $_POST['horaInicio'];//3
        $horaFinal = $_POST['horaFinal'];//4
        $cantidadPersonas = $_POST['cantidadPersonas'];//5
        $tipoPago = $_POST['tipoPago'];//6
        $_SESSION['datos_prereserva'] = array($cabanaid,$fechaInicio,$fechaFinal,$horaInicio,$horaFinal,$cantidadPersonas,$tipoPago);
        $resultado['clientes'] = $clienteData->obtenerClientes();
        
        $this->view->show("seleccionarClienteReserva.php",$resultado);
    }

    //inserta una nueva reserva en la bd
    public function insertarReserva(){
        $reservaData = new ReservaData();
        $clienteid = $_POST['select_clientes'];

        //Crear codigo reserva
        $fecha1 = $_SESSION['datos_prereserva'][1];
        $fecha2 = $_SESSION['datos_prereserva'][2];
        $date = DateTime::createFromFormat('Y-m-d', $fecha1);
        $date0 = DateTime::createFromFormat('Y-m-d', $fecha2);
        $date1 = new DateTime($_SESSION['datos_prereserva'][1]);
        $date2 = new DateTime($_SESSION['datos_prereserva'][2]);
        $letraDia =  $date->format('D');
        $letraDia2 =  $date0->format('D');
        $letraMes = $date->format('M');
        $dias = $date1->diff($date2);
        $dias = $dias->format('%a');

        //Datos a insertar
        $cabanaid = $_SESSION['datos_prereserva'][0];
        $reservacodigo = $letraMes.$letraDia.$letraDia2.$dias.$clienteid;
        $reservafechainicio = $fecha1;
        $reservafechafin = $fecha2;
        $reservahorainicio = $_SESSION['datos_prereserva'][3];
        $reservahorafin = $_SESSION['datos_prereserva'][4];
        $reservacantidadpersonas = $_SESSION['datos_prereserva'][5];
        $reservatipopago = $_SESSION['datos_prereserva'][6];

        $reservaData->insertarReserva($cabanaid,$reservacodigo,$reservafechainicio,$reservafechafin,$reservahorainicio,$reservahorafin,$reservacantidadpersonas,$reservatipopago,$clienteid);
        $resultado['reservas'] = $reservaData->obtenerReservas();
        $this->view->show("verReserva.php", $resultado);
    }

    public function cargarVerReserva(){
        $reservaData = new ReservaData();
        $resultado['reservas'] = $reservaData->obtenerReservas();
        $this->view->show("verReserva.php",$resultado);
    }

    public function eliminarReserva(){
        $reservaData = new ReservaData();
        $reservaid = $_POST['reservaid'];
        $reservaData->eliminarReserva($reservaid);

        $resultado['reservas'] = $reservaData->obtenerReservas();
        $this->view->show("verReserva.php",$resultado);

    }

    public function cargarActualizarReserva(){
        $reservaData = new ReservaData();
        $reservaid = $_POST['reservaid'];
        $resultado['reserva_actualizar'] = $reservaData->obtenerReservaActualizar($reservaid);
        $fecha1 = DateTime::createFromFormat('Y-m-d', $resultado['reserva_actualizar'][0]['reservafechainicio']);
        $fecha2 = DateTime::createFromFormat('Y-m-d', $resultado['reserva_actualizar'][0]['reservafechafin']);
        $date1 = $fecha1->format('yyyy-MM-dd');
        $date2 = $fecha2->format('yyyy-MM-dd');
        $resultado['reserva_actualizar'][0]['reservafechainicio'] = $date1;
        $resultado['reserva_actualizar'][0]['reservafechafin'] = $date2;

        $this->view->show("actualizarReserva.php",$resultado);
    }

    public function actualizarReserva(){
        $reservaData = new ReservaData();
        //Crear codigo reserva
        $clienteid = $_POST['clienteid'];
        $fecha1 = $_POST['fechaInicio'];
        $fecha2 = $_POST['fechaFinal'];
        $date = DateTime::createFromFormat('Y-m-d', $fecha1);
        $date0 = DateTime::createFromFormat('Y-m-d', $fecha2);
        $date1 = new DateTime($fecha1);
        $date2 = new DateTime($fecha2);
        $letraDia =  $date->format('D');
        $letraDia2 =  $date0->format('D');
        $letraMes = $date->format('M');
        $dias = $date1->diff($date2);
        $dias = $dias->format('%a');

        //Datos a insertar
        $reservacodigo = $letraMes.$letraDia.$letraDia2.$dias.$clienteid;
        $reservafechainicio = $fecha1;
        $reservafechafin = $fecha2;
        $reservahorainicio = $_POST['horaInicio'];
        $reservahorafin = $_POST['horaFinal'];
        $reservacantidadpersonas = $_POST['cantidadPersonas'];
        $reservaid= $_POST['reservaid'];

        $reservaData->actualizarReserva($reservacodigo,$reservafechainicio,$reservafechafin,$reservahorainicio,$reservahorafin,$reservacantidadpersonas,$reservaid);
        $resultado['reservas'] = $reservaData->obtenerReservas();
        $this->view->show("verReserva.php", $resultado);
    }
  
}

?>