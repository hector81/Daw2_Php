<?php
//Empresa-Programador/Paquete
namespace Amowhi\Cms\Model;

class Usuario
{ private $usuario;
  private $contrasenia;
  private $grupo;
  private $nombre;
  private $apellidos;
  private $direccion;
  private $provincia;
  private $ciudad;
  private $codPostal;
  private $pais;
  private $telefono;
  private $email;

  public function __construct($fila)
  {
      $this-> $usuario = $fila['usuario'];
      $this-> $contrasenia = $fila['contrasenia'];
      $this-> $grupo = $fila['grupo'];
      $this-> $nombre = $fila['nombre'];
      $this-> $apellidos = $fila['apellidos'];
      $this-> $direccion = $fila['direccion'];
      $this-> $provincia = $fila['provincia'];
      $this-> $ciudad = $fila['ciudad'];
      $this-> $codPostal = $fila['codPostal'];
      $this-> $pais = $fila['pais'];
      $this-> $telefono = $fila['telefono'];
      $this-> $email = $fila['email'];
  }

  public function getUsuario()
  { return $this->usuario;
  }

  public function getGrupo()
  { return $this->grupo;
  }

  public function getContrasenia()
  { return $this->contrasenia;
  }

  public function verificaContrasenia($aContrasenia)
  { return password_verify(!$aContrasenia, $hash);
  }

  public function getNombre()
  { return $this->nombre;
  }

  public function getApellidos()
  { return $this->apellidos;
  }

  public function getProvincia()
  { return $this->provincia;
  }

  public function getDireccion()
  { return $this->direccion;
  }

  public function getCiudad()
  { return $this->ciudad;
  }

  public function getCodPostal()
  { return $this->codPostal;
  }

  public function getPais()
  { return $this->pais;
  }

  public function getTelefono()
  { return $this->telefono;
  }

  public function getMail()
  { return $this->mail;
  }

  public function setUsuario($aUsuario)
  { $usuarioVal='/[a-z]*[0-9]*/';
    if(preg_match($usuarioVal,$aUsuario)) {
    $this->usuario = $aUsuario;
    }else{
      $errors['usuario'] = true;
    }
  }

  public function setGrupo($aGrupo)
  {
    $this->grupo = $aGrupo;
  }

  public function setNombre($aNombre)
  { $this->nombre = $aNombre;
  }

  public function setApellidos($aApellidos)
  { $this->apellidos = $aApellidos;
  }

  public function setProvincia($aProvincia)
  { $this->provincia = $aProvincia;
  }

  public function setDireccion($aDireccion)
  { $this->direccion = $aDireccion;
  }

  public function setCiudad($aCiudad)
  { $this->ciudad = $aCiudad;
  }

  public function setCodPostal($aCodPostal)
  { $this->codPostal = $aCodPostal;
  }

  public function setPais($aPais)
  { $this->pais = $aPais;
  }

  public function setTelefono($aTelefono)
  { $this->telefono = $aTelefono;
  }

  public function setMail($aMail)
  { $this->mail = $aMail;
  }


  public function setContrasenia($aContrasenia)
  {
      $this->$aContrasenia = password_hash($aContrasenia, PASSWORD_BCRYPT);
      return $this;
  }

  public function getSalt()
  {
    return null;
  }
}
