<?php

class Carrito {

    protected $pedidos;

    function __construct() {
        $this->pedidos = array();
    }

    function addItem($articulo) {
        array_push($this->pedidos, $articulo);
    }

    function getPedidos() {
        return $this->pedidos;
    }

}
