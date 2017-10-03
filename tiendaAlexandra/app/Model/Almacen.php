<?php

/**
Model: Contiene los objetos de las clases (las entidades).
**/

namespace Amowhi\Cms\Model;

class Almacen
{
  private $idArticulo;
  private $idTienda;
  private $stock;

  public function __construct($fila)
  {
    $this->idArticulo = $fila['idArticulo'];
    $this->idTienda = $fila['idTienda'];
    $this->stock = $fila['stock'];
  }

  public function setIdArticulo($aIdArticulo)
  { $this->idArticulo = $aIdArticulo;
  }

  public function setIdTienda($aIdTienda)
  { $this->idTienda = $aIdTienda;
  }

  public function setStock($aStock)
  { $this->stock = $aStock;
  }

  public function getIdArticulo()
  { return $this->idArticulo;
  }

  public function getIdTienda()
  { return $this->idTienda;
  }

  public function getStock()
  { return $this->stock;
  }

}
