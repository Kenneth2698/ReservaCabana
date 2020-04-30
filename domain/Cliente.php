<?php

class Cliente {

    private $id;
    private $nombreCompleto;

    function Cliente($id,$nombreCompleto) {
        $this->id = $id;
        $this->nombreCompleto = $nombreCompleto;
    }

    function getNombre() {
        return $this->nombreCompleto;
    }

    public function setNombre($nombreCompleto) {
        $this->nombreCompleto = $nombreCompleto;
    }

    function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
}
?>