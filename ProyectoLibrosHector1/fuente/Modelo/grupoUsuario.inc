<?php
declare(strict_types=1);
include_once __DIR__ . '/../../app/config/sanitize.php';
class GrupoUsuario
{ private $idGrupoUsuario;//INTEGER IDENTITY PRIMARY KEY,
  private $grupo;//NVARCHAR(20) NOT NULL

  public function __construct(array $grupoUsuario)
  { $this->idGrupoUsuario = $grupoUsuario['IdGrupoUsuario '];
    $this->grupo = $grupoUsuario['Grupo '];

  }

  public function setIdGrupoUsuario(int $idGrupoUsuario)
  { $this->idGrupoUsuario = sanea($idGrupoUsuario);
  }

  public function setGrupo(string $grupo)
  { $this->grupo = sanea($grupo);
  }



  public function getIdGrupoUsuario() :int
  { return (int)$this->idGrupoUsuario;
  }

  public function setGrupo() :string
  { return (string)$this->grupo;
  }


}//fin clase
