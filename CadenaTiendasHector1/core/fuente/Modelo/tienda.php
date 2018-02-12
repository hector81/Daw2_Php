<?php
class Tienda
{ private $id;
  private $nombre;
  private $provincia;
  private $ciudad;
  private $tlfno;

  public function __construct($id,$nombre,$provincia,$ciudad,$tlfno)
  { $this->id = $id;
    $this->nombre = $nombre;
    $this->provincia = $provincia;
    $this->ciudad = $ciudad;
    $this->tlfno = $tlfno;
  }

  public function setNombre($aNombre)
  { $this->nombre = $aNombre;
  }

  public function setId($id)
  { $this->$id = $id;
  }

  public function setProvincia($provincia)
  { $this->provincia = $provincia;
  }

  public function setCiudad($ciudad)
  { $this->ciudad = $ciudad;
  }

  public function setTlfno($tlfno)
  { $this->tlfno = $tlfno;
  }

  public function getId()
  { return $this->id;
  }

  public function getNombre()
  { return $this->nombre;
  }

  public function getProvincia()
  { return $this->provincia;
  }

  public function getCiudad()
  { return $this->ciudad;
  }

  public function getTlfno()
  { return $this->tlfno;
  }

}
