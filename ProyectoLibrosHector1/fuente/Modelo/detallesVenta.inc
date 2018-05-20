<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
	class DetallesVenta
	{ private $idVenta;//IdVenta  INTEGER NOT NULL,
	  private $idEjemplar;//IdEjemplar  INTEGER NOT NULL,
	  private $cantidad;//Cantidad INTEGER NOT NULL,
	  private $pvp;//	PVP INTEGER NOT NULL,--MONEY

	  public function __construct(array $detallesVenta)
	  { $this->idVenta = $detallesVenta['IdVenta'];
	    $this->idEjemplar = $detallesVenta['IdEjemplar'];
	    $this->cantidad = $detallesVenta['Cantidad'];
	    $this->pvp = $detallesVenta['PVP'];
	  }

	  public function setIdVenta(int $idVenta)
	  { $this->idVenta = sanea($idVenta);
	  }

	  public function setIdEjemplar(int $idEjemplar)
	  { $this->idEjemplar = sanea($idEjemplar);
	  }

	  public function setCantidad(int $cantidad)
	  { $this->cantidad = sanea($cantidad);
	  }

	  public function setPvp(int $pvp)
	  { $this->pvp = sanea($pvp);
	  }


	  public function getidVenta() :int
	  { return (int)$this->idVenta;
	  }

	  public function getIdEjemplar() :int
	  { return (int)$this->idEjemplar;
	  }

	  public function getCantidad() :int
	  { return (int)$this->cantidad;
	  }

	  public function getPvp() :int
	  { return (int)$this->pvp;
	  }



	}//fin clase
