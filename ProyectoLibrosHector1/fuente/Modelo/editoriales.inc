<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Editoriales
{ private $idEditorial;//IdEditorial INTEGER IDENTITY PRIMARY KEY,
  private $nombre;//Nombre  NVARCHAR(100) NOT NULL,
  private $direccion;//Direccion NVARCHAR(100) NOT NULL,
  private $idCiudad;// IdCiudad INTEGER NOT NULL,
  private $telefono;//Telefono CHAR(9) NOT NULL,
  private $fax;//Fax NVARCHAR(100) NOT NULL,
  private $email;//Email NVARCHAR(100) NOT NULL,

  public function __construct(array $editoriales)
  { $this->idEditorial = $editoriales['IdEditorial'];
    $this->nombre = $editoriales['Nombre'];
    $this->direccion = $editoriales['Direccion'];
    $this->idCiudad = $editoriales['IdCiudad'];
    $this->telefono = $editoriales['Telefono'];
    $this->fax = $editoriales['Fax'];
    $this->email = $editoriales['Email'];
  }

  public function setIdEditorial(int $idEditorial)
  { $this->idEditorial = sanea($idEditorial);
  }

  public function setNombre(string $nombre)
  { $this->nombre = sanea($nombre);
  }

  public function setDireccion(string $direccion)
  { $this->direccion = sanea($direccion);
  }

  public function setIdCiudad(int $idCiudad)
  { $this->idCiudad = sanea($idCiudad);
  }

  public function setTelefono(string $telefono)
  { $this->telefono = sanea($telefono);
  }

  public function setFax(string $fax)
  { $this->fax = sanea($fax);
  }

  public function setEmail(string $email)
  { $this->email = sanea($email);
  }

  public function getIdEditorial() :int
  { return (int)$this->idEditorial;
  }

  public function getNombre() :string
  { return (string)$this->nombre;
  }

  public function getDireccion() :string
  { return (string)$this->direccion;
  }

  public function getIdCiudad() :int
  { return (int)$this->idCiudad;
  }

  public function getTelefono() :string
  { return (string)$this->telefono;
  }

  public function getFax() :string
  { return (string)$this->fax;
  }

  public function getEmail() :string
  { return (string)$this->email;
  }

}
