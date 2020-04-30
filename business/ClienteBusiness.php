<?php
session_start();
if(!isset($_SESSION['clienteid'])){
    $_SESSION['clienteid'] = 0;
}

if(!isset($_SESSION['lista_clientes'])){
    $_SESSION['lista_clientes'] = array();
}

if(!isset($_SESSION['lista_criterios'])){
    $_SESSION['lista_criterios'] = array();
}

if(!isset($_SESSION['lista_valores'])){
    $_SESSION['lista_valores'] = array();
}

if(!isset($_SESSION['index_criterios'])){
    $_SESSION['index_criterios'] = 0;
}

if(!isset($_SESSION['index_valores'])){
    $_SESSION['index_valores'] = 0;
}

require 'data/clienteData.php';
require 'domain/Cliente.php';
class ClienteBusiness{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }
    
    //VISTAS
    public function cargarCrearCliente(){
        $this->view->show("crearClienteView.php");
    }

    public function cargarActualizarCliente(){
        $clienteData = new ClienteData();
        
        $cliente = new Cliente($_POST['clienteid'],$_POST['clientenombrecompleto']);

        $this->view->show("actualizarCliente.php",$cliente);
    }

    public function cargarVerCliente(){

        $clienteData = new ClienteData();

        $resultado['clientes'] = $clienteData->obtenerClientes();

        $_SESSION['lista_clientes'] = $resultado['clientes'];

        $this->view->show("verClientes.php",$resultado);
    }

    //FUNCIONES

    public function insertarCliente(){
        
        $nombreCompleto = $_POST['clientenombrecompleto'];
        $clienteData = new ClienteData();
        $cliente = new Cliente(0,$nombreCompleto);

        $clienteData->insertarCliente($cliente);

        $this->cargarCrearCliente();
    }





    public function actualizarCliente(){
        $clienteData = new ClienteData();
        
        $cliente = new Cliente($_POST['clienteid'],$_POST['clientenombrecompleto']);
        
        $clienteData->actualizarCliente($cliente);

        $resultado['clientes']= $clienteData->obtenerClientes();

        $this->view->show("verClientes.php",$resultado);
    }

    public function eliminarCliente(){
                
        $clienteData = new ClienteData();

        $clienteData->eliminarCliente($_POST['clienteid']);

        $resultado['clientes']= $clienteData->obtenerClientes();

        $this->view->show("verClientes.php",$resultado);
    }


//////////////////TELEFONO


    public function listarClientes(){
        $clienteData = new ClienteData();

        $resultado['clientes'] = $clienteData->obtenerClientes();

        $_SESSION['lista_clientes'] = $resultado['clientes'];

        $this->view->show("seleccionarClienteTelefono.php",$resultado);
    }

    public function cargarCrearTelefono(){
        $_SESSION['clienteid'] = $_POST['select_clientes'];
        $this->view->show("crearTelefono.php");
    }

    public function ampliarListaTel(){
        $criterio = $_POST['criterio'];
        $valor = $_POST['valor'];

        $_SESSION['lista_criterios'][$_SESSION['index_criterios']] = $criterio;
        $_SESSION['index_criterios']++;

        $_SESSION['lista_valores'][$_SESSION['index_valores']] = $valor;
        $_SESSION['index_valores']++;
    }

    public function insertarTelefono(){

        $string_criterios = "";
        $string_valores = "";

        foreach($_SESSION['lista_criterios'] as $row){
            $string_criterios =  $string_criterios . ',' . $row;
        }

        foreach($_SESSION['lista_valores'] as $row){
            $string_valores = $string_valores . ',' . $row;
        }
        $string_criterios = ltrim($string_criterios, $string_criterios[0]);
        $string_valores = ltrim($string_valores, $string_valores[0]);

        $clienteData = new ClienteData();

        $clienteData->insertarTelefonoCliente($string_criterios,$string_valores, $_SESSION['clienteid']);

        //Limpia los arrays
        $_SESSION['index_criterios'] = 0;
        $_SESSION['index_valores'] = 0;
        $_SESSION['lista_criterios'] = array();
        $_SESSION['lista_valores'] = array();

        $this->view->show("menuServicios.php");
        

    }


    public function cargarVerTelefonos(){
        $clienteData = new ClienteData();

        $resultado['telefonos'] = $clienteData->obtenerTelefonos();

        $index = 0;
        foreach($resultado['telefonos'] as $row){
            $id = $index;
            $criterios = explode(',',$resultado['telefonos'][$index][1]);
            $valores = explode(',',$resultado['telefonos'][$index][2]);
            $clienteid = $resultado['telefonos'][$index][3];
            $telefonos[$index] = array("id"=>$id,"criterios"=>$criterios,"valores"=>$valores,"clienteid"=>$clienteid);
            $index++;
        }

        $myObj = json_encode($telefonos);
        $this->view->show("verTelefono.php",$myObj);
    }

    public function cargarEliminarTelefono(){
        echo $_POST['telefonoclienteid'];
    }
    public function cargarActualizarTelefono(){
        echo $_POST['telefonoclienteid'];
    }
}

?>