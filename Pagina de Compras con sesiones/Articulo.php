<?php

class Articulo {

    protected $nombre;
	protected $precio;
	protected $cantidad;

    function __construct() {
        $this->nombre = $nombre;
		$this->precio = $precio;
		$this->cantidad = $cantidad;
    }

    function getNombre() {
        return $this->nombre;
    }
	
	function getPrecio() {
        return $this->precio;
    }
	
	function getCantidad() {
        return $this->cantidad;
    }

}
