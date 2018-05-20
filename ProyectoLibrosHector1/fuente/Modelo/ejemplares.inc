<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Ejemplares
{
  private $idEjemplar;// IdEjemplar INTEGER IDENTITY PRIMARY KEY,
  private $numeroEdicion;//  INTEGER NOT NULL,
  private $encuadernacion;// NVARCHAR(200) NOT NULL,
  private $fechaDisponibilidad;///FechaDisponibilidad DATETIME NOT NULL,
  private $yearPublicacion;///YearPublicacion CHAR(4) NOT NULL,
  private $formato;///Formato NVARCHAR(50) NOT NULL,
  private $idEditorial;///IdEditorial INTEGER,
  private $idioma;///Idioma NVARCHAR(50) NOT NULL,
  private $isbn;///ISBN CHAR(40) NOT NULL,
  private $paginas;///Paginas INTEGER NOT NULL,
  private $pvp;///PVP MONEY NOT NULL,float
  private $portada;///VARCHAR(1000) Portada VARBINARY(MAX),
  private $idLibro ;//INTEGER;// NOT NULL,

  public function __construct(array $ejemplares)
  { $this->idEjemplar = $ejemplares['IdEjemplar'];
    $this->numeroEdicion = $ejemplares['NumeroEdicion'];
    $this->encuadernacion = $ejemplares['Encuadernacion'];
    $this->fechaDisponibilidad; = $ejemplares['FechaDisponibilidad'];
    $this->yearPublicacion = $ejemplares['YearPublicacion'];
    $this->formato = $ejemplares['Formato'];
    $this->idEditorial = $ejemplares['IdEditorial'];
    $this->idioma = $ejemplares['Idioma'];
    $this->isbn = $ejemplares['ISBN'];
    $this->paginas = $ejemplares['Paginas'];
    $this->pvp = $ejemplares['PVP'];
    $this->portada = $ejemplares['Portada'];
    $this->idLibro = $ejemplares['IdLibro'];
  }

  public function setIdEjemplar(int $idEjemplar)
  { $this->idEjemplar = sanea($idEjemplar);
  }

  public function setNumeroEdicion(int $numeroEdicion)
  { $this->numeroEdicion = sanea($numeroEdicion);
  }

  public function setEncuadernacion(string $encuadernacion)
  { $this->encuadernacion = sanea($encuadernacion);
  }

  public function setFechaDisponibilidad(date $fechaDisponibilidad)
  { $this->fechaDisponibilidad = sanea($fechaDisponibilidad);
  }

  public function setYearPublicacion(string $yearPublicacion)
  { $this->yearPublicacion = sanea($yearPublicacion);
  }

  public function setFormato(string $formato)
  { $this->formato = sanea($formato);
  }

  public function setIdEditorial(int $idEditorial)
  { $this->idEditorial = sanea($idEditorial);
  }

  public function setIdioma(string $idioma)
  { $this->idioma = sanea($idioma);
  }

  public function setISBN(string $isbn)
  { $this->isbn = sanea($isbn);
  }

  public function setPaginas(int $paginas)
  { $this->paginas = sanea($paginas);
  }

  public function setPVP(float $pvp)
  { $this->pvp = sanea($pvp);
  }

  public function setPortada(string $portada)
  { $this->portada = sanea($portada);
  }

  public function setIdLibro(int $idLibro)
  { $this->idLibro = sanea($idLibro);
  }





  public function getIdEjemplar() :int
  { return (int)$this->idEjemplar;
  }

  public function getNumeroEdicion() :int
  { return (int)$this->numeroEdicion;
  }

  public function getEncuadernacion() :string
  { return (string)$this->encuadernacion;
  }

  public function getFechaDisponibilidad() :string
  { return (string)$this->fechaDisponibilidad;
  }

  public function getYearPublicacion() :string
  { return (string)$this->yearPublicacion;
  }

  public function getFormato() :string
  { return (string)$this->formato;
  }

  public function getIdEditorial() :int
  { return (int)$this->idEditorial;
  }

  public function getIdioma() :string
  { return (string)$this->idioma;
  }

  public function getISBN() :string
  { return (string)$this->isbn;
  }

  public function getPaginas() :int
  { return (int)$this->paginas;
  }

  public function getPVP() :float
  { return (float)$this->pvp;
  }

  public function getPortada() :string
  { return (string)$this->portada;
  }

  public function getIdLibro() :int
  { return (int)$this->idLibro;
  }


}
