<?php

class Evento {

    private $id;
    private $nombre;
	private $descripcion;
	private $fyh;
	private $lugar;
	private $IdActividad;
	private $IdConceOrganiza;
	private $IdPatrocina;

    function __construct($id,$nombre,$descripcion,$fyh,$lugar,$IdActividad,$IdConceOrganiza,$IdPatrocina) {
        $this->id = $id;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->fyh = $fyh;
		$this->lugar = $lugar;
		$this->IdActividad = $IdActividad;
		$this->IdConceOrganiza = $IdConceOrganiza;
		$this->IdPatrocina = $IdPatrocina;
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
	
	function getFyh() {
        return $this->fyh;
    }

    function setFyh($fyh) {
        $this->fyh = $fyh;
    }
	
	function getLugar() {
        return $this->lugar;
    }

    function setLugar($lugar) {
        $this->lugar = $lugar;
    }
	
	function getIdActividad() {
        return $this->IdActividad;
    }

    function setIdActividad($IdActividad) {
        $this->IdActividad = $IdActividad;
    }
	
	function getIdConceOrganiza() {
        return $this->IdConceOrganiza;
    }

    function setIdConceOrganiza($IdConceOrganiza) {
        $this->IdConceOrganiza = $IdConceOrganiza;
    }
	
	function getIdPatrocina() {
        return $this->IdPatrocina;
    }

    function setIdPatrocina($IdPatrocina) {
        $this->IdPatrocina = $IdPatrocina;
    }

	
}