<?php
class Existencias
{ private $nombreProducto;
  private $nombreTienda;
  private $nombreCiudad;
  private $nombreProvincia;
  private $stock;

  public function __construct($nombreProducto,$nombreTienda,$nombreCiudad,$nombreProvincia,$stock)
  { $this->nombreProducto = $nombreProducto;
    $this->nombreTienda = $nombreTienda;
    $this->nombreCiudad = $nombreCiudad;
    $this->nombreProvincia = $nombreProvincia;
    $this->stock = $stock;
  }

  public function setNombreProducto($nombreProducto)
  { $this->nombreProducto = $nombreProducto;
  }

  public function setNombreTienda($nombreTienda)
  { $this->nombreTienda = $nombreTienda;
  }

  public function setNombreCiudad($nombreCiudad)
  { $this->nombreCiudad = $nombreCiudad;
  }

  public function setNombreProvincia($nombreProvincia)
  { $this->nombreProvincia = $nombreProvincia;
  }

  public function setStock($stock)
  { $this->stock = $stock;
  }

  public function getNombreProducto()
  { return $this->nombreProducto;
  }

  public function getNombreTienda()
  { return $this->nombreTienda;
  }

  public function getNombreCiudad()
  { return $this->nombreCiudad;
  }

  public function getNombreProvincia()
  { return $this->nombreProvincia;
  }

  public function getStock()
  { return $this->stock;
  }

}
