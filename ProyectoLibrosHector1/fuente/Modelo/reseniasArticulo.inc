<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class ReseniasArticulo
{ private $idResenia;//IdResenia INTEGER IDENTITY PRIMARY KEY,
  private $idLibro;//IdLibro INTEGER NOT NULL,
  private $usuario;//Usuario NVARCHAR(20) NOT NULL,
  private $fechaResenia;//FechaResenia DATETIME NOT NULL,
  private $puntuacion;//Puntuacion INTEGER NOT NULL,
  private $comentarios;//Comentarios NVARCHAR(400)NOT NULL,

  public function __construct(array $resenias)
  { $this->idResenia = $resenias['IdResenia'];
    $this->idLibro = $resenias['IdLibro'];
    $this->usuario = $resenias['Usuario'];
    $this->fechaResenia = $resenias['FechaResenia'];
    $this->puntuacion = $resenias['Puntuacion'];
    $this->comentarios = $resenias['Comentarios'];
  }

  public function setIdResenia(int $idResenia)
  { $this->idResenia = sanea($idResenia);
  }

  public function setIdLibro(int $idLibro)
  { $this->idLibro = sanea($idLibro);
  }

  public function setUsuario(string $usuario)
  { $this->usuario = sanea($usuario);
  }

  public function setFechaResenia(date $fechaResenia)
  { $this->fechaResenia = sanea($fechaResenia);
  }

  public function setPuntuacion(int $puntuacion)
  { $this->puntuacion = sanea($puntuacion);
  }

  public function setComentarios(string $comentarios)
  { $this->comentarios = sanea($comentarios);
  }


  public function getIdResenia() :int
  { return (int)$this->idResenia;
  }

  public function getIdLibro() :int
  { return (int)$this->idLibro;
  }

  public function getUsuario() :string
  { return (string)$this->usuario;
  }

  public function getFechaResenia() :date
  { return (string)$this->fechaResenia;
  }

  public function getPuntuacion() :int
  { return (int)$this->puntuacion;
  }

  public function getComentarios() :string
  { return (string)$this->comentarios;
  }


}
