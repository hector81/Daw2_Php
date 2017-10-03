<?php

class Cliente {

    public $telefono;
    public $numEntradas;

    function __construct($telefono, $numEntradas) {
        $this->telefono = $telefono;
        $this->numEntradas = $numEntradas;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function getNumEntradas() {
        return $this->numEntradas;
    }

}
