<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Provincias
{ private $idProvincia;//  IdProvincia VARCHAR(200) PRIMARY KEY,
  private $nombreProvincia;//NombreProvincia NVARCHAR(100) NOT NULL,
  private $provinciaSeo;//ProvinciaSeo NVARCHAR(100) NOT NULL,
  private $abreviaturaProvincia;//AbreviaturaProvincia CHAR(3) NOT NULL,
  private $idPais;//IdPais INTEGER,


  public function __construct(array $provincias)
  { $this->idProvincia = $provincias['IdProvincia'];
    $this->nombreProvincia = $provincias['NombreProvincia'];
    $this->provinciaSeo = $provincias['ProvinciaSeo'];
	$this->abreviaturaProvincia = $provincias['AbreviaturaProvincia'];
	$this->idPais = $provincias['IdPais'];
  }

  public function setIdProvincia(string $idProvincia)
  { $this->idProvincia = sanea($idProvincia);
  }

  public function setNombreProvincia(string $nombreProvincia)
  { $this->nombreProvincia = sanea($nombreProvincia);
  }

  public function setProvinciaSeo(string $provinciaSeo)
  { $this->provinciaSeo = sanea($provinciaSeo);
  }

  public function setAbreviaturaProvincia(string $abreviaturaProvincia)
  { $this->abreviaturaProvincia = sanea($abreviaturaProvincia);
  }

  public function setIdPais(int $idPais)
  { $this->idPais = sanea($idPais);
  }



  public function getIdProvincia() :string
  { return (string)$this->idProvincia;
  }

  public function getNombreProvincia() :string
  { return (string)$this->nombreProvincia;
  }

  public function getProvinciaSeo() :string
  { return (string)$this->provinciaSeo;
  }

  public function getAbreviaturaProvincia() :string
  { return (string)$this->abreviaturaProvincia;
  }

  public function getIdPais() :int
  { return (int)$this->idPais;
  }


}
