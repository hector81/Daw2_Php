<?php
include_once __DIR__ . '/../../app/conf/sanitize.php';
class Familia{
    private $id;
    private $nombre;
    private $descripcion;

    function __construct(array $familia){
      $this->id = $familia['id'];
      $this->nombre = $familia['nombre'];
      $this->descripcion = $familia['descripcion'];
    }

    public function getId() :int{
      return $this->id;
    }

    public function setId($id){
      $this->id = sanear($id);
    }

    public function getNombre() :string{
      return $this->nombre;
    }

    public function setNombre($nombre){
      $this->nombre = sanear($nombre);
    }

    public function getDescripcion() :string{
      return $this->descripcion;
    }

    public function setDescripcion($descripcion){
      $this->descripcion = sanear($descripcion);
    }
}

 ?>
