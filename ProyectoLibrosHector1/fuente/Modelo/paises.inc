<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Paises
{ private $idPais;//IdPais INTEGER IDENTITY PRIMARY KEY,
  private $nombrePais;//NombrePais VARCHAR(100) NOT NULL,

  public function __construct(array $paises)
  { $this->idPais = $paises['IdPais'];
    $this->nombrePais = $paises['NombrePais'];

  }

  public function setIdPais(int $idPais)
  { $this->idPais = sanea($idPais);
  }

  public function setNombrePais(string $nombrePais)
  { $this->nombrePais = sanea($nombrePais);
  }



  public function getIdPais() :int
  { return (int)$this->idPais;
  }

  public function getNombrePais() :string
  { return (string)$this->nombrePais;
  }


}
