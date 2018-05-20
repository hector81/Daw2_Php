<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Tiendas
{ private $idTienda;//IdTienda INTEGER IDENTITY PRIMARY KEY,
  private $nombre;//Nombre VARCHAR(50) NOT NULL,
  private $idCiudad;//IdCiudad INTEGER NOT NULL,
  private $telefono;//Telefono CHAR(9) NOT NULL,
  private $direccion;//Direccion VARCHAR(200) NOT NULL,
  private $imagenTienda;//ImagenTienda VARCHAR(200) NOT NULL,
  private $srcIframe;//NVARCHAR(4000),

  public function __construct(array $tiendas)
  { $this->idTienda = $tiendas['IdTienda'];
    $this->nombre = $tiendas['Nombre'];
    $this->idCiudad = $tiendas['IdCiudad'];
    $this->telefono = $tiendas['Telefono'];
    $this->direccion = $tiendas['Direccion'];
    $this->imagenTienda = $tiendas['ImagenTienda'];
    $this->srcIframe = $tiendas['srcIframe'];
  }

  public function setIdTienda(int $idTienda)
  { $this->idTienda = sanea($idTienda);
  }

  public function setNombre(string $nombre)
  { $this->nombre = sanea($nombre);
  }

  public function setIdCiudad(int $idCiudad)
  { $this->idCiudad = sanea($idCiudad);
  }

  public function setTelefono(string $telefono)
  { $this->telefono = sanea($telefono);
  }

  public function setDireccion(string $direccion)
  { $this->direccion = sanea($direccion);
  }

  public function setImagenTienda(string $imagenTienda)
  { $this->imagenTienda = sanea($imagenTienda);
  }

  public function setSrcIframe(string $srcIframe)
  { $this->srcIframe = sanea($srcIframe);
  }


  public function getIdTienda() :int
  { return (int)$this->idTienda;
  }

  public function getNombre() :string
  { return (string)$this->nombre;
  }

  public function getIdCiudad() :int
  { return (int)$this->idCiudad;
  }

  public function getTelefono() :string
  { return (string)$this->telefono;
  }

  public function getDireccion() :string
  { return (string)$this->direccion;
  }

  public function getImagenTienda() :string
  { return (string)$this->imagenTienda;
  }
  public function getSrcIframe() :string
  { return (string)$this->srcIframe;
  }


}
