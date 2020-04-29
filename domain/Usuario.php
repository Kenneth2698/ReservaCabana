<?php

class Usuario {

    private $nombre;
    private $contrasenna;
   

    function Usuario($nombre, $contrasenna) {
        $this->nombre = $nombre;
        $this->contrasenna = $contrasenna;
    }

    function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function getContrasenna() {
        return $this->contrasenna;
    }

    public function setContrasenna($contrasenna) {
        $this->contrasenna = $contrasenna;
    }

}
?>