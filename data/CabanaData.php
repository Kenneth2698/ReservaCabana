<?php

class CabanaData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();
    } //constructor



    public function insertarCabana($cabana)
    {

        $consulta = $this->db->prepare("INSERT INTO tbcabana (cabananombre,propietarioid,cabanaestado) VALUES ( '" . $cabana->getNombre() . "',".$cabana->getPropietario().",1);");


        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function obtenerCabanas()
    {

        $consulta = $this->db->prepare('select cabanaid,cabananombre from tbcabana');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerPropietarioInfo($propietarioid){
        $consulta = $this->db->prepare("select propietarioid,propietarionombre,propietarionumerocuentabancaria,propietariocorreo,propietariotelefono from tbpropietario where propietarioid = ".$propietarioid." ;");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }
    
    public function obtenerDireccionInfo($cabanaid){
        $consulta = $this->db->prepare("select direccionid,direccionprovincia,direccioncanton,direcciondistrito,direccionotrasenas from tbcabanadireccion where cabanaid = ".$cabanaid." ;");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }
    public function actualizarCabana($cabana)
    {

        $consulta = $this->db->prepare("
        UPDATE tbcabana 
        SET cabananombre='" . $cabana->getNombre() . "'
        WHERE cabanaid='" . $cabana->getId() . "';");

        $consulta->execute();

        $consulta->CloseCursor();
    }


    public function eliminarCabana($cabana)
    {
        $consulta = $this->db->prepare("DELETE FROM tbcabana WHERE cabanaid = $cabana");

        $consulta->execute();
        $consulta->CloseCursor();
    }
    public function eliminarPropietario($propietarioid){
        $consulta = $this->db->prepare("DELETE FROM tbpropietario WHERE propietarioid = $propietarioid");

        $consulta->execute();
        $consulta->CloseCursor();
    }
    
    public function eliminarDireccion($direccionid){
        $consulta = $this->db->prepare("DELETE FROM tbcabanadireccion WHERE direccionid = $direccionid");

        $consulta->execute();
        $consulta->CloseCursor();
    }

    public function insertarCabanaCaracteristica($cabanaid, $codigo, $criterio, $valor, $prioridad)
    {

        $consulta = $this->db->prepare("INSERT INTO tbcabanacaracteristica (cabanaid,cabanacaracteristicacodigo,cabanacaracteristicacriterio,cabanacaracteristicavalor,cabanacaracteristicaprioridad) VALUES ( '" . $cabanaid . "','" . $codigo . "','" . $criterio . "','" . $valor . "','" . $prioridad . "');");

        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function obtenerCaracteristicas()
    {

        $consulta = $this->db->prepare('SELECT tbcabanacaracteristicaid,
                                                c.cabananombre,
                                                cabanacaracteristicacodigo,
                                                cabanacaracteristicacriterio,
                                                cabanacaracteristicavalor,
                                                cabanacaracteristicaprioridad
                                            FROM tbcabanacaracteristica cc
                                            join tbcabana c
                                            on cc.cabanaid = c.cabanaid
                                            ');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function eliminarCaracteristicas($caracteristicaid)
    {

        $consulta = $this->db->prepare("DELETE FROM tbcabanacaracteristica WHERE tbcabanacaracteristicaid = $caracteristicaid");

        $consulta->execute();
        $consulta->CloseCursor();
    }

    public function eliminarImagen($imagenid)
    {
        $consulta = $this->db->prepare("DELETE FROM tbcaracteristicaimagen WHERE caracteristicaimagenid = $imagenid");

        $consulta->execute();
        $consulta->CloseCursor();
    }
    public function actualizarCriterioValor($criterio, $valor, $caracteristicaid)
    {
        $consulta = $this->db->prepare("
        UPDATE tbcabanacaracteristica 
        SET cabanacaracteristicacriterio='" . $criterio . "' , cabanacaracteristicavalor ='" . $valor . "'
         WHERE tbcabanacaracteristicaid='" . $caracteristicaid . "';");

        $consulta->execute();

        $consulta->CloseCursor();
    }

    public function actualizarImagen($nombres, $rutas, $imagenid)
    {
        $consulta = $this->db->prepare("
        UPDATE tbcaracteristicaimagen 
        SET caracteristicaimagennombre='" . $nombres . "' , caracteristicaimagenruta ='" . $rutas . "'
         WHERE caracteristicaimagenid= " . $imagenid . ";");

        $consulta->execute();

        $consulta->CloseCursor();
    }

    public function obtenerCabanasCaracteristicas()
    {
        $consulta = $this->db->prepare('SELECT tbcabanacaracteristicaid,
                                                c.cabananombre
                                            FROM tbcabanacaracteristica cc
                                            join tbcabana c
                                            on cc.cabanaid = c.cabanaid');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerCaracteristicasConId($caracteristicaid)
    {

        $consulta = $this->db->prepare("   SELECT tbcabanacaracteristicaid,
                                                c.cabananombre,
                                                cabanacaracteristicacodigo,
                                                cabanacaracteristicacriterio,
                                                cabanacaracteristicavalor
                                            FROM tbcabanacaracteristica cc
                                            join tbcabana c
                                            on cc.cabanaid = c.cabanaid
                                            where tbcabanacaracteristicaid = " . $caracteristicaid . ";");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function insertarCaracteristicaImagen($codigos, $nombres, $rutas,$caracteristicaid)
    {
         $consulta = $this->db->prepare("INSERT INTO tbcaracteristicaimagen (cabanacaracteristicaid,caracteristicaimagencodigo,caracteristicaimagennombre,caracteristicaimagenruta) VALUES ( ".$caracteristicaid." ,   '" . $codigos . "','" . $nombres . "','" . $rutas . "');");

        $consulta->execute();
        $consulta->CloseCursor();
    }

    public function obtenerImagenes()
    {

        $consulta = $this->db->prepare("SELECT caracteristicaimagenid,caracteristicaimagennombre,caracteristicaimagenruta from tbcaracteristicaimagen");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }
    
    public function insertarDireccion($provincia, $canton, $distrito, $senas, $cabanaid)
    {
        $consulta = $this->db->prepare("INSERT INTO tbcabanadireccion (direccionprovincia,direccioncanton,direcciondistrito,direccionotrasenas,cabanaid) VALUES ( '" . $provincia . "','" . $canton . "','" . $distrito . "','" . $senas . "','" . $cabanaid . "');");

        $consulta->execute();
        $consulta->CloseCursor();

    }

    public function insertarPropietario($nombre,$cuenta,$correo,$telefono){
        $consulta = $this->db->prepare("INSERT INTO tbpropietario (propietarionombre,propietarionumerocuentabancaria,propietariocorreo,propietariotelefono) VALUES ( '" . $nombre . "','" . $cuenta . "','" . $correo . "','" . $telefono . "');");

        $consulta->execute();
        $consulta->CloseCursor();
    }

    public function actualizarPropietario($nombre, $cuenta, $correo, $telefono,$id){
        $consulta = $this->db->prepare("
        UPDATE tbpropietario 
        SET propietarionombre='" . $nombre . "' , propietarionumerocuentabancaria ='" . $cuenta . "', propietariocorreo = '".$correo."', propietariotelefono = '".$telefono."'
         WHERE propietarioid='" . $id . "';");

        $consulta->execute();
        $consulta->CloseCursor();
    }
    
    public function actualizarDireccion($provincia, $canton, $distrito, $senas,$id){
        $consulta = $this->db->prepare("
        UPDATE tbcabanadireccion 
        SET direccionprovincia='" . $provincia . "' , direccioncanton ='" . $canton . "', direcciondistrito = '".$distrito."', direccionotrasenas = '".$senas."'
         WHERE direccionid='" . $id . "';");

        $consulta->execute();
        $consulta->CloseCursor();
    }

    public function obtenerPropietarios(){
        $consulta = $this->db->prepare('select propietarioid,propietarionombre from tbpropietario');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }
}
