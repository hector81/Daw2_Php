<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Autores
{ private $idAutor;//IdAutor INTEGER IDENTITY PRIMARY KEY,
  private $nombre;//Nombre  NVARCHAR(100) NOT NULL,
  private $nacionalidad;//Nacionalidad NVARCHAR(100) NOT NULL,
  private $idPais;//IdPais INTEGER NOT NULL,

  public function __construct(array $autores)
  { $this->idAutor = $autores['IdAutor'];
    $this->nombre = $autores['Nombre'];
    $this->nacionalidad = $autores['Nacionalidad'];
    $this->idPais = $autores['IdPais'];
  }

  public function setIdAutor(int $idAutor)
  { $this->idAutor = sanea($idAutor);
  }

  public function setNombre(string $nombre)
  { $this->nombre = sanea($nombre);
  }

  public function setNacionalidad(string $nacionalidad)
  { $this->nacionalidad = sanea($nacionalidad);
  }

  public function setIdPais(int $idPais)
  { $this->idPais = sanea($idPais);
  }



  public function getIdAutor() :int
  { return (int)$this->idAutor;
  }

  public function getNombre() :string
  { return (string)$this->nombre;
  }

  public function getNacionalidad() :string
  { return (string)$this->nacionalidad;
  }

  public function getIdPais() :int
  { return (int)$this->idPais;
  }



}
