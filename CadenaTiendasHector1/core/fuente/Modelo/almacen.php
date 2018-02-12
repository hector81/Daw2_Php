<?php
class Almacen
{ private $idArticulo;
  private $idTienda;
  private $stock;

  public function __construct($idArticulo,$idTienda,$stock)
  { $this->idArticulo = $idArticulo;
    $this->idTienda = $idTienda;
    $this->stock = $stock;
  }

  public function setIdArticulo($idArticulo)
  { $this->idArticulo = $idArticulo;
  }

  public function setNombre($idTienda)
  { $this->idTienda = $idTienda;
  }

  public function setStock($stock)
  { $this->stock = $stock;
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
?>
