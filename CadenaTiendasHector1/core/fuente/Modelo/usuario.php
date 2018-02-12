<?php
class Usuario
{ private $usuario;
  private $contrasenia;
  private $grupo;

  /*
  public function __construct()
  {}
  */

  public function __construct($usuario,$grupo)
  {
    $this->usuario = $usuario;
    $this->grupo = $grupo;
  }

  public function getUsuario()
  { return $this->usuario;
  }

  public function getGrupo()
  { return $this->grupo;
  }

  public function getContrasenia()
  { return $this->contasenia;
  }

  public function verificaContrasenia($aContrasenia)
  { return password_verify(aContrasenia, $hash);

  }
}
