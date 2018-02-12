<?php
class Compra
{ private $idCompra;
  private $idArt;
  private $cantidad;
  private $fechaCompra;
  private $usuario;
  private $idTienda;

  public function __construct($idCompra,$idArt,$cantidad,$fechaCompra,$usuario,$idTienda)
  { $this->idCompra = $idCompra;
    $this->idArt = $idArt;
    $this->cantidad = $cantidad;
    $this->fechaCompra = $fechaCompra;
    $this->usuario = $usuario;
    $this->idTienda= $idTienda;
  }

  public function setIdCompra($idCompra)
  { $this->idCompra = $idCompra;
  }

  public function setIdArt($idArt)
  { $this->idArt = $idArt;
  }

  public function setCantidad($cantidad)
  { $this->cantidad = $cantidad;
  }

  public function setFechaCompra($fechaCompra)
  { $this->fechaCompra = $fechaCompra;
  }

  public function setUsuario($usuario)
  { $this->usuario = $usuario;
  }

  public function setIdTienda($idTienda)
  { $this->idTienda = $idTienda;
  }

  public function getIdCompra()
  { return $this->idCompra;
  }

  public function getIdArt()
  { return $this->idArt;
  }

  public function getCantidad()
  { return $this->cantidad;
  }

  public function getFechaCompra()
  { return $this->fechaCompra;
  }

  public function getUsuario()
  { return $this->usuario;
  }

  public function getIdTienda()
  { return $this->idTienda;
  }

}
