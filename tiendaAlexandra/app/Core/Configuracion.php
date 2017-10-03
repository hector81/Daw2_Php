<?php

/**
Core: Dispone de las clases de configuración de la bbdd, router...
**/

namespace Amowhi\Cms\Core;

class Configuracion
{
  private $dbParams = null;

  public function __construct()
  {
    $this->dbParams = include __DIR__ . './../../config/database.php';

  }

  public function getDbParams()
  { return $this->dbParams;

  }
}
