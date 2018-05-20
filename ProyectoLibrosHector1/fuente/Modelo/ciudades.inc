<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Ciudades
{ private $idCiudad;//IdCiudad INTEGER IDENTITY PRIMARY KEY,
  private $idProvincia;  //IdProvincia  VARCHAR(200) NOT NULL,
  private $codigoCiudad;//CodigoCiudad VARCHAR(200) NOT NULL,
  private $nombreCiudad;//NombreCiudad VARCHAR(200) NOT NULL,


  public function __construct(array $ciudades)
  { $this->idCiudad= $ciudades['IdCiudad'];
    $this->idProvincia = $ciudades['IdProvincia'];
    $this->codigoCiudad = $ciudades['CodigoCiudad'];
	$this->nombreCiudad = $ciudades['NombreCiudad'];
  }

  public function setIdCiudad(int $idCiudad)
  { $this->idCiudad = sanea($idCiudad);
  }

  public function setIdProvincia(string $idProvincia)
  { $this->idProvincia = sanea($idProvincia);
  }

  public function setCodigoCiudad(string $codigoCiudad)
  { $this->codigoCiudad = sanea($codigoCiudad);
  }

  public function setNombreCiudad(string $nombreCiudad)
  { $this->nombreCiudad = sanea($nombreCiudad);
  }




  public function getIdCiudad() :int
  { return (int)$this->idCiudad;
  }

  public function getIdProvincia() :string
  { return (string)$this->idProvincia;
  }

  public function getCodigoCiudad() :string
  { return (string)$this->codigoCiudad;
  }

  public function getNombreCiudad() :string
  { return (string)$this->nombreCiudad;
  }


}//fin clase
