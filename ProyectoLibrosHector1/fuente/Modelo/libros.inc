<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class Libros
{ private $idLibro;///IdLibro INTEGER IDENTITY PRIMARY KEY,
  private $idSubCategoria;///IdSubCategoria INTEGER,
  private $titulo;///Titulo NVARCHAR(200) NOT NULL,
  private $idAutor;//IdAutor INTEGER ,
  private $descripcion;///Descripcion NVARCHAR(4000) NOT NULL,

  public function __construct(array $libros)
  { $this->idLibro = $libros['IdLibro'];
    $this->idSubCategoria = $libros['IdSubCategoria'];
    $this->titulo = $libros['Titulo'];
    $this->idAutor = $libros['IdAutor'];
    $this->descripcion = $libros['Descripcion'];
  }

  public function setIdLibro(int $idLibro)
  { $this->idLibro = sanea($idLibro);
  }

  public function setIdSubCategoria(int $idSubCategoria)
  { $this->idSubCategoria = sanea($idSubCategoria);
  }

  public function setTitulo(string $titulo)
  { $this->titulo = sanea($titulo);
  }

  public function setIdAutor(int $idAutor)
  { $this->idAutor = sanea($idAutor);
  }

  public function setDescripcion(string $descripcion)
  { $this->descripcion = sanea($descripcion);
  }

  public function getIdLibro() :int
  { return (int)$this->idLibro;
  }

  public function getIdSubCategoria($idSubCategoria) :int
  { return (int)$this->idSubCategoria;
  }

  public function getTitulo() :string
  { return (string)$this->titulo;
  }

  public function getIdAutor() :int
  { return (int)$this->idAutor;
  }

  public function getDescripcion() :string
  { return (string)$this->descripcion;
  }

}///fin clase
