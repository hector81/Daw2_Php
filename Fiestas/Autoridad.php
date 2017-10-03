<?php

class Autoridad {

    private $id;
    private $cargo;
	private $nombre;
	private $Partido;

    function __construct($id,$cargo,$nombre,$Partido) {
        $this->id = $id;
		$this->cargo = $cargo;
		$this->nombre = $nombre;
		$this->Partido = $Partido;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
	
	function getCargo() {
        return $this->cargo;
    }

    function setCargo($cargo) {
        $this->cargo = $cargo;
    }
	
	function getNombre() {
        return $this->nombre;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
	
	function getPartido() {
        return $this->Partido;
    }

    function setPartido($Partido) {
        $this->Partido = $Partido;
    }
	
}