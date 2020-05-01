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

        $consulta = $this->db->prepare("
            INSERT INTO tbcabana (cabananombre) VALUES ( '" . $cabana->getNombre() . "');");

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

    public function insertarCaracteristicaImagen($codigos, $nombres, $rutas)
    {
        $consulta = $this->db->prepare("INSERT INTO tbcaracteristicaimagen (caracteristicaimagencodigo,caracteristicaimagennombre,caracteristicaimagenruta) VALUES ( '" . $codigos . "','" . $nombres . "','" . $rutas . "');");

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
}
