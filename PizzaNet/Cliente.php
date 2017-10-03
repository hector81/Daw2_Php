<?php
include 'Pedido.php';
class Cliente {

    protected $nombre;
    protected $direccion;
    protected $telefono;
    protected $pedido;
    
    function __construct($nombre, $direccion, $telefono) {
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->pedido = new Pedido();
    }
 
    function getNombre() {
        return $this->nombre;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getPedido() {
        return $this->pedido;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setPedido($pedido) {
        $this->pedido = $pedido;
    }

}
