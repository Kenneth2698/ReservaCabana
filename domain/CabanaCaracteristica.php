<?php

class CabanaCaracteristica {

    private $id;
    private $nombre;


    function CabanaCaracteristica($id,$nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
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
}
