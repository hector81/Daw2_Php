<?php
class Articulo
{ private $id;
  private $nombreCorto;
  private $nombre;
  private $descripcion;
  private $pvp;
  private $idFamilia;
  private $foto;

  public function __construct($id,$nombreCorto,$nombre,$descripcion,$pvp,$idFamilia,$foto)
  { $this->id = $id;
    $this->nombreCorto = $nombreCorto;
    $this->nombre = $nombre;
    $this->descripcion = $descripcion;
    $this->pvp = $pvp;
    $this->idFamilia= $idFamilia;
    $this->foto= $foto;
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

  public function setFoto($foto)
  { $this->foto = $foto;
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

  public function getFoto()
  { return $this->foto;
  }

}
