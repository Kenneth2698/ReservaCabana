<?php
session_start();
if (!isset($_SESSION['datos_prereserva'])) {
    $_SESSION['datos_prereserva'] = array();
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
    public function cargarCrearReserva()
    {
        $cabanaData = new CabanaData();

        //Obtiene el id y nombre de las cabanas
        $resultado['cabanas'] = $cabanaData->obtenerCabanas();
        $resultado['cabanas']['bandera'] = 0;
        $this->view->show("crearReserva.php", $resultado);
    }

    //Carga la vista para seleccionar el cliente para una reserva
    public function cargarSeleccionarClienteReserva()
    {
        $clienteData = new ClienteData();
        $cabanaid = $_POST['select_cabanas']; //0            

        $fechaInicio = $_POST['fechaInicio']; //1 
        $fechaFinal = $_POST['fechaFinal']; //2
        $horaInicio = $_POST['horaInicio']; //3
        $horaFinal = $_POST['horaFinal']; //4
        $cantidadPersonas = $_POST['cantidadPersonas']; //5
        $tipoPago = $_POST['tipoPago']; //6
        $_SESSION['datos_prereserva'] = array($cabanaid, $fechaInicio, $fechaFinal, $horaInicio, $horaFinal, $cantidadPersonas, $tipoPago);
        $resultado['clientes'] = $clienteData->obtenerClientes();

        $this->view->show("seleccionarClienteReserva.php", $resultado);
    }

    //inserta una nueva reserva en la bd
    public function insertarReserva()
    {
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
        $reservacodigo = $letraMes . $letraDia . $letraDia2 . $dias . $clienteid;
        $reservafechainicio = $fecha1;
        $reservafechafin = $fecha2;
        $reservahorainicio = $_SESSION['datos_prereserva'][3];
        $reservahorafin = $_SESSION['datos_prereserva'][4];
        $reservacantidadpersonas = $_SESSION['datos_prereserva'][5];
        $reservatipopago = $_SESSION['datos_prereserva'][6];

        $reservaData->insertarReserva($cabanaid, $reservacodigo, $reservafechainicio, $reservafechafin, $reservahorainicio, $reservahorafin, $reservacantidadpersonas, $reservatipopago, $clienteid);
        $resultado['reservas'] = $reservaData->obtenerReservas();
        $this->view->show("verReserva.php", $resultado);
    }

    public function cargarVerReserva()
    {
        $reservaData = new ReservaData();
        $resultado['reservas'] = $reservaData->obtenerReservas();
        $this->view->show("verReserva.php", $resultado);
    }

    public function eliminarReserva()
    {
        $reservaData = new ReservaData();
        $reservaid = $_POST['reservaid'];
        $reservaData->eliminarReserva($reservaid);

        $resultado['reservas'] = $reservaData->obtenerReservas();
        $this->view->show("verReserva.php", $resultado);
    }

    public function cargarActualizarReserva()
    {
        $reservaData = new ReservaData();
        $reservaid = $_POST['reservaid'];
        $resultado['reserva_actualizar'] = $reservaData->obtenerReservaActualizar($reservaid);
        $fecha1 = DateTime::createFromFormat('Y-m-d', $resultado['reserva_actualizar'][0]['reservafechainicio']);
        $fecha2 = DateTime::createFromFormat('Y-m-d', $resultado['reserva_actualizar'][0]['reservafechafin']);
        $date1 = $fecha1->format('yyyy-MM-dd');
        $date2 = $fecha2->format('yyyy-MM-dd');
        $resultado['reserva_actualizar'][0]['reservafechainicio'] = $date1;
        $resultado['reserva_actualizar'][0]['reservafechafin'] = $date2;

        $this->view->show("actualizarReserva.php", $resultado);
    }

    public function actualizarReserva()
    {
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
        $reservacodigo = $letraMes . $letraDia . $letraDia2 . $dias . $clienteid;
        $reservafechainicio = $fecha1;
        $reservafechafin = $fecha2;
        $reservahorainicio = $_POST['horaInicio'];
        $reservahorafin = $_POST['horaFinal'];
        $reservacantidadpersonas = $_POST['cantidadPersonas'];
        $reservaid = $_POST['reservaid'];

        $reservaData->actualizarReserva($reservacodigo, $reservafechainicio, $reservafechafin, $reservahorainicio, $reservahorafin, $reservacantidadpersonas, $reservaid);
        $resultado['reservas'] = $reservaData->obtenerReservas();
        $this->view->show("verReserva.php", $resultado);
    }


    //filtros
    public function cargarFiltroReserva()
    {
        $reservaData = new ReservaData();
        $res["c"] = $reservaData->obtenerTodasLasCaracteristicas();
        $index = 0;

        foreach ($res["c"] as $item) {
            $valores["c"][$index] = explode(',', $res["c"][$index]["cabanacaracteristicacriterio"]);
            $index++;
        }
        $res["v"] = $reservaData->obtenerTodosLosValores();

        $index2 = 0;
        foreach ($res["v"] as $item) {
            $valores["v"][$index2] = explode(',', $res["v"][$index2]["cabanacaracteristicavalor"]);
            $index2++;
        }

        $x = 0;
        $sizeV = 0;
        foreach ($valores["v"] as $row) {
            $sizeV = $sizeV + sizeof($row);
        }

        $valores["t"] = $sizeV;
        $this->view->show("buscarReservaFiltro.php", $valores);
    }

    public function mostrarResultadosFiltrados()
    {
        $nombre = $_POST["nombre"];
        $fecha1 = $_POST["fecha1"];
        $fecha2 = $_POST["fecha2"];
        $cantidad = $_POST["cantidad"];
        $caracteristica = $_POST["caracteristica"];
        $reservaData = new ReservaData();
        $res = $reservaData->obtenerResultadosFiltrados($nombre, $fecha1, $fecha2, $cantidad, $caracteristica);

        if (sizeof($res) != 0) {

            $res[0]['fecha1'] =  $fecha1;
            $res[0]['fecha2'] =  $fecha2;
            $res[0]['cantidad'] = $cantidad;
            $contador = 0;
            foreach ($res as $item) {

                $lista_caracteristicas = array();
                //se dividen los criterios, valores, rutas y prioridades en diferentes array
                $criterios = explode(',', $item['cabanacaracteristicacriterio']);
                $valores = explode(',', $item['cabanacaracteristicavalor']);
                $ruta  = explode(',', $item['caracteristicaimagenruta']);
                $prioridad  = explode(',', $item['cabanacaracteristicaprioridad']);
                $tamano = count($criterios);



                for ($i = 0; $i < $tamano; $i++) {
                    $caracteristica = array();

                    array_push($caracteristica, $prioridad[$i]); //primero se asgina prioridad porque con el se va a hacer el SORT
                    array_push($caracteristica, $criterios[$i]);
                    array_push($caracteristica, $valores[$i]);
                    array_push($caracteristica, $ruta[$i]);
                    array_push($lista_caracteristicas, $caracteristica); //se agrega la caracteristica a la lista de caractristicas
                }

                sort($lista_caracteristicas); //se ordena la lista por prioridad
                $res[$contador]['lista' . $contador] = $lista_caracteristicas;
                $contador++;
            }


            $this->view->show("todosLosResultados.php", $res);
        } else {
            echo "Calavera";
        }
    }



    public function realizarReservaEspecifica()
    {
        $datos = array("cabanaid" => $_POST['cabanaid'], "fecha1" => $_POST['fecha1'], "fecha2" => $_POST['fecha2'], "cantidad" => $_POST['cantidad'], "cabananombre" => $_POST['cabananombre']);

        $this->view->show("resultadosReservaFiltrados.php", $datos);
    }

    public function ultimaVerificacion()
    {

        $cabanaid = $_POST['cabanaid'];
        $fecha1 = $_POST['fecha1'];
        $fecha2 = $_POST['fecha2'];
        $cantidad = $_POST['cantidad'];


        $reservaData = new ReservaData();
        $res = $reservaData->verificarCabana($cabanaid, $fecha1, $fecha2, $cantidad);

        if (sizeof($res) != 0) {

            $res[0]['fecha1'] =  $fecha1;
            $res[0]['fecha2'] =  $fecha2;
            $res[0]['cantidad'] = $cantidad;
            $res['cabanas']['bandera'] = 1;

            $this->view->show("crearReserva.php", $res);
        } else {
            echo 'No esta disponible';
        }
    }


    public function cargarCabanasParaCalendario()
    {

        $cabanaData = new CabanaData();
        $resultado['cabanas'] = $cabanaData->obtenerCabanas();
        
        $this->view->show("verCabanasCalendario.php", $resultado);
    }

    public function verificarFechaCalendario()
    {
        $fecha = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
        $cabanaid = $_POST['cabanaid'];

        $reservaData = new ReservaData();

        $disponibilidadManana = $reservaData->obtenerDisponibilidadManana($fecha, $cabanaid);
        $disponibilidadTarde = $reservaData->obtenerDisponibilidadTarde($fecha, $cabanaid);
        $disponibilidadNoche = $reservaData->obtenerDisponibilidadNoche($fecha, $cabanaid);

        $respuesta = array("Manana" => $disponibilidadManana, "Tarde" => $disponibilidadTarde, "Noche" => $disponibilidadNoche);

        echo json_encode($respuesta);
    }

    public function seleccionarCabanaParaCalendario()
    {
        $resultado['cabanaid'] = $_POST['cabanaid'];
        $this->view->show("calendario.php", $resultado);
    }

    public function reservarDesdeCalendario()
    {
        $cabanaid =  $_GET['cabanaid'];
        $codigo =  $_GET['codigo'];
        $dia=substr($codigo,1,strlen($codigo));

        if(strlen($dia)==1){
            $dia = "0".$dia;
        }




        $res[0]['fecha1'] =  date("Y-m-").$dia;
        $res[0]['fecha2'] =   date("Y-m-").$dia;


        $res[0]['hora1'] = "";
        $res[0]['hora2'] = "";

        switch ($codigo[0]) {
            case "M":
                $res[0]['hora1'] = "06:00:00";
                $res[0]['hora2'] = "11:59:00";
                break;

            case "T":
                $res[0]['hora1'] = "12:00:00";
                $res[0]['hora2'] = "17:59:00";
                break;

            case "N":
                $res[0]['hora1'] = "18:00:00";
                $res[0]['hora2'] = "23:59:00";
                break;
        }

        $res[0]['cabanaid'] = $cabanaid;
        $res[0]['cantidad'] = 0;
        $res['cabanas']['bandera'] = 2;

        $this->view->show("crearReserva.php", $res);
    }
}
