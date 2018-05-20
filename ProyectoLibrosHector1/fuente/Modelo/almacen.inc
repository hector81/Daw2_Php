<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Almacen
{ private $idEjemplar;//IdLibro INTEGER NOT NULL,
  private $idTienda;//IdTienda INTEGER NOT NULL,
  private $stock;//Stock INTEGER NOT NULL,

  public function __construct(array $almacen)
  { $this->idEjemplar = $almacen['IdEjemplar'];
    $this->idTienda = $almacen['IdTienda'];
    $this->stock = $almacen['Stock'];

  }

  public function setIdEjemplar(int $idEjemplar)
  { $this->idEjemplar = sanea($idEjemplar);
  }

  public function setIdTienda(int $idTienda)
  { $this->idTienda = sanea($idTienda);
  }

  public function setStock(int $stock)
  { $this->stock = sanea($stock);
  }


  public function getIdEjemplar() :int
  { return (int)$this->idEjemplar;
  }

  public function getIdTienda() :int
  { return (int)$this->idTienda;
  }

  public function getStock() :int
  { return (int)$this->stock;
  }


}
