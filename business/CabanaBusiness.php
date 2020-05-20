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

if(!isset($_SESSION['lista_cabanas'])){
    $_SESSION['lista_cabanas'] = array();
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
        $cabanaData = new CabanaData();
        $resultado['propietarios'] = $cabanaData->obtenerPropietarios();
        $this->view->show("crearCabanaView.php", $resultado);
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

        $cabana = new Cabana(0, $_POST['cabananombre'], $_POST['propietarioid']);

        $cabanaData->insertarCabana($cabana);

        $resultado['propietarios'] = $cabanaData->obtenerPropietarios();
        $this->view->show("crearCabanaView.php", $resultado);
    }

    public function cargarActualizarCabana()
    {

        $cabana = new Cabana($_POST['cabanaid'], $_POST['cabananombre'], 0);

        $this->view->show("actualizarCabanas.php", $cabana);
    }

    public function actualizarCabana()
    {
        $cabanaData = new CabanaData();


        $cabana = new Cabana($_POST['cabanaid'], $_POST['cabananombre'], 0);
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

    public function cargarVerDirecciones()
    {

        $cabanaData = new CabanaData();


        $resultado = $cabanaData->obtenerCaracteristicas();


        $this->view->show("verCaracteristicasView.php", $resultado);
    }


    public function eliminarCaracteristica()
    {
        $caracteristicaid = $_POST['caracteristicaid'];

        $cabanaData = new CabanaData();


        $resultado = $cabanaData->eliminarCaracteristicas($caracteristicaid);


        $resultado = $cabanaData->obtenerCaracteristicas();


        $this->view->show("verCaracteristicasView.php", $resultado);
    }

    public function actualizarCriterioValor()
    {
        $criterio = $_POST['criterio'];
        $valor = $_POST['valor'];
        $caracteristicaid = $_POST['caracteristicaid'];


        $cabanaData = new CabanaData();


        $cabanaData->actualizarCriterioValor($criterio, $valor, $caracteristicaid);

        $resultado = $cabanaData->obtenerCaracteristicas();


        $this->view->show("verCaracteristicasView.php", $resultado);
    }



    public function cargarCrearCaracteristicaImagen()
    {


        $cabanaData = new CabanaData();

        $resultado['cabanas'] = $cabanaData->obtenerCabanasCaracteristicas();

        $this->view->show("verCaracteristicaImagenView.php", $resultado);
    }

    public function seleccionarCabana()
    {


        $caracteristicaid = $_POST['caracteristicaid'];

        $cabanaData = new CabanaData();

        $resultado = $cabanaData->obtenerCaracteristicasConId($caracteristicaid);

        $this->view->show("verCaracteristicaImageConIdnView.php", $resultado);
    }

    public function insertarCaracteristicaImagen()
    {
        $contador = $_POST['i'];
        $codigos = $_POST['codigo'];
        $caracteristicaid = $_POST['caracteristicaid'];


        $nombres = "";
        $rutas = "";

        for ($i = 0; $i < $contador; $i++) {
            $nombres = $nombres . ',' . $_POST['nombre' . $i];
            $rutas = $rutas . ',' . $_POST['ruta' . $i];
        }
        $cabanaData = new CabanaData();

        $cabanaData->insertarCaracteristicaImagen($codigos, ltrim($nombres, ','), ltrim($rutas, ','),$caracteristicaid);

        $resultado['cabanas'] = $cabanaData->obtenerCabanasCaracteristicas();

        $this->view->show("verCaracteristicaImagenView.php", $resultado);
    }

    public function cargarVerCaracteristicaImagen()
    {


        $cabanaData = new CabanaData();

        $resultado = $cabanaData->obtenerImagenes();

        $this->view->show("verImagenes.php", $resultado);
    }


    public function actualizarImagen()
    {
        $nombres = $_POST['nombres'];
        $rutas = $_POST['rutas'];
        $imagenid = $_POST['imagenId'];

        echo $nombres . '' . $rutas . '' . $imagenid;

        $cabanaData = new CabanaData();


        $cabanaData->actualizarImagen($nombres, $rutas, $imagenid);
    }

    public function eliminarImagen()
    {
        $imagenid = $_POST['imagenid'];

        $cabanaData = new CabanaData();


        $cabanaData->eliminarImagen($imagenid);

        $resultado = $cabanaData->obtenerImagenes();

        $this->view->show("verImagenes.php", $resultado);
    }

    public function cargarCrearDireccion()
    {

        $cabanaData = new CabanaData();
        $resultado['cabanas'] = $cabanaData->obtenerCabanas();
        $this->view->show("verCabanasD.php", $resultado);
    }

    public function seleccionarCabanaParaDireccion()
    {
        $datos['cabanaid'] = $_POST['cabanaid'];
        $datos['accion'] = "crear";
        $this->view->show("crearDireccionView.php", $datos);
    }


    public function seleccionarCabanaParaMantenerDireccion(){
        $datos['cabanaid'] = $_POST['cabanaid'];
        $datos['accion'] = "actualizareliminar";
        $this->view->show("verCabanasActualizarDireccion.php", $datos);
    }


    public function crearDireccion()
    {

        $provincia = $_POST['provincia'];
        $canton = $_POST['canton'];
        $distrito = $_POST['distrito'];
        $senas = $_POST['senas'];
        $cabanaid = $_POST['cabanaid'];

        $cabanaData = new CabanaData();

        $cabanaData->insertarDireccion($provincia, $canton, $distrito, $senas, $cabanaid);

        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $this->view->show("verCabanasD.php", $resultado);
    }

    public function cargarCrearPropietario()
    {
        $datos['accion'] = 'crear';
        $this->view->show("crearPropietarioView.php", $datos);
    }


    public function cargarActualizarEliminarPropietario()
    {

        $cabanaData = new CabanaData();
        $resultado['propietarios'] = $cabanaData->obtenerPropietarios();
        

        $resultado['accion'] = 'cargarpropietarios';

        $this->view->show("crearPropietarioView.php", $resultado);
    }

    public function cargarPropietarioConId()
    {
        
        $cabanaData = new CabanaData();
        $propietarioid = $_POST['propietarioid'];
        
        $resultado['propietario'] = $cabanaData->obtenerPropietarioInfo($propietarioid);
        
        $resultado['accion'] = 'actualizareliminarpropietario';

        $this->view->show("crearPropietarioView.php", $resultado);
    }

  

    public function seleccionarCabanaParaPropietario()
    {
        $datos['cabanaid'] = $_POST['crearPropietario'];;
        $this->view->show("crearPropietarioView.php", $datos);
    }

    public function crearPropietario()
    {
        $nombre = $_POST['nombre'];
        $cuenta = $_POST['cuenta'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];


        $cabanaData = new CabanaData();

        $cabanaData->insertarPropietario($nombre, $cuenta, $correo, $telefono);

        $this->view->show('menuServicios.php', null);
    }

    public function actualizarPropietario(){
        $id = $_POST['propietarioid'];
        $nombre = $_POST['nombre'];
        $cuenta = $_POST['cuenta'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];


        $cabanaData = new CabanaData();

        $cabanaData->actualizarPropietario($nombre, $cuenta, $correo, $telefono,$id);

        $this->view->show('menuServicios.php', null);
    }
    public function actualizarDireccion(){
        $id = $_POST['direccionid'];
        $provincia = $_POST['direccionprovincia'];
        $canton = $_POST['direccioncanton'];
        $distrito = $_POST['direcciondistrito'];
        $senas = $_POST['direccionsenas'];


        $cabanaData = new CabanaData();

        $cabanaData->actualizarDireccion($provincia, $canton, $distrito, $senas,$id);

        $this->view->show('menuServicios.php', null);
    }
    public function eliminarPropietario(){

        $id = $_POST['propietarioid'];
    
        $cabanaData = new CabanaData();

        $cabanaData->eliminarPropietario($id);

        $this->view->show('menuServicios.php', null);
    }

    public function eliminarDireccion(){

        $id = $_POST['direccionid'];
    
        $cabanaData = new CabanaData();

        $cabanaData->eliminarDireccion($id);

        $this->view->show('menuServicios.php', null);
    }

    
    public function cargarVerDireccion()
    {

        $cabanaData = new CabanaData();
        $resultado['accion'] = "seleccionar";
        $resultado['cabanas'] = $cabanaData->obtenerCabanas();
        $this->view->show("verCabanasActualizarDireccion.php", $resultado);
    }

    public function cargarDireccionConId()
    {
        
        $cabanaData = new CabanaData();
        $cabanaid = $_POST['cabanaid'];
        
        $resultado['direccion'] = $cabanaData->obtenerDireccionInfo($cabanaid);
        
        $resultado['accion'] = 'actualizareliminardireccion';

        $this->view->show("verCabanasActualizarDireccion.php", $resultado);
    }



    //Propietario y cuenta bancaria
    public function cargarFormPropietarioCuenta(){
        $cabana = new CabanaData();
        $data["propietarios"]= $cabana->obtenerPropietarios();
        $this->view->show("registrarPropietarioCuenta.php", $data);
    }

    public function insertarPropietarioCuenta(){
        $cabana = new CabanaData();
        $propietarioid = $_POST['propietario'];
        $propietariocuentabancariabanconombre = $_POST['banco'];
        $propietariocuentabancariabanconumerocuenta = $_POST['cuenta'];
        $propietariocuentabancariaestado = $_POST['estado'];
        $cabana->insertarPropietarioCuenta($propietarioid,$propietariocuentabancariabanconombre,$propietariocuentabancariabanconumerocuenta,$propietariocuentabancariaestado);
        $this->view->show("indexView.php");
    }

    public function cargarSeleccionarPropietarioCuenta(){
        $cabana = new CabanaData();
        $data["propietarios"]= $cabana->obtenerPropietarios();
        $this->view->show("seleccionarPropietarioCuenta.php", $data);
    }

    public function cargarListaCuentasPropietario(){
        $cabana = new CabanaData();
        $idPropietario = $_POST['idpropietario'];
        $data["cuentas"]= $cabana->obtenerCuentas($idPropietario);
        $this->view->show("verListaCuentas.php", $data);
    }

    public function eliminarCuentaPropietario(){
        $cabana = new CabanaData();
        $idCuenta = $_POST['idCuenta'];
        $cabana->eliminarCuentaPropietario($idCuenta);
        $this->view->show("menuServicios.php");
    }

    public function cargarActualizarCuenta(){
        $idCuenta = $_POST['idCuenta'];
        $numeroCuenta = $_POST['cuenta'];
        $estadoCuenta = $_POST['estado'];
        $datos['id'] = $idCuenta;
        $datos['cuenta'] = $numeroCuenta;
        $banco = $_POST['banco'];
        $datos['estado'] = $estadoCuenta;
        $datos['banco'] = $banco;
        $this->view->show("actualizarCuenta.php", $datos);
    }

    public function actualizarCuenta(){
        $cabana = new CabanaData();
        $idCuenta = $_POST['idCuenta'];
        $numeroCuenta = $_POST['cuenta'];
        $banco = $_POST['banco'];
        $estadoCuenta = $_POST['estado'];
        $cabana->actualizarCuenta($idCuenta,$numeroCuenta,$estadoCuenta,$banco);
        $this->view->show("menuServicios.php");
    }

    public function listarCabanaTarifa(){
        $cabanaData = new CabanaData();

        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $_SESSION['lista_cabanas'] = $resultado['cabanas'];

        $this->view->show("seleccionarCabanaTarifa.php",$resultado);
    }

    public function insertarTarifa()
    {
        $cabanaData = new CabanaData();
        $idcabana = $_POST['select_cabanas'];
        $monto = $_POST['tarifamonto'];
        $cabanaData-> insertarTarifa($idcabana,$monto);

        $resultado['tarifas'] = $cabanaData->obtenerTarifas();
        
        $this->view->show("verTarifa.php",$resultado);
    }

    public function cargarVerTarifa(){
        $cabanaData = new CabanaData();
    
        $resultado['tarifas'] = $cabanaData->obtenerTarifas();
        
        $this->view->show("verTarifa.php",$resultado);
    }

    public function eliminarTarifa(){
        $cabanaData = new CabanaData();
        $cabanaData->eliminarTarifa($_POST['cabanatarifaid']);

        $resultado['tarifas'] = $cabanaData->obtenerTarifas();
        
        $this->view->show("verTarifa.php",$resultado);
    }

    public function cargarActualizarTarifa(){
        $idtarifa = $_POST['cabanatarifaid'];
        $cabana = $_POST['cabananombre'];
        $monto = $_POST['cabanatarifamonto'];
        
        $datos['idtarifa'] = $idtarifa;
        $datos['cabana'] = $cabana;
        $datos['monto'] = $monto;
        
        $this->view->show("actualizarTarifa.php",$datos);
    }

    public function actualizarTarifa(){
        $cabanaData = new CabanaData();
        $cabanaData->actualizarTarifa($_POST['cabanatarifaid'],$_POST['cabanatarifamonto']);

        $resultado['tarifas'] = $cabanaData->obtenerTarifas();
        
        $this->view->show("verTarifa.php",$resultado);
    }
}
