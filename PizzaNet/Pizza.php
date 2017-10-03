<?php

class Pizza {

    protected $id;
    protected $tipo;
    protected $tamaño;
    protected $masa;
    protected $extra;

    function __construct($id, $tipo, $tamaño, $masa, $extra) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->tamaño = $tamaño;
        $this->masa = $masa;
        $this->extra = $extra;
    }

    function getId() {
        return $this->id;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getTamaño() {
        return $this->tamaño;
    }

    function getMasa() {
        return $this->masa;
    }

    function getExtra() {
        return $this->extra;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setTamaño($tamaño) {
        $this->tamaño = $tamaño;
    }

    function setMasa($masa) {
        $this->masa = $masa;
    }

    function setExtra($extra) {
        $this->extra = $extra;
    }

    function calculaPrecio() {
        switch ($this->tamaño) {
            case "normal":
                $precio = 10;
                break;
            case "grande":
                $precio = 12;
                break;
            case "familiar":
                $precio = 16;
                break;
        }
        $precio = $precio + (count($this->extra) * 1.5);
        return $precio;
    }

}
