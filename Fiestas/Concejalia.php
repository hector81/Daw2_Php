<?php

class Concejalia {

    private $id;
	private $nombre;
	private $descripcion;
	private $idAutoridad

    function __construct($id,$nombre,$descripcion,$idAutoridad) {
        $this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->idAutoridad = $idAutoridad;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
	
	function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
	
	function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
	
	function getIdAutoridad() {
        return $this->idAutoridad;
    }

    function setIdAutoridad($idAutoridad) {
        $this->idAutoridad = $idAutoridad;
    }
	
}