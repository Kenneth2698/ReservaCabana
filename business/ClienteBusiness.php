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

if(!isset($_SESSION['correos'])){
    $_SESSION['correos'] = array();
}

if(!isset($_SESSION['id_correo_eliminar'])){
    $_SESSION['id_correo_eliminar'] = 0;
}

if(!isset($_SESSION['correos_eliminar'])){
    $_SESSION['correos_eliminar'] = array();
}

//////
if(!isset($_SESSION['id_correo_actualizar'])){
    $_SESSION['id_correo_actualizar'] = 0;
}

if(!isset($_SESSION['correos_actualizar'])){
    $_SESSION['correos_actualizar'] = array();
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

//correo
public function listarClientesCorreo(){
    $clienteData = new ClienteData();

    $resultado['clientes'] = $clienteData->obtenerClientes();

    $_SESSION['lista_clientes'] = $resultado['clientes'];

    $this->view->show("seleccionarClienteCorreo.php",$resultado);
}

public function cargarCrearCorreo(){
    $_SESSION['clienteid'] = $_POST['select_clientes'];
    $this->view->show("crearCorreo.php");
}

public function ampliarListaCorreo(){
    $valor = $_POST['valor'];

    $_SESSION['lista_valores'][$_SESSION['index_valores']] = $valor;
    $_SESSION['index_valores']++;
}

public function insertarCorreo(){

    $string_valores = "";

    foreach($_SESSION['lista_valores'] as $row){
        $string_valores = $string_valores . ',' . $row;
    }
    $string_valores = ltrim($string_valores, $string_valores[0]);

    $clienteData = new ClienteData();

    $clienteData->insertarCorreoCliente($string_valores, $_SESSION['clienteid']);

    //Limpia los arrays
    $_SESSION['index_valores'] = 0;
    $_SESSION['lista_valores'] = array();

    $this->view->show("menuServicios.php");
    

}


public function cargarVerCorreos(){
    $clienteData = new ClienteData();

    $resultado['correos'] = $clienteData->obtenerCorreos();

    $index = 0;
    foreach($resultado['correos'] as $row){
        $id = $index;
        $idcorreo = $resultado['correos'][$index][0];
        $valores = explode(',',$resultado['correos'][$index][1]);
        $clienteid = $resultado['correos'][$index][2];
        $correos[$index] = array("id"=>$id,"idcorreo"=>$idcorreo,"valores"=>$valores,"clienteid"=>$clienteid);
        $index++;
    }

    $myObj = json_encode($correos);
    
    $_SESSION['correos'] = $myObj;
    $this->view->show("verCorreo.php",$myObj);
}

public function cargarEliminarCorreo(){
    $obj = json_decode($_SESSION['correos'],true);
    $id = $_POST['id'];
    $_SESSION['clienteid_eliminar'] = $_POST['clienteid'];
    $datos['correos_cliente'] = $obj[$id]['valores'];
    $_SESSION['id_correo_eliminar'] = $id;
    $_SESSION['correos_eliminar'] = $datos['correos_cliente'];
    $this->view->show("eliminarCorreo.php",$datos);
}

public function eliminarCorreo(){
    //$_POST['select_telefono']
    //$_SESSION['telefonos_eliminar'][$_POST['select_telefono']];
    $clienteData = new ClienteData();

    $resultado['correos_eliminar'] = $clienteData->obtenerCorreosEliminar($_SESSION['clienteid_eliminar']);
    
    
    $id_eliminar = $resultado['correos_eliminar'][0]['correoid'];
    $array_correos = explode(',',$resultado['correos_eliminar'][0]['correovalor']);
    unset($array_correos[$_POST['select_correo']]);  
    $array_correos_final = array_values($array_correos);

    $string_valores = "";

    foreach($array_correos_final as $row){
        $string_valores =  $string_valores . ',' . $row;
    }

    $string_valores = ltrim($string_valores, $string_valores[0]); //Se debe insertar en la bd

    $clienteData->eliminarCorreo($string_valores,$id_eliminar); //Elimina

    $nuevos_datos['correos'] = $clienteData->obtenerCorreos(); //obtiene de nuevo para actualizar la vista

    
    $index = 0;
    foreach($nuevos_datos['correos'] as $row){
        $id = $index;
        $valores = explode(',',$nuevos_datos['correos'][$index][1]);
        $clienteid = $nuevos_datos['correos'][$index][2];
        $correos[$index] = array("id"=>$id,"valores"=>$valores,"clienteid"=>$clienteid);
        $index++;
    }

    $myObj = json_encode($correos);
    $_SESSION['correos'] = $myObj;
    $this->view->show("verCorreo.php",$myObj);
    

}

//Actualizar

public function cargarActualizarCorreo(){
    $obj = json_decode($_SESSION['correos'],true);
    $id = $_POST['id'];
    $idcorreo = $_POST['idcorreo'];

    $_SESSION['clienteid_actualizar'] = $_POST['correoclienteid'];
    
    $datos['correos_cliente'] = $obj[$id]['valores'];
    $_SESSION['id_correo_actualizar'] = $idcorreo;
    //print_r($idcorreo);
    $_SESSION['correos_actualizar'] = $datos['correos_cliente'];
    $this->view->show("actualizarCorreo.php",$datos);
}

public function actualizarCorreo(){

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

    $correoid = $_SESSION['id_correo_actualizar'];
    
    
    $clienteData->actualizarCorreo($correoid,$string_valores);
    /////////////////////////////////////////////////////////////////////

    $nuevos_datos['correos'] = $clienteData->obtenerCorreos(); //obtiene de nuevo para actualizar la vista

    
    $index = 0;
    foreach($nuevos_datos['correos'] as $row){
        $id = $index;
        $idcorreo = $nuevos_datos['correos'][$index][0];
        $valores = explode(',',$nuevos_datos['correos'][$index][1]);
        $clienteid = $nuevos_datos['correos'][$index][2];
        $correos[$index] = array("id"=>$id,"idcorreo"=>$idcorreo,"valores"=>$valores,"clienteid"=>$clienteid);
        $index++;
    }

    $myObj = json_encode($correos);
    $_SESSION['correos'] = $myObj;
    $this->view->show("verCorreo.php",$myObj);


}

}

?>