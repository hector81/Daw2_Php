<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Venta
{ private $idVenta;//IdVenta  INTEGER IDENTITY PRIMARY KEY,
  private $total;//Total INTEGER NOT NULL,
  private $fechaCompra;//FechaCompra DATETIME NOT NULL,
  private $usuario;//Usuario NVARCHAR(20) NOT NULL,
  private $idTienda;//IdTienda INTEGER,

  public function __construct(array $venta)
  { $this->idVenta = $venta['IdVenta'];
    $this->total = $venta['Total'];
    $this->fechaCompra = $venta['FechaCompra'];
    $this->usuario = $venta['Usuario'];
    $this->idTienda = $venta['IdTienda'];
  }

  public function setIdVenta(int $idVenta)
  { $this->idVenta = sanea($idVenta);
  }

  public function setTotal(int $total)
  { $this->total = sanea($total);
  }

  public function setFechaCompra(date $fechaCompra)
  { $this->fechaCompra = sanea($fechaCompra);
  }

  public function setUsuario(string $usuario)
  { $this->usuario = sanea($usuario);
  }

  public function setIdTienda(int $idTienda)
  { $this->idTienda = sanea($idTienda);
  }


  public function getIdVenta() :int
  { return (int)$this->idVenta;
  }

  public function getTotal() :int
  { return (int)$this->total;
  }

  public function getFechaCompra() :date
  { return (string)$this->fechaCompra;
  }

  public function getUsuario() :string
  { return (string)$this->usuario;
  }

  public function getIdTienda() :int
  { return (int)$this->idTienda;
  }



}
