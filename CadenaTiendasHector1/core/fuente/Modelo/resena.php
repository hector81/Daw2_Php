<?php
class Resena
{ private $idResenia;
  private $idArticulo;
  private $nombreArticulo;
  private $fechaResenia;
  private $emailResenia;
  private $puntuacion;
  private $comentarios;
  private $modifiedDate;

  public function __construct($idResenia, $idArticulo, $nombreArticulo, $fechaResenia,
  $emailResenia, $puntuacion, $comentarios, $modifiedDate)
  { $this->idResenia = $idResenia;
    $this->idArticulo = $idArticulo;
    $this->nombreArticulo = $nombreArticulo;
    $this->fechaResenia = $fechaResenia;
    $this->emailResenia = $emailResenia;
    $this->puntuacion = $puntuacion;
    $this->comentarios = $comentarios;
    $this->modifiedDate = $modifiedDate;

  }

  public function setIdResenia($idResenia)
  { $this->idResenia = $idResenia;
  }

  public function getIdResenia()
  { return $this->idResenia;
  }

  public function setIdArticulo($idArticulo)
  { $this->idArticulo = $idArticulo;
  }

  public function getIdArticulo()
  { return $this->idArticulo;
  }

  public function setNombreArticulo($nombreArticulo)
  { $this->nombreArticulo = $nombreArticulo;
  }

  public function getNombreArticulo()
  { return $this->nombreArticulo;
  }

  public function setFechaResenia($fechaResenia)
  { $this->fechaResenia = $fechaResenia;
  }

  public function getFechaResenia()
  { return $this->fechaResenia;
  }

  public function setEmailResenia($emailResenia)
  { $this->emailResenia = $emailResenia;
  }

  public function getEmailResenia()
  { return $this->emailResenia;
  }

  public function setPuntuacion($puntuacion)
  { $this->puntuacion = $puntuacion;
  }

  public function getPuntuacion()
  { return $this->puntuacion;
  }

  public function setComentarios($comentarios)
  { $this->comentarios = $comentarios;
  }

  public function getComentarios()
  { return $this->comentarios;
  }

  public function setModifiedDate($modifiedDate)
  { $this->modifiedDate = $modifiedDate;
  }

  public function getModifiedDate()
  { return $this->modifiedDate;
  }
}
?>
