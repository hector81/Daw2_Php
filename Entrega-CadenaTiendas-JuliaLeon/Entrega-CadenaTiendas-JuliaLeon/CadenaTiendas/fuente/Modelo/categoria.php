<?php
class Categoria{
  private $id;
  private $nombre;
  private $descripcion;

  public function __construct ($fila){
    $this->id = $fila['id'];
    $this->nombre = $fila['nombre'];
    $this->descripcion = $fila['descripcion'];
  }

  public function setNombre( $nombre ){
    $this->nombre = $nombre;
  }

  public function getNombre(){
    return $this->nombre;
  }

  public function setDescripcion( $descripcion ){
    $this->descripcion = $descripcion;
  }

  public function getDescripcion(){
    return $this->descripcion;
  }

  public function getId(){
    return $this->id;
  }
}
 ?>
