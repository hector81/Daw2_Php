<?php

class Actividad {

    private $id;
    private $nombre;
	private $descripcion;
	private $fInicio;
	private $fFin;

    function __construct($id,$nombre,$descripcion,$fInicio,$fFin) {
        $this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->fInicio = $fInicio;
		$this->fFin = $fFin;
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
	
	function getFInicio() {
        return $fInicio->fInicio;
    }

    function setFechaInicio($fInicio) {
        $this->fInicio = $fInicio;
    }
	
	function getFFin() {
        return $this->fFin;
    }

    function setFFin($fFin) {
        $this->fFin = $fFin;
    }

	
}