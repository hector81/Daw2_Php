<?php

namespace Amowhi\Cms\Model;

class Tienda
{
  private $id;
  private $nombre;
  private $provincia;
  private $ciudad;
  private $telefono;

    public function __construct($fila)
    {
      $this->id = $fila['id'];
      $this->nombre = $fila['nombre'];
      $this->provincia = $fila['provincia'];
      $this->ciudad = $fila['ciudad'];
      $this->telefono = $fila['tlfno'];

    }

    public function setNombre($aNombre)
    {
      $this->nombre=$aNombre;
    }

    public function setProvincia($aProvincia)
    {
      $this->provincia= $aProvincia;
    }

    public function setCiudad($aCiudad)
    {
      $this->ciudad = $aCiudad;
    }

    public function setTelefono($aTelefono)
    {
      $this->telefono = $aTelefono;
    }

    public function getId()
    {
      return $this->id;
    }

    public function getNombre()
    {
      return $this->nombre;
    }

    public function getProvincia()
    {
      return $this->provincia;
    }

    public function getCiudad()
    {
      return $this->ciudad;
    }

    public function getTelefono()
    {
      return $this->telefono;
    }


}
