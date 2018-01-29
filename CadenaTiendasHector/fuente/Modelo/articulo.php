<?php
class Articulo
{ private $id;
  private $nombreCorto;
  private $nombre;
  private $descripcion;
  private $pvp;
  private $idFamilia;

  public function __construct($fila)
  { $this->id = $fila['id'];
    $this->nombreCorto = $fila['nombreCorto'];
    $this->nombre = $fila['nombre'];
    $this->descripcion = $fila['descripcion'];
    $this->pvp = $fila['PVP'];
    $this->idFamilia= $fila['idFamilia'];
  }

  public function setNombreCorto($aNombreCorto)
  { $this->nombreCorto = $aNombreCorto;
  }

  public function setNombre($aNombre)
  { $this->nombre = $aNombre;
  }

  public function setDescripcion($aDescripcion)
  { $this->descripcion = $aDescripcion;
  }

  public function setPvp($aPvp)
  { $this->pvp = $aPvp;
  }

  public function setIdFamilia($aIdFamilia)
  { $this->idFamilia = $aIdFamilia;
  }

  public function getId()
  { return $this->id;
  }

  public function getNombreCorto()
  { return $this->nombreCorto;
  }

  public function getNombre()
  { return $this->nombre;
  }

  public function getDescripcion()
  { return $this->descripcion;
  }

  public function getPvp()
  { return $this->pvp;
  }

  public function getIdFamilia()
  { return $this->idFamilia;
  }

}
