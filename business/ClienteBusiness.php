<?php
session_start();
if(!isset($_SESSION['clienteid'])){
    $_SESSION['clienteid'] = 0;
}

if(!isset($_SESSION['clienteid_eliminar'])){
    $_SESSION['clienteid_eliminar'] = 0;
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

if(!isset($_SESSION['telefonos'])){
    $_SESSION['telefonos'] = array();
}

if(!isset($_SESSION['id_tel_eliminar'])){
    $_SESSION['id_tel_eliminar'] = 0;
}

if(!isset($_SESSION['telefonos_eliminar'])){
    $_SESSION['telefonos_eliminar'] = array();
}

//////
if(!isset($_SESSION['id_tel_actualizar'])){
    $_SESSION['id_tel_actualizar'] = 0;
}

if(!isset($_SESSION['telefonos_actualizar'])){
    $_SESSION['telefonos_actualizar'] = array();
}

if(!isset($_SESSION['clienteid_actualizar'])){
    $_SESSION['clienteid_actualizar']=0;
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
        $_SESSION['telefonos'] = $myObj;
        $this->view->show("verTelefono.php",$myObj);
    }

    public function cargarEliminarTelefono(){
        $obj = json_decode($_SESSION['telefonos'],true);
        $id = $_POST['id'];
        $_SESSION['clienteid_eliminar'] = $_POST['clienteid'];
        $datos['telefonos_cliente'] = $obj[$id]['valores'];
        $_SESSION['id_tel_eliminar'] = $id;
        $_SESSION['telefonos_eliminar'] = $datos['telefonos_cliente'];
        $this->view->show("eliminarTelefono.php",$datos);
    }

    public function eliminarTelefono(){
        //$_POST['select_telefono']
        //$_SESSION['telefonos_eliminar'][$_POST['select_telefono']];
        $clienteData = new ClienteData();

        $resultado['telefonos_eliminar'] = $clienteData->obtenerTelefonosEliminar($_SESSION['clienteid_eliminar']);
        $id_eliminar = $resultado['telefonos_eliminar'][0]['telefonoid'];
        $array_telefonos = explode(',',$resultado['telefonos_eliminar'][0]['telefonovalor']);
        unset($array_telefonos[$_POST['select_telefono']]);  
        $array_telefonos_final = array_values($array_telefonos);


        $string_valores = "";

        foreach($array_telefonos_final as $row){
            $string_valores =  $string_valores . ',' . $row;
        }

        $string_valores = ltrim($string_valores, $string_valores[0]); //Se debe insertar en la bd

        $array_tipos = explode(',',$resultado['telefonos_eliminar'][0]['telefonocriterio']);
        unset($array_tipos[$_POST['select_telefono']]);  
        $array_tipos_final = array_values($array_tipos);

        $string_criterios = "";

        foreach($array_tipos_final as $row){
            $string_criterios =  $string_criterios . ',' . $row;
        }

        $string_criterios = ltrim($string_criterios, $string_criterios[0]); //Se debe insertar en la bd
        $clienteData->eliminarTelefono($string_criterios,$string_valores,$id_eliminar); //Elimina

        $nuevos_datos['telefonos'] = $clienteData->obtenerTelefonos(); //obtiene de nuevo para actualizar la vista

        
        $index = 0;
        foreach($nuevos_datos['telefonos'] as $row){
            $id = $index;
            $criterios = explode(',',$nuevos_datos['telefonos'][$index][1]);
            $valores = explode(',',$nuevos_datos['telefonos'][$index][2]);
            $clienteid = $nuevos_datos['telefonos'][$index][3];
            $telefonos[$index] = array("id"=>$id,"criterios"=>$criterios,"valores"=>$valores,"clienteid"=>$clienteid);
            $index++;
        }

        $myObj = json_encode($telefonos);
        $_SESSION['telefonos'] = $myObj;
        $this->view->show("verTelefono.php",$myObj);

    }

    //Actualizar

    public function cargarActualizarTelefono(){
        $obj = json_decode($_SESSION['telefonos'],true);
        $id = $_POST['id'];

        $_SESSION['clienteid_actualizar'] = $_POST['telefonoclienteid'];
        
        $datos['telefonos_cliente'] = $obj[$id]['valores'];
        $datos['tipos'] = $obj[$id]['criterios'];
        $_SESSION['id_tel_actualizar'] = $id;
        $_SESSION['telefonos_actualizar'] = $datos['telefonos_cliente'];
        $this->view->show("actualizarTelefono.php",$datos);
    }

    public function actualizarTelefono(){

        $contador = $_POST['contador'];
        for($i=0;$i<$contador;$i++){
            $valores[$i] = $_POST['valores'.$i];
        }

        $string_datos = "";
        foreach($valores as $row){
            $string_datos = $string_datos . ',' . $row;
        }

        $string_valores = ltrim($string_datos, $string_datos[0]); //Se debe insertar en la bd

        $clienteData = new ClienteData();

        $telefonoclienteid = $_SESSION['clienteid_actualizar'];
        $id_actualizar = $clienteData->obtenerTelefonosActualizar($telefonoclienteid);
        $telefonoid = $id_actualizar[0]['telefonoid'];
        $clienteData->actualizarTelefono($telefonoid,$string_valores);
        /////////////////////////////////////////////////////////////////////

        $nuevos_datos['telefonos'] = $clienteData->obtenerTelefonos(); //obtiene de nuevo para actualizar la vista

        
        $index = 0;
        foreach($nuevos_datos['telefonos'] as $row){
            $id = $index;
            $criterios = explode(',',$nuevos_datos['telefonos'][$index][1]);
            $valores = explode(',',$nuevos_datos['telefonos'][$index][2]);
            $clienteid = $nuevos_datos['telefonos'][$index][3];
            $telefonos[$index] = array("id"=>$id,"criterios"=>$criterios,"valores"=>$valores,"clienteid"=>$clienteid);
            $index++;
        }

        $myObj = json_encode($telefonos);
        $_SESSION['telefonos'] = $myObj;
        $this->view->show("verTelefono.php",$myObj);


    }
}

?>