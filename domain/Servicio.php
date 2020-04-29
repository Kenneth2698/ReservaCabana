<?php

class Servicio {

    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    
    /*function Servicio($nombre,$descripcion,$imagen) {
        $this->id = 0;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
    }*/

    function Servicio($id,$nombre,$descripcion,$imagen) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
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

    function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


    function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }
}
?>