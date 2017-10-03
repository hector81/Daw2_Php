<?php
  namespace Amowhi\Cms\Model;

  class Familia
  { private $id;
    private $nombre;
    private $descripcion;


    public function __construct($fila)
    { $this->id = $fila['id'];
      $this->nombre = $fila['nombre'];
      $this->descripcion = $fila['descripcion'];
    }

    public function setNombre($aNombre)
    { $this->nombre = $aNombre;
    }

    public function setDescripcion($aDescripcion)
    { $this->descripcion = $aDescripcion;
    }

    public function getId()
    { return $this->id;
    }

    public function getNombre()
    { return $this->nombre;
    }

    public function getDescripcion()
    { return $this->descripcion;
    }

  }
