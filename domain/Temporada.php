<?php

class Temporada {

    private $temporadaId;
    private $temporadaNombre;
    private $temporadaFechaInicio;
    private $temporadaFechaFinal;
    

    function Temporada($id,$temporadanombre,$temporadafechainicio,$temporadafechafinal) {
        $this->temporadaId=$id;
        $this->temporadaNombre = $temporadanombre;
        $this->temporadaFechaInicio = $temporadafechainicio;
        $this->temporadaFechaFinal = $temporadafechafinal;
    }

    function getNombre() {
        return $this->temporadaNombre;
    }

    public function setNombre($temporadaNombre) {
        $this->temporadaNombre = $temporadaNombre;
    }

    function getId() {
        return $this->temporadaId;
    }

    public function setId($temporadaid) {
        $this->temporadaId = $temporadaid;
    }

    function getFechaInicio() {
        return $this->temporadaFechaInicio;
    }

    public function setFechaInicio($temporadafechainicio) {
        $this->temporadaFechaInicio = $temporadafechainicio;
    }


    function getFechaFinal() {
        return $this->temporadaFechaFinal;
    }

    public function setFechaFinal($temporadafechafinal) {
        $this->temporadaFechaFinal = $temporadafechafinal;
    }
}
?>