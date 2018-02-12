<?php
class Familia
{ private $id;
  private $nombre;
  private $descripcion;

  public function __construct($id,$nombre,$descripcion)
  { $this->id = $id;
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
  }

  public function setNombre($aNombre)
  { $this->nombre = $aNombre;
  }

  public function setDescripcion($aDescripcion)
  { $this->descripcion = $aDescripcion;
  }

  public function setId($id)
  { $this->$id = $id;
  }

  public function getId()
  { return $this->id;
  }

  public function getNombre()
  { return $this->nombre;
  }

  public function getDescripcion()
  { return $this->descripcion;
  }

}
