<?php

class Patrocinador {

    private $id;
    private $nombre;
	private $cantidad;

    function __construct($id,$nombre,$cantidad) {
        $this->id = $id;
		$this->nombre = $nombre;
		$this->cantidad = $cantidad;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
	
	function getNombre() {
        return $this->Nombre;
    }

    function setCantidad($nombre) {
        $this->nombre = $nombre;
    }

	function getCantidad() {
        return $this->cantidad;
    }	
	function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }
	
}