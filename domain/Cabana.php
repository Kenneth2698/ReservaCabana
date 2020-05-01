<?php

class Cabana {

    private $id;
    private $nombre;
    private $propietario;


    function Cabana($id,$nombre,$propietario) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->propietario = $propietario;
    }

    function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    function getPropietario() {
        return $this->propietario;
    }

    public function setPropietario($propietario) {
        $this->propietario = $propietario;
    }
}
