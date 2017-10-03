<?php

class Articulo {

    public $id;
    public $nombre;
    public $precio;
    public $img;

    function __construct($id, $nombre, $precio, $img) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->img = $img;
    }

    function getId(){
        return $this->id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getPrecio(){
        return $this->precio;
    }
    function getImg() {
        return $this->img;
    }



}
