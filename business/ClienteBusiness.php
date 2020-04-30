<?php
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
        
        $clienteData->actualizarServicio($cliente);

        $resultado['clientes']= $clienteData->obtenerClientes();

        $this->view->show("verClientes.php",$resultado);
    }

    public function eliminarCliente(){
                
        $clienteData = new ClienteData();

        $clienteData->eliminarCliente($_POST['clienteid']);

        $resultado['clientes']= $clienteData->obtenerClientes();

        $this->view->show("verClientes.php",$resultado);
    }

}

?>