<?php
  namespace Amowhi\Cms\Model;

  class Envios
  { private $id;
    private $idUsuario;
    private $nombre;
    private $apellidos;
    private $direccion;
    private $ciudad;
    private $provincia;
    private $codigoPostal;
    private $pais;
    private $telefono;
    private $email;
    private $tipoEnvio;
    private $estado;
    private $idVenta;
    private $tiendaSeleccionada;


    public function __construct($fila)
    { $this->id = $fila['id'];
      $this->idUsuario = $fila['nombreCorto'];
      $this->nombre = $fila['nombre'];
      $this->apellidos = $fila['nombre'];
      $this->direccion = $fila['descripcion'];
      $this->ciudad = $fila['PVP'];
      $this->provincia= $fila['idFamilia'];
      $this->codigoPostal= $fila['idFamilia'];
      $this->pais = $fila['pais'];
      $this->telefono= $fila['telefono'];
      $this->email= $fila['email'];
      $this->tipoEnvio= $fila['tipoEnvio'];
      $this->estado= $fila['estado'];
      $this->idVenta= $fila['idVenta'];
      $this->tiendaSeleccionada= $fila['tiendaSeleccionada'];
    }
    public function setIdUsuario($aIdUsuario)
    { $this->idUsuario = $aIdUsuario;
    }
    public function setNombre($aNombre)
    { $this->nombre = $aNombre;
    }

    public function setApellidos($aApellidos)
    { $this->apellidos = $aApellidos;
    }

    public function setDireccion($aDireccion)
    { $this->direccion = $aDireccion;
    }

    public function setCiudad($aCiudad)
    { $this->ciudad = $aCiudad;
    }

    public function setProvincia($aProvincia)
    { $this->provincia = $aProvincia;
    }

    public function setCodigoPostal($aCodigoPostal)
    { $this->codigoPostal = $aCodigoPostal;
    }

    public function setPais($aPais)
    { $this->pais = $aPais;
    }

    public function setTelefono($aTelefono)
    { $this->telefono = $aTelefono;
    }

    public function setEmail($aEmail)
    { $this->email = $aEmail;
    }

    public function setTipoEnvio($aTipoEnvio)
    { $this->tipoEnvio = $aTipoEnvio;
    }

    public function setEstado($aEstado)
    { $this->estado = $aEstado;
    }

    public function setIdVenta($aIdVenta)
    { $this->idVenta = $aIdVenta;
    }

    public function setTiendaSeleccionada($aTiendaSeleccionada)
    { $this->tiendaSeleccionada = $aTiendaSeleccionada;
    }

    public function getIdUsuario()
    { return $this->idUsuario;
    }
    public function getNombre()
    { return $this->nombre;
    }

    public function getApellidos()
    { return $this->apellidos;
    }

    public function getDireccion()
    { return $this->direccion;
    }

    public function getCiudad()
    { return $this->ciudad;
    }

    public function getProvincia()
    { return $this->provincia;
    }

    public function getCodigoPostal()
    { return $this->codigoPostal;
    }
    public function getPais()
    { return $this->pais;
    }

    public function getTelefono()
    { return $this->telefono;
    }

    public function getEmail()
    { return $this->email;
    }

    public function getTipoEnvio()
    { return $this->tipoEnvio;
    }

    public function getEstado()
    {return  $this->estado;
    }

    public function getIdVenta()
    { return $this->idVenta;
    }

    public function getTiendaSeleccionada()
    { return $this->tiendaSeleccionada;
    }


  }
