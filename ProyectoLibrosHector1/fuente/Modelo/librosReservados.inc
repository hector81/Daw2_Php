<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class LibrosReservados
{ private $usuario;// NVARCHAR(100) NOT NULL,
  private $idEjemplar;// INT NOT NULL,
  private $cantidad;// INT NOT NULL,
  private $pReserva;// MONEY NOT NULL,
  private $idTienda;// INT NOT NULL,

  public function __construct(array $librosReservados)
  { $this->usuario = $librosReservados['Usuario'];
    $this->idEjemplar = $librosReservados['IdEjemplar'];
    $this->cantidad = $librosReservados['cantidad'];
    $this->pReserva = $librosReservados['pReserva'];
	$this->pReserva = $librosReservados['pReserva'];
	$this->idTienda = $librosReservados['IdTienda'];
  }

  public function setUsuario(string $usuario)
  { $this->usuario = sanea($usuario);
  }

  public function setIdEjemplar(int $idEjemplar)
  { $this->idEjemplar = sanea($idEjemplar);
  }

  public function setCantidad(int $cantidad)
  { $this->cantidad = sanea($cantidad);
  }

  public function setPReserva(float $pReserva)
  { $this->pReserva = sanea($pReserva);
  }

  public function setIdTienda(int $idTienda)
  { $this->idTienda = sanea($idTienda);
  }

  public function getUsuario() :string
  { return (string)$this->usuario;
  }

  public function getIdEjemplar() :int
  { return (int)$this->idEjemplar;
  }

  public function getCantidad() :int
  { return (int)$this->cantidad;
  }

  public function getPReserva() :float
  { return (float)$this->pReserva;
  }

  public function getIdTienda() :int
  { return (int)$this->idTienda;
  }


}//fin clase
